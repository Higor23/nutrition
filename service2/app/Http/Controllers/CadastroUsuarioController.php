<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CadastroUsuarioController extends Controller
{
    /**
     * Método responsável por cadastrar um usuario do banco de dados
     * @method cadastrarUsuario
     * @param Request $request
     * @return json
     */
    public function cadastrarUsuario(Request $request)
    {
        //VERIFICA A EXISTÊNCIA DOS VALORES NECESSÁRIOS PARA O CADASTRO
        if (!isset($request['name']) or !isset($request['email'])) {
            return response()->json([
                'status'   => 'error',
                'message' => 'Por favor preencha todos os campos obrigatórios.'
            ]);
        }

        //INSTANCIA A CLASSE USER
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        // SALVA OS DADOS NO BANCO
        $user->save();

        return response($user, 201);
    }
}
