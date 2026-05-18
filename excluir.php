<?php

require_once 'config/conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

 $id = $_POST['id'];

  $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);

     $stmt->execute([

        ':id' => $id

    ]);

     if($stmt->rowCount() > 0){

        echo "Produto excluído com sucesso!";

    } else {

        echo "Produto não encontrado.";

    }

}
?>