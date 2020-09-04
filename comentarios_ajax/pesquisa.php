<?php
    header('Content-Type: application/json');

    $pdo = new PDO('mysql:host=localhost; dbname=comentarios_ajax;', 'root', '');

    $selecione = $_GET['selecione'];

    $stmt = $pdo->prepare("SELECT * FROM comments where name = '$selecione'" );
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('Nenhum comentário encontrado');
    }