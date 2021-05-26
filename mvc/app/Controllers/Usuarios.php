<?php


class Usuarios extends Controller
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }


    public function cadastrar()
    {
        $dados = [];

        if(isset($_POST['nome']))
        {
            $dados = [
                'nome'           => trim($_POST['nome']),
                'email'          => trim($_POST['email']),
                'senha'          => password_hash(trim($_POST['senha']), PASSWORD_DEFAULT),
                'confirma_senha' => trim($_POST['confirma_senha'])
            ];

            if(Checa::checarEmail($_POST['email']))
            {
                $dados['email_erro'] = 'O e-mail informado é invalido';

            }else if($this->usuarioModel->checarEmail($dados['email']))
            {
                $dados['email_erro'] = 'O e-mail ja existe';

            }else
            {
                if($this->usuarioModel->armazenar($dados))
                {
                    Sessao::mensagem('usuario','Cadastro realizado','alert alert-success');
                    Url::redirecionar('usuarios/login');

                } else{
                    die("<h1>Erro ao armazenar o usuario no banco de dados</h1>");
                }
            }
        }


        $this->view('usuarios/cadastrar', $dados);
    }

    public function login()
    {
        $dados = [];

        if(isset($_POST['email']))
        {
            $dados = [
                'email'          => trim($_POST['email']),
                'senha'          => trim($_POST['senha'])
            ];

            if(Checa::checarEmail($_POST['email']))
            {
                $dados['email_erro'] = 'O e-mail informado é invalido';

            }else
            {
                $usuario = $this->usuarioModel->checarLogin($dados['email'],$dados['senha']);

                if($usuario)
                {
                    $this->criarSessaoUsuario($usuario);

                    Url::redirecionar('posts');

                }else{
                    Sessao::mensagem('usuario','Senha ou usuario invalidos','alert alert-danger');

                }
            }
        }

        $this->view('usuarios/login', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {

        $_SESSION['usuario_id']    = $usuario->id;
        $_SESSION['usuario_nome']  = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;
    }

    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);



        Url::redirecionar('');
    }





}