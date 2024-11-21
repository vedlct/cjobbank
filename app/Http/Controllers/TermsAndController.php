<?php

namespace App\Http\Controllers;

use App\Models\TermsAndConditions;

class TermsAndController extends Controller
{
    public function termsConditionShowToUser()
    {
        $terms=TermsAndConditions::first();

        return view('termsAndConditionForUser',compact('terms'));
    }
}
