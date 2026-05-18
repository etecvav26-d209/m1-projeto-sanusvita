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

    

}

?>
