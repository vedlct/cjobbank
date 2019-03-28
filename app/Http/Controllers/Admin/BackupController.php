<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        \Spatie\DbDumper\Databases\MySql::create()
//            ->setDumpBinaryPath(url('public/DBbackup/'))
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile('dump.sql');
//        \Spatie\DbDumper\Databases\MySql::create()
//            ->setDbName('caritasbd')
//            ->setUserName('root')
//            ->setPassword('')
//            ->dumpToFile('dump.sql');

        return "done";

    }

//    public function it_provides_a_factory_method()
//    {
//        $this->assertInstanceOf(MySql::class, MySql::create());
//    }
//    /** @test */
//    public function it_will_throw_an_exception_when_no_credentials_are_set()
//    {
//        $this->expectException(CannotStartDump::class);
//        MySql::create()->dumpToFile('test.sql');
//    }
//    /** @test */
//    public function it_can_generate_a_dump_command()
//    {
//        $dumpCommand = MySql::create()
//            ->setDumpBinaryPath(url('public/DBbackup/'))
//            ->setDbName(env('DB_DATABASE'))
//            ->setUserName(env('DB_USERNAME'))
//            ->setPassword(env('DB_PASSWORD'))
//            ->getDumpCommand('dump.sql', 'credentials.txt');
//        $this->assertSame('\'mysqldump\' --defaults-extra-file="credentials.txt" --skip-comments --extended-insert dbname > "dump.sql"', $dumpCommand);
//    }





}
