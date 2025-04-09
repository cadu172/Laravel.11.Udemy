<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Operations;

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

    public function editNote($id)
    {
        //$id = $this->decryptId($id);
        $id = Operations::decryptId($id);
        return "Main controller.editNote: " . $id;
    }

    public function deleteNote($id) {

        //$id = $this->decryptId($id);
        $id = Operations::decryptId($id);
        return "Main controller.deleteNote: " . $id;
    }



}
