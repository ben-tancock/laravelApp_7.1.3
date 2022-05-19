<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    //
    public function simpleRequest(){
        // Test database connection
        try {
            $pdo = DB::connection()->getPdo();

            if($pdo)
            {
                return "Connected successfully to database ".DB::connection()->getDatabaseName();
            } else {
                return "You are not connected to database";
            }
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
        //return 'test simple request';
    }

    public function advancedRequest(){
        // Test database connection
        try {
            $solutions = DB::connection('ServiceProviderDB_1026')->select('SELECT * FROM Services');
        } catch (Throwable $e) {
            return response()->error($e->getMessage());
        }
    }
}
