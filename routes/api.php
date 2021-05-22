<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", function(){
    return array("status" => true, "pesan"=> "Hallo API");
});

Route::get("/hallo/{nama?}/{npm?}", function($nama = "John Doe", $npm = NULL){
    $mhs = array(
        "nama"  => $nama,
        "npm"   => $npm
    );
    return array(
        "status" => true, 
        "pesan" => "Hallo, Nama Saya $nama",
        "mhs"   => $mhs
    );
});

Route::get("/home", [HomeController::class, "index"]);
Route::get("/home/kenalan/{nama?}", [HomeController::class, "kenalan"]);

//Buat sebuah API Controller/Resource Controller untuk mengolah data Mahasiswa
//Nama Controller nya adalah MahasiswaController
//Daftarkan Resource Controller :MahasiswaController ke path mahasiswa
Route::apiResource("mahasiswa", MahasiswaController::class);