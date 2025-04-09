<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

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

        try {
            $id = Crypt::decrypt($id);
        }
        catch (DecryptException $e ) {
            return redirect()->route("home");
        }

        return "Main controller.editNote: " . $id;
    }

    public function deleteNote($id) {
        try {
            $id = Crypt::decrypt($id);
        }
        catch (DecryptException $e ) {
            return redirect()->route("home");
        }
        return "Main controller.deleteNote: " . $id;
    }

}
