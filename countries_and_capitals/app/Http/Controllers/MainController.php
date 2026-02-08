<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Illuminate\Support\Number;

class MainController extends Controller
{
    private array $app_data;

    public function __construct()
    {
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame(): View
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

        // salvar o quiz na sessão
        session()->put([
            'quiz' => $quiz,
            'total_questions' => $total_questions,
            'current_question' => 1,
            'total_correct_answers' => 0,
            'total_wrong_answers' => 0

        ]);

        // encaminhar para a view game
        //return redirect()->route('game');
        return $this->game();

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
            $question['wrong_answers'] = $wrong_answers;

            // incluir pais/capital atual no array de retorno
            $questions[] = $question;

            // incrementar número da questão
            $question_number++;

        }

        return $questions;

    }

    public function game(): View {

        $quiz = session('quiz');
        $total_questions = session('total_questions');
        $current_question = session('current_question');

        // caso tenha chegado ao fim, encaminhar para a página de resultados
        if ( $current_question > $total_questions ) {
            return $this->show_results();
        }

        // indice atual das respostas
        $question_index = $current_question-1;

        // obtem as questoes erradas
        $answers = $quiz[$question_index]['wrong_answers'];

        // obtem a questãio certa
        $answers[] = $quiz[$question_index]['correct_answer'];

        // embaralhar array
        shuffle($answers);

        // encaminhar a view o array
        return view('game',[
            'country' => $quiz[$question_index]['country'],
            'totalQuestions' => $total_questions,
            'currentQuestion' => $current_question,
            'answers' => $answers
        ]);
    }

    public function answer($p_EncryptText): View {
        //dd($p_EncryptText);

        try {
            $answer = Crypt::decryptString($p_EncryptText);
        } catch (\Exception $th) {
            //return redirect()->route('game');
            return $this->game();
        }

        // array do quiz atualizado
        $quiz = session('quiz');

        // id da questão atual
        $current_question = session('current_question');

        // id da questão atual
        $current_question_index = $current_question - 1;

        // resposta correta da questão atual
        $correct_answer = $quiz[$current_question_index]['correct_answer'];

        //quantidade de respostas corretas e incorretas
        $total_correct_answers = session('total_correct_answers');
        $total_wrong_answers = session('total_wrong_answers');

        if ( $answer === $correct_answer) {
            $total_correct_answers++;
            $quiz[$current_question_index]['correct'] = true;
        }
        else {
            $total_wrong_answers++;
            $quiz[$current_question_index]['correct'] = false;
        }

        // informação que será enviada para view
        $data = [
            'country' => $quiz[$current_question_index]['country'],
            'correct_answer' => $correct_answer,
            'choice_answer' => $answer,
            'currentQuestion' => $current_question,
            'totalQuestions' => session('total_questions')
        ];

        // atualização das informações de sessão
        session()->put([
            'quiz' => $quiz,
            'total_correct_answers' => $total_correct_answers,
            'total_wrong_answers' => $total_wrong_answers,
            'current_question' => $current_question + 1,
        ]);

        // retorna a view com o resultado
        return view('answer_result',$data);

    }

    public function show_results(): View {
        //dd(session()->all());

        $total_questions = session('total_questions');
        $total_correct_answers = session('total_correct_answers');
        $total_wrong_answers = session('total_wrong_answers');

        // calculo do percentual de acerto
        $percentage = $total_correct_answers / $total_questions * 100;

        // encaminhar para view os resultados
        return view('final_results',[
            'total_questions' => $total_questions,
            'total_correct_answers' => $total_correct_answers,
            'total_wrong_answers' => $total_wrong_answers,
            'percentage' => Number::percentage($percentage, locale: 'pt_BR')
        ]);
    }
}
