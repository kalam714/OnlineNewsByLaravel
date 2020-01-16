<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function about(){
    	$first_name='Imarn';
    	$last_name='imo';
    	return view('front.layout.master',compact('first_name','last_name'));
    }
}
