<?php

namespace App\Http\Controllers;

use App\TermsAndConditions;
use Illuminate\Http\Request;

class TermsAndController extends Controller
{
    //

    public function termsConditionShowToUser(){


        $terms=TermsAndConditions::first();

        return view('termsAndConditionForUser',compact('terms'));
    }
}
