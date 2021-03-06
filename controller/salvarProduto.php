<?php
include_once '../model/clsProduto.php';
include_once '../dao/clsProdutoDAO.php';
include_once '../dao/clsConexao.php';

if(isset($_REQUEST['inserir'])){
	$produto = new Produto();
	$produto->setNome($_POST['txtNome']);
	$produto->setPreco($_POST['txtPreco']);
	$produto->setQuantidade($_POST['txtQuantidade']);
        
	ProdutoDAO::inserir($produto);

	header("Location: ../index.php");
}

if(isset($_REQUEST['editar'])){
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutosById($id);
        
    $produto->setNome($_POST['txtNome']);
    $produto->setPreco($_POST['txtPreco']);
    $produto->setQuantidade($_POST['txtQuantidade']);
   
    ProdutoDAO::editar($produto);
    
    header("Location: ../index.php");
    
}

if(isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutosById($id);
    echo '<br><br><hr><h3>Confirma a exclusão do produto '.$produto->getNome().'? '
            . '</h3> <br><hr>';
            echo '<a href="?confirmaExcluir&idProduto='.$id.'"><button>SIM</button></a> ';
            echo '<a href="../index.php"><button>NÃO</button></a>';
}

/*Mudanças do Rafael */

if(isset($_REQUEST['confirmaExcluir'])){
    $id = $_REQUEST['idProduto'];
    $produto = new Produto();
    $produto->setId($id);
    ProdutoDAO::excluir($produto);
    header("Location: ../index.php");
}