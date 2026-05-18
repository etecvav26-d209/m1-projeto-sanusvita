<?php

require_once 'config/conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$stmt = $conexao->prepare($sql);

$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Lista dos Produtos</h2>

<?php

foreach($produtos as $produto){

        echo "<hr>";

    echo "ID: " . $produto['id'] . "<br>";

    echo "Nome: " . $produto['nome'] . "<br>";

    echo "Fabricante: " . $produto['fabricante'] . "<br>";

    echo "Preço: R$ " . $produto['preco'] . "<br>";

    echo "Estoque: " . $produto['estoque'] . "<br>";

}

?>

<form action="excluir.php" method="POST">

    <input
    type="hidden"
    name="id"
    value="<?php echo $produto['id']; ?>">

    <button type="submit">
        Excluir
    </button>

</form>
