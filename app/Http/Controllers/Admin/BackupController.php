<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use Spatie\DbDumper\Databases\MySql as MySql;
use Spatie\DbDumper\Compressors\GzipCompressor;
use Spatie\DbDumper\Exceptions\CannotStartDump;
use Spatie\DbDumper\Exceptions\CannotSetParameter;

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

        shell_exec('mysqldump '.$dbname.' > dump.sql');

//        $backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';
//        $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "test_db | gzip > $backup_file";

//        return DB::raw("mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "test_db | gzip > $backup_file");

       //return system($command);


        $table_name = "aggrement";
        $backup_file  = url('public/DBbackup/dump.sql');
//        $sql = "";
        return DB::raw("mysqldump -u ".$dbuser." -p ".$dbpass." ".$dbname." > ".$backup_file."");
//        return  1;

    }







}
