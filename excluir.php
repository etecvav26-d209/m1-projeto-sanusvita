<?php

require_once 'config/conexao.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

 $id = $_POST['id'];

  $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);

     $stmt->execute([

        ':id' => $id

    ]);

     if($stmt->rowCount() > 0){

          header("Location: index.php");
    exit;

    } else {

        echo "Produto não encontrado.";

    }

}

include 'includes/footer.php';
?>