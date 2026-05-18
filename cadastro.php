<?php

require_once 'config/conexao.php';

include 'includes/header.php';

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

<h2>Cadastrar Produto</h2>

<form method="POST">

<input type="text" name="nome" placeholder="Nome do produto" required>
    <br><br>

    <input type="text" name="fabricante" placeholder="Fabricante" required>
    <br><br>

    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <br><br>

    <input type="number" name="estoque" placeholder="Estoque" required>
    <br><br>

      <button type="submit">Cadastrar.</button>

</form>

<?php

include 'includes/footer.php';

?>