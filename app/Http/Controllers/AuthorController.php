<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   public function index()
   {
      // return view('authors.index')->with('users', $users);
      $users = User::all();
      return view('authors.index', compact('users'));
   }
}