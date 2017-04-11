<?php

namespace App\Http\Controllers;

use App\Http\Requests\WizardStoreCategoriesRequest;
use App\Http\Requests\WizardStoreEmailsRequest;
use App\Http\Requests\WizardStoreGeneralRequest;

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
        if (\Session::has('general')) {
            return redirect()->action('WizardController@showGeneral');
        }

        $categories = \Session::get('categories');

        return view('wizard.categories', compact(['categories']));
    }

    public function storeCategories(WizardStoreCategoriesRequest $request)
    {
        \Session::put('categories', $request->categories);
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
        $categories = \Session::get('categories');
        $emailData = \Session::get('emails');

        return view('wizard.preview', compact(['generalData', 'categories', 'emailData']));
    }
}
