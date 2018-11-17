<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

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


    public function testExcel(){
        $fileName="Full Info";

//        return view('Admin.application.fullInfo');
        $check=Excel::create($fileName,function($excel) {


            $excel->sheet('First sheet', function($sheet) {

                // Font family
//                $sheet->setFontFamily('Comic Sans MS');

// Set font with ->setStyle()`
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  10,
                        'bold'      =>  false
                    )
                ));



                $sheet->loadView('Admin.application.fullInfo');
            });

        });
//        $check->setFontSize(15);

        $check->download();

//        $sheet->setFontSize(15);


    }
}
