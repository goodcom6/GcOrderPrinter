<?php
use Illuminate\Support\Facades\Route;
use goodcom\gcorderprinter\Controllers\GcOrderController;
use goodcom\gcorderprinter\Controllers\GcPrinterController;

//Route::get('/hello', [GcOrderControl::class,'index']);

Route::get('gcprint-order',[GcOrderController::class, 'getOrder'])->name('pos.print.order');
Route::get('gcpos-callback', [GcOrderController::class,'callback']);


Route::get('printer/manage',[GcPrinterController::class,'index'])->name('admin.manage.printer');
Route::post('printer/manage', [GcPrinterController::class, 'update'])->name('gcprinter.store');