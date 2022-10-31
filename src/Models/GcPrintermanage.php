<?php

namespace goodcom\GcOrderPrinter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GcPrintermanage extends Model
{
    use HasFactory;
	protected $table = "printer";
	
	public function getPrintRecod()
    {

        $records = DB::table('printer')->select(

            'username',
            'password',
            'UserAgent',
            'status',
            'extra',
        )->get()->toArray();
        
        return $records;


    } // end function
	
	
}
