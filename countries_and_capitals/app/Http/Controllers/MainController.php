<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    private array $app_data;

    public function __construct()
    {
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame()
    {
        return view('home');
    }

    public function prepareGame(Request $request)
    {
        $request->validate(
            // constaints
            [
                'total_questions' => 'required|integer|min:3|max:30'
            ],
            // messages
            [
                'total_questions.required' => 'O número de questões deve ser informado',
                'total_questions.integer' => 'O Campo com o número de questões deve ser um valor inteiro',
                'total_questions.min' => 'O Número mínimo de questões é :min',
                'total_questions.max' => 'O Número máximo de questões é :max'
            ],
        );

        // numero total de questões, se não informado inicializar com 1
        $total_questions = $request->integer('total_questions', 1);

        $quiz = $this->prepareQuiz($total_questions);

        dd($quiz);

    }

    private function prepareQuiz($total_questions) {
        return $total_questions;
    }
}
