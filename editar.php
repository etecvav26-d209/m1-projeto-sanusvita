<?php

require_once 'config/conexao.php';

include 'includes/header.php';

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

<h2>Editor de Produto</h2>

<form method="POST">

 <input
    type="hidden"
    name="id"
    value="<?php echo $produto['id']; ?>">

    <input
    type="text"
    name="nome"
    value="<?php echo $produto['nome']; ?>"
    required>

    <br><br>

    <input
    type="text"
    name="fabricante"
    value="<?php echo $produto['fabricante']; ?>"
    required>

    <br><br>

    <input
    type="number"
    step="0.01"
    name="preco"
    value="<?php echo $produto['preco']; ?>"
    required>

    <br><br>

    <input
    type="number"
    name="estoque"
    value="<?php echo $produto['estoque']; ?>"
    required>

    <br><br>

       <button type="submit"> Salvar </button>

</form>

<?php

include 'includes/footer.php';

?>