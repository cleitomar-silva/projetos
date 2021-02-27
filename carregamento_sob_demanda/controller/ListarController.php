<?php

include_once "../model/Listar.php";


$retorno = Listar::listData($_POST['page']);
echo json_encode($retorno);
