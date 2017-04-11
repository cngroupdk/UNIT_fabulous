<?php

namespace App\Http\Controllers;

use App\Events\MailEvent;
use App\Http\Requests\CreateBoxRequest;
use App\Http\Requests\WizardStoreCategoriesRequest;
use App\Http\Requests\WizardStoreEmailsRequest;
use App\Http\Requests\WizardStoreGeneralRequest;
use Facades\App\Services\BoxService;
use Facades\App\Services\CategoryService;

class WizardController extends Controller
{
    public function showGeneral()
    {
        $generalData = \Session::get('general');

        return view('wizard.general', compact(['generalData']));
    }

    public function storeGeneral(WizardStoreGeneralRequest $request)
    {
        $generalData = [
            'name'        => $request->name,
            'private'     => $request->private,
            'description' => $request->description
        ];

        \Session::put('general', $generalData);
    }

    public function showCategories()
    {

        if (! \Session::has('general')) {
            return redirect()->action('WizardController@showGeneral');
        }

        $categoriesData = \Session::get('categories');

        return view('wizard.categories', compact(['categoriesData']));
    }

    public function storeCategories(WizardStoreCategoriesRequest $request)
    {
        $categoriesData = [
            'categories' => $request->categories
        ];

        \Session::put('categories', $categoriesData);
    }

    public function showEmails()
    {
        if (! \Session::has('general')) {
            return redirect()->action('WizardController@showGeneral');
        }

        if (! \Session::has('categories')) {
            return redirect()->action('WizardController@showCategories');
        }

        return view('wizard.emails');
    }

    public function storeEmails(WizardStoreEmailsRequest $request)
    {
        $emailData = [
            'emails' => $request->emails,
            'text'   => $request->email_text
        ];

        \Session::put('emails', $emailData);
    }

    public function showPreview()
    {
        if (! \Session::has('general')) {
            return redirect()->action('WizardController@showGeneral');
        }

        if (! \Session::has('categories')) {
            return redirect()->action('WizardController@showCategories');
        }

        if (! \Session::has('emails')) {
            return redirect()->action('WizardController@showEmails');
        }

        $generalData = \Session::get('general');
        $categoriesData = \Session::get('categories');
        $emailData = \Session::get('emails');

        return view('wizard.preview', compact(['generalData', 'categoriesData', 'emailData']));
    }

    public function create(CreateBoxRequest $request)
    {
        // vytvorenie boxu
        $generalData = \Session::get('general');

        $box = BoxService::create([
            'user_id'      => \Auth::user(),
            'name'         => $generalData->name,
            'description'  => $generalData->description,
            'private'      => $generalData->private
        ]);

        // vytvorenie kategorii
        $categoriesData = \Session::get('categories');

        foreach ($categoriesData->categories as $category) {
            $newCategory = CategoryService::create([
                'user_id' => \Auth::user(),
                'name'    => $category
            ]);
            $box->categories()->attach($newCategory->id);
        }

        // odoslanie emailov
        $emailData = \Session::get('emails');

        // todo email text
        foreach ($emailData->emails as $email) {
            event(new MailEvent(
                null,
                trans('emails.subject_prefix') . ' ' . $box->name),
                trans('emails.box-invitation', ['box_code' => $box->code]),
                $email
            );
        }

        \Session::forget(['general', 'categories', 'emails']);
    }


}
