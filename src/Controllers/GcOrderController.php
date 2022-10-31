<?php

namespace goodcom\gcorderprinter\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class GcOrderController extends Controller
{

    public function getOrder(Request $request)
	{
		

        return '1';
	}
    public function callback(Request $request)
	{
		
		return '0';
	
	}
		
}
