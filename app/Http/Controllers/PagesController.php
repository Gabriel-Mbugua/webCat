<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        return view('101536.homepage');
    }

    public function student(){
        $data = array(
            'title' => 'StudentModel Registration!',
            'services' => ['Web Design', 'Android' , 'Cloud']
        );
        return view('101536.student')->with('title', $data);
    }

    public function fees(){
        return view('101536.fees');
    }
}
