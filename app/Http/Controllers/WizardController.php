<?php

namespace App\Http\Controllers;

use App\Events\MailEvent;
use App\Http\Requests\WizardStoreCategoriesRequest;
use App\Http\Requests\WizardStoreEmailsRequest;
use App\Http\Requests\WizardStoreGeneralRequest;
use Facades\App\Services\BoxService;
use Facades\App\Services\CategoryService;
use Illuminate\Http\Request;

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
            'private'     => $request->has('private'),
            'description' => $request->description
        ];

        \Session::put('general', $generalData);

        return redirect()->action('WizardController@showCategories');
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

        return redirect()->action('WizardController@showEmails');
    }

    public function showEmails()
    {
        if (! \Session::has('general')) {
            return redirect()->action('WizardController@showGeneral');
        }

        if (! \Session::has('categories')) {
            return redirect()->action('WizardController@showCategories');
        }

        $emailsData = \Session::get('emails');


        return view('wizard.emails', compact(['emailsData']));
    }

    public function storeEmails(WizardStoreEmailsRequest $request)
    {
        $emailData = [
            'emails' => $request->emails,
            'text'   => $request->text
        ];

        \Session::put('emails', $emailData);

//        return redirect()->action('WizardController@showPreview');
        return redirect()->action('WizardController@create');
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

    public function create()
    {
        // vytvorenie boxu
        $generalData = \Session::get('general');

        $box = BoxService::create([
            'user_id'      => \Auth::user()->id,
            'name'         => $generalData['name'],
            'description'  => $generalData['description'],
            'private'      => $generalData['private']
        ]);

        // vytvorenie kategorii
        $categoriesData = \Session::get('categories');

        if (count($categoriesData['categories']) > 0) {
            foreach ($categoriesData['categories'] as $category) {
                $newCategory = CategoryService::create([
                    'user_id' => \Auth::user()->id,
                    'name'    => $category
                ]);

                $box->categories()->attach($newCategory->id);
            }
        }

        // odoslanie emailov
        $emailData = \Session::get('emails');

        // todo email text
        if (! is_null($emailData['emails'])) {
            foreach ($emailData['emails'] as $email) {
                event(new MailEvent(
                    null,
                    trans('emails.subject_prefix') . ' ' . htmlspecialchars($box->name),
                    trans('emails.box_invitation', ['box_code' => $box->code]),
                    $email
                ));
            }
        }

        \Session::forget(['general', 'categories', 'emails']);

        flash()->success(trans('flash.box.created'));
        return redirect()->action('BoxController@index');
    }


}
