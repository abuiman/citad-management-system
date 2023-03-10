<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    //Admin Dashboard
    public function index(){
        
        return view('admin.dashboard', [
            $events = Event::count(),
            $users = User::count(),
        ]);
    }
}
