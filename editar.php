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

?>