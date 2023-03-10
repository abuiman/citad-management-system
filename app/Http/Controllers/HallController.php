<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;

class HallController extends Controller
{
    //Hall index
    public function index(){
        $halls = Hall::get();
        return view('halls.index', compact('halls'));
    }
    //create Hall
    public function create(){
        return view('halls.create');
    }
}