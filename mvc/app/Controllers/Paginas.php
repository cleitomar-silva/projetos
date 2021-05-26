<?php


class Paginas extends Controller
{

    public function index()
    {

        $dados = [
            'titulo'    => 'Página Inicial',
            'descricao' => 'modelo mvc'
        ];

        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'titulo'    => 'Página sobre nós'
        ];

        $this->view('paginas/sobre', $dados);
    }




}