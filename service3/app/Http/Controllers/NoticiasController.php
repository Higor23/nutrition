<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;


class NoticiasController extends Controller
{

    protected $noticia;

    public function __construct(Noticia $noticia)
    {
       $this->noticia = $noticia; 
    }

    /**
     * Método responsável por cadastrar um usuario do banco de dados
     * @method cadastrarUsuario
     * @param Request $request
     * @return json
     */
    public function listarNoticias()
    {
        $noticias = $this->noticia->all();
        return response($noticias, 200);
    }
}
