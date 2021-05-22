<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return array("pesan" => "Hallo, ini adalah home dari Home Controller");
    }

    public function kenalan($nama = "John Doe"){
        return array("pesan" => "Hallo, Nama Saya $nama");
    }
}
