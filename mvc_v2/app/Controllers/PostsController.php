<?php


class PostsController extends Controller
{
    private $postModel;

    public function __construct()
    {
        if(!isset($_SESSION['usuario_id']))
        {
            Url::redirecionar('usuarios/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $dados = [];

        $dados = [
            'posts' =>  $this->postModel->lerPosts()
        ];

        $this->view('posts/index',$dados);
    }


    public function cadastrar()
    {
        $dados = [];

        if(isset($_POST['titulo']))
        {
            $dados = [
                'titulo'         => trim($_POST['titulo']),
                'texto'          => trim($_POST['texto']),
                'usuario_id'     => $_SESSION['usuario_id']

            ];

            if($dados['titulo'] =='')
            {
                $dados['titulo_erro'] = 'campo vazio';

            }else
            {
                if($this->postModel->armazenar($dados))
                {
                    Sessao::mensagem('post','Cadastro realizado','alert alert-success');
                    Url::redirecionar('posts');

                } else{
                    die("<h1>Erro ao armazenar o posts no banco de dados</h1>");
                }
            }
        }


        $this->view('posts/cadastrar', $dados);
    }

    public function editar($id)
    {
        $dados = [];

        if(isset($_POST['titulo']))
        {
            $dados = [
                'id'             => $id,
                'titulo'         => trim($_POST['titulo']),
                'texto'          => trim($_POST['texto']),

            ];

            if($dados['titulo'] =='')
            {
                $dados['titulo_erro'] = 'campo vazio';

            }else
            {
                if($this->postModel->atualizar($dados))
                {
                    Sessao::mensagem('post','Post atualizado','alert alert-success');
                    Url::redirecionar('posts/editar/'.$id);

                } else{
                    die("<h1>Erro ao atualizar o posts no banco de dados</h1>");
                }
            }
        }

        $post = $this->postModel->lerPostPorId($id);

        $dados = [
            'id'             => $post->id,
            'titulo'         => $post->titulo,
            'texto'          => $post->texto
        ];

        $this->view('posts/editar', $dados);
    }

    public function ver($id)
    {
        $post = $this->postModel->lerPostPorId($id);


        if($post == null){
            Url::redirecionar('paginas/erro');
        }

        $dados = [
            'post' => $post
        ];

        $this->view('posts/ver', $dados);
    }

    public function excluir($id)
    {
        $exluir = $this->postModel->excluirPost($id);

        if($exluir)
        {
            Sessao::mensagem('post_excluido','Post excluido!','alert alert-success');
        }

        Url::redirecionar('posts');
    }



}