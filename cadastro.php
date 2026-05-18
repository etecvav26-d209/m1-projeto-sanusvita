<?php

require_once 'config/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

$nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

  $sql = "INSERT INTO produtos
    (nome, fabricante, preco, estoque)
    VALUES
    (:nome, :fabricante, :preco, :estoque)";

    $stmt = $conexao->prepare($sql); 

     $stmt->execute([

        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque

    ]);

    if ($conexao->lastInsertId()) {

    echo "Produto cadastrado com sucesso! ID: " . $conexao->lastInsertId();
    }

}

?>