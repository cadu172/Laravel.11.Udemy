<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {

        $user_id = session("user.id");

        $user = User::find($user_id)->toArray();

        dd(User::find($user_id)->notes->toArray());

        die();

        return view("home");
    }

    public function newNote()
    {
        return "Main controller.newNote";
    }

}
