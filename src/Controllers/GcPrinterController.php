<?php

namespace goodcom\gcorderprinter;

use Response;
use Storage;
use Log;
use Cache;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use goodcom\GcOrderPrinter\Models\GcPrintermanage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GcPrinterController extends Controller
{

        public function index(Request $request){
			$this->createTable();
            $Setting = $this->getParameter();
            return view('goodcom::gcparameter',compact('Setting'));
        }
        public function update(Request $request){
		
			 $param= GcPrintermanage::find(0);

			if(!empty( $param) ){
				GcPrintermanage::find(0)->forceFill([
				'id'  => 0,
				'username' => $request->username,
				'password' => $request->password,
				'UserAgent' => $request->UserAgent,
				'updated_at' => Carbon::now(),
				])->save();
			
			}else { 
				GcPrintermanage::insert([
					'id'  => 0,	
					'username' => $request->username,
					'password' => $request->password,
					'UserAgent' => $request->UserAgent,
					'updated_at' => Carbon::now(),
				
				]);
			}
			$Setting = $this->getParameter();
			return view('goodcom::gcparameter',compact('Setting'));
        }
		public function getParameter()
		{
		 	$Settings=GcPrintermanage::limit(1)->get();
            $Setting = [
                "username"=>config("gcprinter.username"),
                "password"=>config("gcprinter.password"),
                "UserAgent"=>config("gcprinter.agent"),
            ];
			if(count($Settings)>0){
				 $Setting=$Settings[0];
			}
			return $Setting;
		}
		protected function createTable()
		{
			if (!Schema::hasTable('printer')) {
				Schema::create('printer', function (Blueprint $table) {
					$table->unsignedBigInteger('id');
					$table->string('username')->nullable();
					$table->string('password');
					$table->string('UserAgent');
					$table->string('updated_at');

				});
			}
		}
}
