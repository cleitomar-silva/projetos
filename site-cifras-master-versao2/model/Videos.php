<?php

include_once 'Connection.php';

class Videos{

    public static function listVideos()
    {
        $con = new Connection();
        $all = $con->runQuery("select * from videos order by id desc");
        $con->closeConnection();

        return $all;
    }

    public static function createVideos($dado)
    {
        $con = new Connection();
        $con->runData("insert into videos (video) values ('$dado->video')");
        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-sucesso'] = true;

        }else
        {
            $_SESSION['msg-error'] = true;
        }
        $con->closeConnection();
    }

    public static function deleteVideos($id){
        $con = new Connection();
        $con->runData("delete from videos where id = $id ");
        $con->closeConnection();
    }

}