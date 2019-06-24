<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Ifsnop\Mysqldump as IMysqldump;
use Illuminate\Support\Facades\Session;


class BackupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                if(Auth::user()->fkuserTypeId==USER_TYPE['Admin'] ){

                    return $next($request);

                }else{

                    return redirect('/');
                }

            }else{

                return redirect('/');
            }





        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function wholeDbBackup()
    {

        $dbhost = env('DB_HOST');
        $dbname = env('DB_DATABASE');
        $dbuser = env('DB_USERNAME');
        $dbpass = env('DB_PASSWORD');

        try {


            $dump = new IMysqldump\Mysqldump('mysql:host='.$dbhost.';dbname='.$dbname.'', ''.$dbuser.'', ''.$dbpass.'');


            Session::flash('message', 'dump created successfully');
            $fileName='dump'.date("Y-m-d_H-i-s");
            $file=public_path('DBbackup/'.$fileName.'.sql');
            if(!is_file($file)){
                fopen($file, "w");
            }

            $dump->start($file);



            return response()->download($file);



        }
        catch (\Exception $e) {
//            return 'mysqldump-php error: ' . $e->getMessage();
            Session::flash('message', 'Error');
            return back();
        }



    }







}
