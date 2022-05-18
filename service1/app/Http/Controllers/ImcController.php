<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    /**
     * Método responsável por calcular o IMC
     * @method calcularImc
     * @param Request $request
     * @return json
     */
    public function calcularImc(Request $request)
    {
        //ARMAZENA OS VALORES RECEBIDOS DO POST EM UMA VARIÁVEL
        $data = $request->all();

        //VERIFICA A EXISTÊNCIA DOS VALORES NECESSÁRIOS PARA O CÁLCULO
        if (!isset($data['peso']) or !isset($data['altura'])) {
            return response()->json([
                'status'   => 'error',
                'message' => 'Por favor preencha todos os campos obrigatórios.'
            ]);
        }

        //CALCULA O IMC
        $imc = round(($data['peso'] / $data['altura'] ** 2), 2);

        //RECEBE A CLASSIFICAÇÃO DE IMC
        $classificacao = self::verificarClassificacao($imc);
        
        return response()->json([
            'status'   => 'success',
            'message' => 'Ação realizada com sucesso.',
            'imc' => $imc,
            'classificacao' => $classificacao
        ]);
    }

    /**
     * Método responsável por retornar a classificação de IMC
     * @method verificarClassificacao
     * @param float $imc
     * @return string
     */
    public static function verificarClassificacao(float $imc)
    {
        //VERIFICA SE EXISTE VALOR
        if (!isset($imc)) return false;

        //RETORNA A FAIXA DE CLASSIFICAÇÃO DO IMC
        switch ($imc) {
            case ($imc < 18.5):
                return 'Baixo peso';
                break;
            case ($imc >= 18.5 and $imc <= 24.9):
                return 'Peso saudável';
                break;
            case ($imc > 24.9 and $imc <= 29.9):
                return 'Sobrepeso';
                break;
            case ($imc > 29.9 and $imc <= 34.5):
                return 'Obesidade grau I';
                break;
            case ($imc > 34.5 and $imc <= 39.9):
                return 'Obesidade grau II';
                break;
            case ($imc >= 40):
                return 'Obesidade grau III';
                break;
        }
    }
}
