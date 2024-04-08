<?php

echo "<h3>Lista de Clientes</h3>";
$utilizador_query = $mysqli->query('SELECT * FROM utilizador WHERE tipo = 2 ORDER BY nome ASC');
echo "<table class='table table-striped' ><tr><td>Id</td><td>Nome Cliente</td><td>Login</td><td>Email</td></tr>";
    while ($utilizador = $utilizador_query->fetch_object()) :
        //echo $utilizador->id;
        echo "<tr><td>".$utilizador->id."</td><td>".$utilizador->nome ." </td><td>".$utilizador->login. " </td><td>" . $utilizador->email . " </td></tr>";
    endwhile;
    echo "</table>";
echo "<h3>Lista de Produtos</h3>";
$produtos_query = $mysqli->query('SELECT * FROM produtos ORDER BY nome ASC');
echo "<table class='table table-striped' ><tr><td>Id</td><td>Nome Produto</td><td>Preço</td></tr>";

while ($produto = $produtos_query->fetch_object()) :
      
    //echo $produto->id;
        echo "<tr><td>".$produto->id."</td><td>".$produto->nome ."</td><td>".$produto->preco. "</td></tr>";
    endwhile;
    echo "</table>";
    echo "<h3>Compras efetuadas</h3>";
    $pedidos_query = $mysqli->query("SELECT c.id, c.quantidade, p.nome, p.preco, u.nome as nomecliente FROM compra as c,produtos as p, utilizador as u WHERE c.idproduto = p.id and c.idutilizador = u.id   ");
    echo "<table class='table table-striped' ><tr><td>Id</td><td>Nome Cliente</td><td>Produto</td><td>Preço</td><td>Quantidade</td><td>Total</td></tr>";
        while ($pedido = $pedidos_query->fetch_object()) :
        //echo $pedido->id;
        echo "<td>" . $pedido->id." </td><td>" . $pedido->nomecliente . "</td><td> ".$pedido->nome ." </td><td> € ".$pedido->preco." </td><td> " .$pedido->quantidade . "</td><td> € " .$pedido->quantidade * (float) $pedido->preco.".00 </td></tr>";
    endwhile;
    echo "</table>";


