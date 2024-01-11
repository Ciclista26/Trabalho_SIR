<?php
require_once __DIR__ . '../../db/connection.php';

/* function getAllVotacoes()
{
    $PDOStatement = $GLOBALS['pdo']->query('SELECT * FROM votacoes;');
    $votacoes = [];
    while ($listaDevotacoes = $PDOStatement->fetch()) {
        $votacoes[] = $listaDevotacoes;
    }
    return $votacoes;
} */
function getAllVotacoesByUserId($id_user)
{
    $sql = 'SELECT * FROM votacoes WHERE id_user = :id_user';
    $PDOStatement = $GLOBALS['pdo']->prepare($sql);
    $PDOStatement->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $PDOStatement->execute();

    $votacoes = [];
    while ($listaDevotacoes = $PDOStatement->fetch()) {
        $votacoes[] = $listaDevotacoes;
    }

    return $votacoes;
}
function getByIdOpcoes($id_votacao)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM opcoes WHERE id_votacao = ?;');
    $PDOStatement->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $PDOStatement->execute();

    $opcoes = [];
    while ($listaDevotacoes = $PDOStatement->fetch()) {
        $opcoes[] = $listaDevotacoes;
    }

    return $opcoes;
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
    $sqlCreate = "INSERT INTO 
    votacoes (
        id_user,
        nome_votacao, 
        objetivo_votacao,
        descricao_votacao) 
    VALUES (
        :id_user, 
        :nome_votacao, 
        :objetivo_votacao, 
        :descricao_votacao
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_user' => $votacao['id_user'],
        ':nome_votacao' => $votacao['nome_votacao'],
        ':objetivo_votacao' => $votacao['objetivo_votacao'],
        ':descricao_votacao' => $votacao['descricao_votacao']
    ]);

    if ($success) {
        $votacao['id_votacao'] = $GLOBALS['pdo']->lastInsertId();
        return $votacao;
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
    $sqlUpdate = "UPDATE  
    votacoes SET
            id_user = :id_user,
            nome_votacao = :nome_votacao,
            objetivo_votacao = :objetivo_votacao,
            descricao_votacao = :descricao_votacao
        WHERE id_votacao = :id_votacao
    ";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

    return $PDOStatement->execute([
        ':id_votacao' => $votacao['id_votacao'],
        ':id_user' => $votacao['id_user'],
        ':nome_votacao' => $votacao['nome_votacao'],
        ':objetivo_votacao' => $votacao['objetivo_votacao'],
        ':descricao_votacao' => $votacao['descricao_votacao']
    ]);
}
function removeOpcoesById($id_votacao)
{
    $query = 'DELETE FROM opcoes WHERE id_votacao = ?;';
    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->bindValue(1, $id_votacao, PDO::PARAM_INT);
    return $statement->execute();
}

function deleteVotacao($id_votacao)
{
    $queryOpcoes = 'DELETE FROM opcoes WHERE id_votacao = ?;';
    $statementOpcoes = $GLOBALS['pdo']->prepare($queryOpcoes);
    $statementOpcoes->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $successOpcoes = $statementOpcoes->execute();

    $queryVotacoes = 'DELETE FROM votacoes WHERE id_votacao = ?;';
    $statementVotacoes = $GLOBALS['pdo']->prepare($queryVotacoes);
    $statementVotacoes->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $successVotacoes = $statementVotacoes->execute();

    return $successVotacoes && $successOpcoes;
}


function responderVotacao($resposta)
{
    $sqlCreate = "INSERT INTO 
    respostas (
        id_votacao,
        id_user,
        texto_resposta
) 
    VALUES (
        :id_votacao,
        :id_user,
        :texto_resposta
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_votacao' => $resposta['id_votacao'],
        ':id_user' => $resposta['id_user'],
        ':texto_resposta' => $resposta['texto_resposta']
    ]);

    if ($success) {
        $resposta['id_resposta'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function getByIdRespostas($id_votacao)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM respostas WHERE id_votacao = ?;');
    $PDOStatement->bindValue(1, $id_votacao, PDO::PARAM_INT);
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function usuarioJaRespondeu($id_user, $id_votacao)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT COUNT(*) FROM respostas WHERE id_user = ? AND id_votacao = ?');
    $PDOStatement->bindValue(1, $id_user, PDO::PARAM_INT);
    $PDOStatement->bindValue(2, $id_votacao, PDO::PARAM_INT);
    $PDOStatement->execute();
    
    return $PDOStatement->fetchColumn() > 0;
}

