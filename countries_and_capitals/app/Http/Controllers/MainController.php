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

    private function prepareQuiz($p_total_questions) {
        
        // inicializar questionário de perguntas
        $questions = [];

        // quantidade de itens no array original
        $total_countries = count($this->app_data);
        
        // indices de perguntas selecionadas
        $array_indexes = range(0, $total_countries-1, 1);

        // embaralhar indices
        shuffle($array_indexes);

        // obter os "n" indices iniciais apos embaralhar
        $array_indexes = array_slice($array_indexes, 0, $p_total_questions);

        // numero da questão
        $question_number = 1;

        foreach($array_indexes as $index) {

            // país e capital correto
            $question['question_number'] = $question_number;
            $question['country'] = $this->app_data[$index]['country'];
            $question['correct_answer'] = $this->app_data[$index]['capital'];
            $question['correct'] = null;

            // capitais incorretas
            $wrong_answers = array_column($this->app_data, 'capital');

            // remover capital correta do array de opções incorretas
            $wrong_answers = array_diff($wrong_answers, [$question['correct_answer']]);

            // embaralhar array de capitais incorretas
            shuffle($wrong_answers);

            // obter somente os 3 itens iniciais do novo array
            $wrong_answers = array_slice($wrong_answers,0,3);

            // associar opções inválidas
            $question['wrong_capitals'] = $wrong_answers; 

            // incluir pais/capital atual no array de retorno
            $questions[] = $question;

            // incrementar número da questão
            $question_number++;

        }

        return $questions;

    }
}
