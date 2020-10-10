<?php
session_start();

include_once '../model/Videos.php';

switch ($_GET['a'])
{
    case 'inclu':
        $dado->video = $_POST['video'];
        Videos::createVideos($dado);
        break;

    case 'del':
        Videos::deleteVideos($_GET['id']);
        break;

}

header("Location: ../create.php");