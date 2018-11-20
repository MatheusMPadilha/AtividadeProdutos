<?php
include_once 'model/clsProduto.php';
include_once 'dao/clsConexao.php';
include_once 'dao/clsProdutoDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1 align="center">Produtos</h1>

        <br><br><br>

        <a href="frmProduto.php">
        	<button>Cadastrar novo produto</button></a>

        <br><br>
        
        <?php
        
        $lista = ProdutoDAO::getProdutos();
        
        if($lista->count() == 0){
            echo '<h3><b>Nenhum produto cadastrado!</b></h3>';
        } else {                 
            
        ?>

        <table border="1">
            
            <tr>
                <th>Código</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total do Produto</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
           
            
            <?php
            
                
                $total = 0;
                
                    foreach ($lista as $produto){
                        
                        $totalProduto = $produto->getQuantidade()*$produto->getPreco();
                        
                        echo '<tr> ';
                        echo '  <td>'.$produto->getId().'</td>';
                        echo '  <td>'.$produto->getNome().'</td>';
                        echo '  <td>'."R$ ".$produto->getPreco().'</td>';
                        echo '  <td>'.$produto->getQuantidade().'</td>';
                        echo '  <td>'.$totalProduto.'</td>';
                                                
                        $total = $total+$totalProduto;
                                                
                        echo '<td><a href="frmProduto.php?editar&idProduto='.$produto->getId().'"><button>Editar</button></a> </td>';
                        echo '<td><a href="controller/salvarProduto.php?excluir&idProduto='.$produto->getId().'"><button>Excluir</button></a> </td>';
                        echo '</tr>';
                            
                    }                    
                               
            ?>
            
                        
        </table>
        
        <?php
        }
        ?>
        
        <h2>Total: <?php echo 'R$'.$total;?> </h2>

    </body>
</html>


