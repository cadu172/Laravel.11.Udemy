<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View {
        return view("home");
    }

    public function generateExercises(Request $request) {

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

            $exercises[] = [
                'operation' => $operation,
                'exercise_number' => $index,
                'exercise' => $exercise . " = ?",
                'sollution' => $exercise . " = " . $sollution,
            ];

        }

        return view("operations", ["exercises" => $exercises]);

    }

    public function printExercises() {
        return "Print exercises route";
    }

    public function exportExercises() {
        return "Export exercises route";
    }

}
