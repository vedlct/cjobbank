<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    //

    public function testloop(){


        for ($i=0; $i<5; $i++){

           $this->printview($i);
        }


    }

    public function printview($no){

        return  $no;
    }
}
