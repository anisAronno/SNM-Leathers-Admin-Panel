<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.pages.partner.index', compact('users'));

    }
    public function create()
    {

        return view('admin.pages.partner.create');

    }

    public function show($id)
    {
        return "User id ".$id;
    }
}
