<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartNumberController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SpecialPartNumberController;
use App\Http\Controllers\WeldingController;
use App\Http\Controllers\ProcessController;
use App\Models\PartNumber;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 * ELOQUENT ORM
 */
//Route::get('/read', function(){
//    $partNumbers = PartNumber::all();
//    foreach ($partNumbers as $parts)
//    {
//        return $parts->part_numbers;
//    }
//});
//
//Route::get('/find', function()
//{
//   return PartNumber::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
//});

// INSERCION BASICA
Route::get('/basicinsert', function ()
{
    $partNumbers = new PartNumber;
    $partNumbers->sheet_name = 'insert with eloquent';
    $partNumbers->part_numbers = 'test eloquent';
    $partNumbers->save();
});

// UPDATE CON FIND Y SAVE
Route::get('/basicinsert2', function ()
{
    $partNumbers = PartNumber::find(3);
    $partNumbers->sheet_name = 'insert with eloquent 3';
    $partNumbers->part_numbers = 'test eloquent 3';
    $partNumbers->save();
});


Route::get('/create', function ()
{
    PartNumber::create(
        [
            'sheet_name' => 'insertion with create',
            'part_numbers' => 'insertion with create',
        ]);
});

Route::get('/update', function ()
{
   PartNumber::where('id', 3)
       ->where('description', null)
       ->update(
           [
               'sheet_name'=>'cool'
           ]);
});

Route::get('/delete', function ()
{
   PartNumber::find(4)->delete();
});

Route::get('/delete2', function ()
{
    PartNumber::destroy(3,7,8);
});

Route::get('/softdelete', function ()
{
    PartNumber::destroy(3,7,8);
});


Route::get('/findmore', function(){
   return PartNumber::findOrFail(4);
});

Route::get('/softdelete', function()
{
    PartNumber::find(15)->delete();
});

Route::get('/readsoftdelete', function (){

   return PartNumber::onlyTrashed()->where('id', 15)->get();
});

Route::get('/restore', function (){
   PartNumber::withTrashed()->where('id', 15)->restore();

});

Route::get('forcedelete', function (){
   PartNumber::withTrashed()->where('id',14)->forceDelete();
});


Route::resource('partnumbers', PartNumberController::class);
Route::get('/contact', [PartNumberController::class, 'contact']);

Route::get('/partnumber/{id}/{name}/', [PartNumberController::class, 'show_partnumber']);

Route::resource('processes', ProcessController::class);
Route::resource('quotations', QuotationController::class);
Route::resource('specialpartnumbers', SpecialPartNumberController::class);
Route::resource('weldings', WeldingController::class);


