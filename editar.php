<?php

require_once 'config/conexao.php';

if(isset($_POST['id'])){

    $id = $_POST['id'];

}

$sql = "SELECT * FROM produtos WHERE id = :id";

$stmt = $conexao->prepare($sql);

$stmt->execute([

    ':id' => $id

]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
       $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produtos SET

    nome = :nome,
    fabricante = :fabricante,
    preco = :preco,
    estoque = :estoque

    WHERE id = :id";

     $stmt = $conexao->prepare($sql);

     $stmt->execute([

        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque,
        ':id' => $id

    ]);

    echo "Produto atualizado com sucesso!";
}
?>