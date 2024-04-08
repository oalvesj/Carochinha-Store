<?php

use DB\Connection;

include '../main.php';
include '../db/Connection.php';

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$telemovel = $_POST['telemovel'];
$produto_id = $_POST['produto_id'];
$qtd = $_POST['qtd'];
$orcamento_estimado = preg_replace('/[^0-9.]/', '', $_POST['orcamento_estimado']);

try 
{
    if (empty($nome)) 
    {
        throw new \Exception('Preencha um nome válido');
    }

    if (empty($apelido)) 
    {
        throw new \Exception('Preencha um apelido');
    }

    if (empty($telemovel)) 
    {
        throw new \Exception('Preencha um telemóvel');
    }

    $conexao = new Connection();

    $produto_query = $conexao->query("SELECT * FROM produtos WHERE id = '{$produto_id}'");
    $produto_result = $produto_query->fetch_object();

    if (empty($produto_result->id)) 
    {
        throw new \Exception('Preencha um produto válido');
    }

    $orcamento_estimado = $produto_result->preco * $qtd;

    if ($qtd == 2) 
    {
        $orcamento_estimado = ($orcamento_estimado - ($orcamento_estimado * 0.2));
    } else if ($qtd >= 3) 
    {
        $orcamento_estimado = ($orcamento_estimado - ($orcamento_estimado * 0.3));
    }

    $conexao->insert('orcamentos', [
        'nome' => $nome,
        'apelido' => $apelido,
        'telemovel' => $telemovel,
        'produto_id' => $produto_id,
        'qtd' => $qtd,
        'orcamento_estimado' => $orcamento_estimado
    ]);

    return response_json([
        'status' => 'success',
        'message' => 'Orçamento realizado com sucesso'
    ]);
} catch (Throwable $e) 
{
    return response_json([
        'status' => 'error',
        'message' => 'Erro ao realizar orçamento: ' . $e->getMessage()
    ]);
}