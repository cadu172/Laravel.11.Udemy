<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {

        $user_id = session("user.id");
        $notes = User::find($user_id)->notes()->get()->toArray();

        return view("home",["notes" => $notes]);
    }

    public function newNote()
    {
        return "Main controller.newNote";
    }

}
