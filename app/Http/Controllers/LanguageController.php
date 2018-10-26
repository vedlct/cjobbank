<?php

namespace App\Http\Controllers;

use App\LanguageHead;
use App\LanguageSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class LanguageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                return $next($request);


            }else{

                return redirect('/');
            }


        });
    }

    public function index(){

        $languagehead = LanguageHead::get();
        $languageskill = LanguageSkill::get();
        return view('userCv.insert.language', compact('languagehead', 'languageskill'));
    }
}
