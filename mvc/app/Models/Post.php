<?php


class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function lerPosts()
    {
        $this->db->query("SELECT  p.id as idPost,
                                      p.usuario_id,
                                      p.titulo,
                                      p.texto,
                                      p.criado_em,
                                        
                                      u.id as idUsuario,
                                      u.nome,
                                      u.email
       
                                     FROM posts p
                                     INNER JOIN usuarios u ON  u.id = p.usuario_id
                                    ");
        return $this->db->resultados();
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO posts(usuario_id,titulo, texto) VALUES (:usuario_id, :titulo, :texto) ");

        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->executa())
        {
            return true;

        }else
        {
            return false;
        }
    }

    public function atualizar($dados)
    {
        $this->db->query("UPDATE posts SET titulo = :titulo, texto = :texto WHERE id = :id");
        $this->db->bind("id", $dados['id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->executa())
        {
            return true;

        }else
        {
            return false;
        }
    }



    public function lerPostPorId($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function excluirPost($id)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");
        $this->db->bind('id', $id);

        if($this->db->executa())
        {
            return true;

        }else
        {
            return false;
        }

    }



}