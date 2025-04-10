<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
        return view("new_note");
    }

    public function newNoteSubmit(Request $request)
    {

        // validar requisição
        $request->validate(
            [
                "text_title" => "required|min:3|max:200",
                "text_note" => "required|min:10|max:3000",
            ],
            [
                "text_title.required" => "Um título é obrigatório",
                "text_title.min" => "O tamanho mínimo do título é :min caracteres",
                "text_title.max" => "O tamanho maximo do título é :max caracteres",
                "text_note.required" => "Você precisa escrever algo para incluir uma nota",
                "text_note.min" => "O tamanho mínimo de uma nota é de :min caracteres",
                "text_note.max" => "O tamanho máximo de uma nota é de :max caracteres",

            ]
        );

        $user_id = session("user.id");

        $note = new Note();
        $note->user_id = $user_id;
        $note->title = $request->input("text_title");
        $note->text = $request->input("text_note");
        $note->created_at = date("Y-m-d H:i:s");
        $note->save();

        return redirect()->route("home");
    }

    public function editNote($id)
    {
        //$id = $this->decryptId($id);

        $id = Operations::decryptId($id);

        // find the note by id
        $note = Note::find($id);

        // send data to the view
        return view("edit_note", ["note" => $note]);

    }

    public function deleteNote($id) {

        //$id = $this->decryptId($id);
        $id = Operations::decryptId($id);
        return "Main controller.deleteNote: " . $id;
    }



}
