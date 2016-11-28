<?php

$id = $_GET["id"];
require_once 'dao/DaoProdutos.php';
$DaoProdutos = DaoProdutos::getInstance();
$dadosProdutoos = $DaoProdutos->getProdutos($id);
$exe = $DaoProdutos->deletar($id);
if ($exe) {

    $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino . $dadosProdutos["imagem"];

    chown($arquivoDestino, 777);
    
    unlink($arquivoDestino);

    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=produtos';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=produtos';"
    . "</script>";
}
