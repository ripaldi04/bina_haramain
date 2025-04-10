<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.admin.admin_user', compact('users'));   
    } 
}
