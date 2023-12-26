<?php
require_once __DIR__ . '../../db/connection.php';
//function para a parte da votacao

function getAllVotacoes()
{
    $PDOStatement = $GLOBALS['pdo']->query('SELECT * FROM votacoes;');
    $votacoes = [];
    while ($listaDevotacoes = $PDOStatement->fetch()) {
        $votacoes[] = $listaDevotacoes;
    }
    return $votacoes;
}

function getByIdVotacao($id_votacao)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM votacoes WHERE id_votacao = ?;');
    $PDOStatement->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function createVotacao($votacao)
{
    // Write the $votacao array to the error log
    error_log(print_r($votacao, true));

    $sqlCreate = "INSERT INTO 
    votacoes (
        nome_votacao, 
        objetivo_votacao,
        descricao_votacao) 
    VALUES (
        :nome_votacao, 
        :objetivo_votacao, 
        :descricao_votacao
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':nome_votacao' => $votacao['nome_votacao'],
        ':objetivo_votacao' => $votacao['objetivo_votacao'],
        ':descricao_votacao' => $votacao['descricao_votacao']
    ]);

    if ($success) {
        $votacao['id_votacao'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function createOpcao($opcoes)
{
    $sqlCreate = "INSERT INTO 
    opcoes (
        id_votacao, 
        texto_opcao) 
    VALUES (
        :id_votacao, 
        :texto_opcao
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_votacao' => $opcoes['id_votacao'],
        ':texto_opcao' => $opcoes['texto_opcao'],
    ]);

    if ($success) {
        $opcoes['id_opcao'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function updateVotacao($votacao)
{
    $sqlUpdateVotacoes = "
        UPDATE votacoes
        SET
            nome_votacao = :nome_votacao,
            objetivo_votacao = :objetivo_votacao,
            descricao_votacao = :descricao_votacao
        WHERE id_votacao = :id_votacao
    ";

    $statementVotacoes = $GLOBALS['pdo']->prepare($sqlUpdateVotacoes);

    $successVotacoes = $statementVotacoes->execute([
        ':nome_votacao' => $votacao['nome_votacao'],
        ':objetivo_votacao' => $votacao['objetivo_votacao'],
        ':descricao_votacao' => $votacao['descricao_votacao'],
        ':id_votacao' => $votacao['id_votacao']
    ]);

    $sqlUpdateOpcoes = "
        UPDATE opcoes
        SET
            texto_opcao = :texto_opcao
        WHERE id_opcao = :id_opcao
    ";

    foreach ($votacao['opcoes'] as $opcao) {
        $statementOpcoes = $GLOBALS['pdo']->prepare($sqlUpdateOpcoes);

        $successOpcoes = $statementOpcoes->execute([
            ':texto_opcao' => $opcao['texto_opcao'],
            ':id_opcao' => $opcao['id_opcao']
        ]);

        if (!$successOpcoes) {
            return false;
        }
    }

    return $successVotacoes;
}

function deleteVotacao($id_votacao)
{
    $queryVotacoes = 'DELETE FROM votacoes WHERE id_votacao = ?;';
    $statementVotacoes = $GLOBALS['pdo']->prepare($queryVotacoes);
    $statementVotacoes->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $successVotacoes = $statementVotacoes->execute();

    $queryOpcoes = 'DELETE FROM opcoes WHERE id_votacao = ?;';
    $statementOpcoes = $GLOBALS['pdo']->prepare($queryOpcoes);
    $statementOpcoes->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $successOpcoes = $statementOpcoes->execute();

    return $successVotacoes && $successOpcoes;
}
