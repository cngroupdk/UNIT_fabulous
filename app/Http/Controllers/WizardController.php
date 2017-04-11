<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function general(){
        return view('wizard.general');
    }

    public function categories(){
        return view('wizard.categories');
    }
}
