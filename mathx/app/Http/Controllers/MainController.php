<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View {
        return view("home");
    }

    public function generateExercises(Request $request): View {

        $validated = $request->validate([
            'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
            'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
            'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
            'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',
            'number_one' => 'required|integer|min:0|max:999|lt:number_two',
            'number_two' => 'required|integer|min:0|max:999',
            'number_exercises' => 'required|integer|min:5|max:50',
        ]);

        // operações selecionadas
        $operations = [];
        $operations[] = $request->check_sum ? 'sum' : null;
        $operations[] = $request->check_subtraction ? 'subtraction' : null;
        $operations[] = $request->check_multiplication ? 'multiplication' : null;
        $operations[] = $request->check_division ? 'division' : null;
        $operations = array_filter($operations);

        // intervalor e numero de exercícios
        $min = $request->number_one;
        $max = $request->number_two;
        $numberExercises = $request->number_exercises;

        // array de exercícios e soluções
        $exercises = [];

        for($index=1;$index<=$numberExercises;$index++) {
            $exercises[] = $this->generateOneExercise($index, $operations, $min, $max);

        }

        // salvar resultados na sessão
        session(['exercises' => $exercises]);

        // redirecionar para a página de operações
        return view("operations", ["exercises" => $exercises]);

    }

    private function generateOneExercise($index, $operations, $min, $max) : array {

        // pegar aleatoriamente uma operação
        $operation = $operations[array_rand($operations)];

        // obter o número 1 e número 2 aleatoriamente
        $number1 = rand($min, $max);
        $number2 = rand($min, $max);

        switch ($operation) {
            case 'sum':
                $exercise = "$number1 + $number2";
                $sollution = $number1 + $number2;
                break;
            case 'subtraction':
                $exercise = "$number1 - $number2";
                $sollution = $number1 - $number2;
                break;
            case 'multiplication':
                $exercise = "$number1 x $number2";
                $sollution = $number1 * $number2;
                break;
            case 'division':

                if ($number2 == 0) {
                    $number2 = 1;
                }

                $exercise = "$number1 : $number2";
                $sollution = $number1 / $number2;
                break;
        }

        if (  is_float($sollution) ) {
            $sollution = number_format($sollution, 2);
        }

        return [
            'operation' => $operation,
            'exercise_number' => $index,
            'exercise' => $exercise . " = ?",
            'sollution' => $exercise . " = " . $sollution,
        ];

    }

    public function printExercises()  {

        if (! session()->has('exercises') ) {
            return redirect()->route("home");
        }

        echo "<pre>";
        echo "<h1>Exercícios de Matemática ". env("APP_NAME") ."</h1>";
        echo "<hr />";

        // array contendo os exercicios carregados através da session
        $exercises = session("exercises");

        foreach($exercises as $item) {
            echo "<h2><small>" . str_pad($item["exercise_number"],2,"0",STR_PAD_LEFT) . "</small> => " . $item["exercise"] . "</h2>";
        }

        echo "<hr />";
        echo "<h3>Soluções dos exercícios</h3>";

        foreach($exercises as $item) {
            echo "<small>" . str_pad($item["exercise_number"],2,"0",STR_PAD_LEFT) . " => " . $item["sollution"] . "</small><br />";
        }

    }

    public function exportExercises(): string {
        return "Export exercises route";
    }

}
