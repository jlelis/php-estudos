<?php

$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);
if (isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == False) {
    $nomeArquivo = md5(time() . rand(0, 99));
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/' . $arquivo['name']);

    echo "Arquivo enviado com Sucesso";
}
