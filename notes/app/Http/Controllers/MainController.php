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
        
        // listar todas as notas do usuário atual (com o deleted_at nulo)
        $notes = User::find($user_id)
            ->notes()
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

        return view("home",["notes" => $notes]);
    }

    public function newNote()
    {
        return view("new_note");
    }

    private function validateForm(Request $request) {

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

    }

    public function newNoteSubmit(Request $request)
    {

        // validate form with default function
        $this->validateForm($request);

        $user_id = session("user.id");

        $note = new Note();
        $note->user_id = $user_id;
        $note->title = $request->input("text_title");
        $note->text = $request->input("text_note");
        $note->created_at = date("Y-m-d H:i:s");
        $note->save();

        return redirect()->route("home");
    }

    public function editNoteSubmit(Request $request) {

        if ( $request->input('note_id') === null ) {
            return redirect()->route("home");
        }

        // validate form with default function
        $this->validateForm($request);

        // decrypt id
        $id = Operations::decryptId($request->input('note_id'));

        // find note for post edit
        $note = Note::find($id);

        if ( ! ( $note === null ) ) {
            $note->title = $request->input("text_title");
            $note->text = $request->input("text_note");
            $note->updated_at = date("Y-m-d H:i:s");
            $note->save();
        }

        return redirect()->route("home");
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        // find the note by id
        $note = Note::find($id);

        if ( $note === null ) {
            return redirect()->route("home");
        }

        // send data to the view
        return view("edit_note", ["note" => $note]);

    }

    public function deleteNote($id) {

        $id = Operations::decryptId($id);

        $note = Note::where("id", $id)->first();

        if ( $note === null ) {
            return redirect()->route("home");
        }

        return view("delete_note", ["note" => $note]);

    }

    public function deleteNoteConfirm($id) {

        // decrypt id
        $id = Operations::decryptId($id);

        // find id
        $note = Note::find($id);

        if ( $note === null ) {
            return redirect()->route("home");
        }

        // hard-delete
        //$note->delete();
        
        // soft-delete
        $note->deleted_at = date("Y-m-d H:i:s");
        $note->save();

        // return to home
        return redirect()->route("home");
        
    }



}
