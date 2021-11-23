<?php

namespace App\Http\Controllers;

use App\Models\TODOlist_laravel;
use Illuminate\Http\Request;

class issues_controller extends Controller
{
    //

    public function index(){
        return TODOlist_laravel::all();
        // echo "hello wolrd";
    }
}
