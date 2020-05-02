<?php

try {
    $dsn = "mysql:dbname=northwind;host=localhost";
    $dbuser = "admin";
    $dbpass = "admin";
    $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    die($e->getMessage());
}
/*
1. calcular a quantidade total de páginas.
2. definir o $p.
3. fazer a query com LIMIT
*/
$qtd_por_pagina = 30;

//definindo uma variavel $tabela para teste em tabelas
$tabela = "customers";

//pegando o total registros da tabela
$total = 0;

$sql = "SELECT COUNT(*) as c FROM $tabela";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];

//definição da estrutura que mostra a quantidade de registro por pagina.
$paginas = $total / $qtd_por_pagina;

$pg = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $pg = addslashes($_GET['p']);
}
$p = ($pg - 1) * $qtd_por_pagina;

//sql limititando a exibição na página.
$sql = "SELECT * FROM $tabela LIMIT $p,$qtd_por_pagina";
$sql = $pdo->query($sql);

if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $item) {
        echo $item['CustomerID'] . ' - ' . $item['ContactName'] . '<br/>';
    }
}
echo "<br/>";

//link com as numerações com as proximas paginas
for ($i = 0; $i < $paginas; $i++) {
    echo '<a href="/paginacao.php/?p=' . ($i + 1) . '">[' . ($i + 1) . ']</a>';
}
echo '<br/>' . "Total de Páginas: " . (int) $paginas;
