<?php
session_start();
include_once '../model/TopCifras.php';

switch ($_GET['a']){

    case 'incl':
        $dado->musica = $_POST['musica'];
        $dado->artista = $_POST['artista'];
        TopCifras::createData($dado);
        break;

    case 'del':
        TopCifras::deleteData($_GET['id']);
        break;

    case 'edit':
        $dado->id = $_POST['id'];
        $dado->musica = $_POST['musica'];
        $dado->artista = $_POST['artista'];

        TopCifras::editData($dado);
        break;

}

header("Location: ../create.php");