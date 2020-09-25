<?php

include_once '../model/Cliente.php';

switch($_GET['a']){
    case 'novo': 
        $data->nome = $_POST['nome'];
        Cliente::create($data);
    break; 

    case 'update': 
        $data->id = $_POST['id'];
        $data->nome = $_POST['nome'];
        Cliente::update($data);
    break; 

    case 'destroy':        
        Cliente::destroy($_GET['id']);
    break; 
}

header("Location: ../view");