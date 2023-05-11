<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/alunos')->group(function () {
    Route::get('/', function () {
        $dados = array(
            1 => "Augusto",
            2 => "Cintia",
            3 => "Diogo",
            4 => "Alice",
            5 => "Pedro"
        );
        $alunos = "<ul>";

        foreach ($dados as $chave => $nome) {
            $alunos .= "<li>$chave - $nome</li>";
        }

        $alunos .= "</ul>";

        return $alunos;
    });
    Route::get('/limite/{valor}', function ($total) {

        $dados = array(
            1 => "Maria",
            2 => "Cintia",
            3 => "Diogo",
            4 => "Alice",
            5 => "Pedro"
        );

        $valor = "<ul>";
        for ($a = 1; $a <= $total; $a++) {
            $valor = $valor . "<li>$dados[$a]</li>";
        }
        $valor .= "</ul>";
        return $valor;

    })->where('valor', '[0-9]');



    Route::get('/matricula/{matricula}', function ($matricula) {

        $dados = array(
            1 => "Maria",
            2 => "Cintia",
            3 => "Diogo",
            4 => "Alice",
            5 => "Pedro"
        );

        $valor = "<ul>";
        for ($a = 0; $a <= count($dados); $a++) {
            if ($matricula == $a) {
                $valor = $valor . "<li>$dados[$a]</li>";
            }
        }
        $valor .= "</ul>";
        return $valor;

    })->where('matricula', '[0-9]+');

    Route::get('/nome/{string}', function ($string) {

        $dados = array(
            1 => "Maria",
            2 => "Cintia",
            3 => "Diogo",
            4 => "Alice",
            5 => "Pedro"
        );

        $valor = "<ul>";

        foreach ($dados as $chave => $nome) {
            if ($nome == $string) {
                $valor .= "<li>$chave - $nome</li>";
            }
        }

        $valor .= "</ul>";
        return $valor;

    })->where('string', '[A-Za-z]+');





});

Route::prefix('/notas')->group(function () {

    Route::get('/', function () {

        $dados = array(
            array(
                "matricula" => 1,
                "aluno" => "Joana",
                "nota" => 10,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Auri",
                "nota" => 4,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Faria",
                "nota" => 5,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alive",
                "nota" => 4,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedron",
                "nota" => 7,
            )
        );

        $notas = "<ul>";

        foreach ($dados as $chave) {
            $notas .= "<li>{$chave["matricula"]} {$chave["aluno"]} {$chave["nota"]}</li>";
        }

        $notas .= "</ul>";

        return $notas;
    });

    Route::get('/limite/{valor}', function ($total) {

        $dados = array(
            array(
                "matricula" => 1,
                "aluno" => "Joana",
                "nota" => 10,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Auri",
                "nota" => 9,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Faria",
                "nota" => 10,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alive",
                "nota" => 4,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedron",
                "nota" => 7,
            )
        );
        $count = 0;
        $valor = "<ul>";

        foreach ($dados as $chave) {

            $valor .= "<li>{$chave["matricula"]} {$chave["aluno"]} {$chave["nota"]}</li>";
            $count++;
            if ($count >= $total)
                break;
        }
        $valor .= "</ul>";
        return $valor;

    })->where('valor', '[0-9]');

    Route::get('/lancar/{nota}/{matricula}/{nome?}', function ($nota, $matricula, $nome = null) {

        $dados = array(
            array(
                "matricula" => 1,
                "aluno" => "Joana",
                "nota" => 10,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Auri",
                "nota" => 9,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Faria",
                "nota" => 3.69,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alive",
                "nota" => 4,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedron",
                "nota" => 7,
            )
        );

        $valor = "<ul>";

        foreach ($dados as $chave) {
            if ($nome != null) {
                if ($chave['aluno'] == $nome) {
                    $chave['nota'] = $nota;
                }
            }if ($nome == null) {
                if ($chave['matricula'] == $matricula) {
                    $chave['nota'] = $nota;
                }
            }
            $valor .= "<li>{$chave["matricula"]} {$chave["aluno"]} {$chave["nota"]}</li>";
        }
        $valor .= "</ul>";
        return $valor;

    })->where('nota', '[0-9]')->where('matricula', '[0-9]');

    Route::get('/conceito/{A}/{B}/{C}', function ($A, $B, $C) {

        $dados = array(
            array(
                "matricula" => 1,
                "aluno" => "Joana",
                "nota" => 10,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Auri",
                "nota" => 8.9,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Faria",
                "nota" => 10,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alive",
                "nota" => 0,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedron",
                "nota" => 7,
            )
        );

        $valor = "<ul>";

        foreach ($dados as $chave) {

            if ($chave['nota'] >= $A) {
                $chave['nota'] = 'A';
            } else if ($chave['nota'] >= $B) {
                $chave['nota'] = 'B';
            } else if ($chave['nota'] >= $C) {
                $chave['nota'] = 'C';
            } else {
                $chave['nota'] = 'C';
            }


            $valor .= "<li>{$chave["matricula"]} {$chave["aluno"]} {$chave["nota"]}</li>";
        }
        $valor .= "</ul>";
        return $valor;

    })->where('A', '[0-9]')->where('B', '[0-9]')->where('C', '[0-9]');

    Route::post('/conceito', function (Request $request) {

            $dados = array(
                array(
                    "matricula" => 1,
                    "aluno" => "Joana",
                    "nota" => 10,
                ),
                array(
                    "matricula" => 2,
                    "aluno" => "Auri",
                    "nota" => 8.9,
                ),
                array(
                    "matricula" => 3,
                    "aluno" => "Faria",
                    "nota" => 10,
                ),
                array(
                    "matricula" => 4,
                    "aluno" => "Alive",
                    "nota" => 9,
                ),
                array(
                    "matricula" => 5,
                    "aluno" => "Pedron",
                    "nota" => 7,
                )
            );

            $request = Request::instance();
            $A = $request["A"];
            $B = $request["B"];
            $C = $request["C"];

            $valor = "<ul>";

            foreach ($dados as $chave) {

                if ($chave['nota'] >= $A) {
                    $chave['nota'] = 'A';
                } else if ($chave['nota'] >= $B) {
                    $chave['nota'] = 'B';
                } else if ($chave['nota'] >= $C) {
                    $chave['nota'] = 'C';
                } else {
                    $chave['nota'] = 'C';
                }


                $valor .= "<li>{$chave["matricula"]} {$chave["aluno"]} {$chave["nota"]}</li>";
            }
            $valor .= "</ul>";
            return $valor;

    });
});