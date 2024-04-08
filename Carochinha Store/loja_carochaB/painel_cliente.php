<style> 
    .form-compra{
        max-width: 500px;
        margin: 50px auto;
        border: 2px solid #000;
        padding: 20px;
        color: #fff;
        background-color:#1d2631 ;
    }
</style>
<?php
include 'protect.php';

include 'connection.php';
$idutilizador = $_SESSION['idutilizador'];
      
if(isset($_GET["comprar"])){

        echo "<div class='form-compra'>"; 
        $idproduto=$_GET["id"];
        $produtos_query = $mysqli->query("SELECT * FROM produtos WHERE id=$idproduto");

        while ($produto = $produtos_query->fetch_object()) :
            echo "Produto: ".$produto->nome ." € ".$produto->preco. "<br>";

        //echo $produto->id;
        ?>
        <form action="painel_cliente.php" method="post">
            <input type="hidden" name="idproduto" value="<?php echo $produto->id; ?>">
            <br>
            Quantidade <input type="number" name="quantidade" value="">
            <input type="submit" name="comprarproduto" value="Comprar"/> 
        </form>
        <?php
            endwhile;

        }else if(isset($_POST['comprarproduto'])){
            // session_start();

      $idproduto = $_POST['idproduto'];
      $quantidade = $_POST['quantidade'];
      $sql = "INSERT INTO compra (`idutilizador`,`idproduto`, `quantidade`) 
      VALUES ('$idutilizador', '$idproduto', '$quantidade')";
                 
        // Se os dados forem inseridos com sucesso
        if($mysqli->query($sql) === TRUE) {
            echo "sucesso"; 
            } else {
            echo "erro";
            }
            echo "<a href='painel.php'>Voltar</a>"; 
    }else {
        echo "<h3>Lista de Produtos</h3>";
$produtos_query = $mysqli->query('SELECT * FROM produtos ORDER BY nome ASC');
echo "<table class='table table-striped' ><tr><td>Id</td><td>Nome Produto</td><td>Preço</td><td>Comprar</td></tr>";

        while ($produto = $produtos_query->fetch_object()) :
        $ProdutoId = $produto->id;
        echo "<tr><td>".$produto->id."</td><td>".$produto->nome ."</td><td> € ".$produto->preco. "</td><td><a href='painel_cliente.php?comprar&id=".$produto->id."'>Comprar</a></td></tr>";
    
    endwhile;
    echo "</table>";
    echo "<h3>Meus Pedidos</h3>";
    $pedidos_query = $mysqli->query("SELECT c.id, c.quantidade, p.nome, p.preco FROM compra as c,produtos as p WHERE c.idproduto = p.id and c.idutilizador = $idutilizador
    ");
    echo "<table class='table table-striped' ><tr><td>Id</td><td>Produto</td><td>Preço</td><td>Quantidade</td><td>Total</td></tr>";
        while ($pedido = $pedidos_query->fetch_object()) :
        //echo $pedido->id;
        echo "<td>" . $pedido->id." </td><td> ".$pedido->nome ." </td><td> € ".$pedido->preco." </td><td> " .$pedido->quantidade . "</td><td> € " .$pedido->quantidade * (float) $pedido->preco.".00 </td></tr>";
    endwhile;
    echo "</table>";

}  

?>
