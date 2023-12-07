<?php
require_once __DIR__ . '../../db/connection.php';

function createUser($user)
{
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
    $sqlCreate = "INSERT INTO 
    users (
        name, 
        lastname, 
        phoneNumber, 
        ccNumber,
        email, 
        foto, 
        administrator, 
        password) 
    VALUES (
        :name, 
        :lastname, 
        :phoneNumber, 
        :ccNumber,
        :email, 
        :foto, 
        :administrator, 
        :password
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':name' => $user['name'],
        ':lastname' => $user['lastname'],
        ':phoneNumber' => $user['phoneNumber'],
        ':ccNumber' => $user['ccNumber'],
        ':email' => $user['email'],
        ':foto' => $user['foto'],
        ':administrator' => $user['administrator'],
        ':password' => $user['password']
    ]);

    if ($success) {
        $user['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function getById($id)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM users WHERE id = ?;');
    $PDOStatement->bindValue(1, $id, PDO::PARAM_INT);
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function getByEmail($email)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM users WHERE email = ? LIMIT 1;');
    $PDOStatement->bindValue(1, $email);
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function getAll()
{
    $PDOStatement = $GLOBALS['pdo']->query('SELECT * FROM users;');
    $users = [];
    while ($listaDeusers = $PDOStatement->fetch()) {
        $users[] = $listaDeusers;
    }
    return $users;
}

function updateUser($user)
{
    if (isset($user['password']) && !empty($user['password'])) {
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE  
        users SET
            name = :name, 
            lastname = :lastname, 
            phoneNumber = :phoneNumber, 
            ccNumber = :ccNumber,
            email = :email, 
            foto = :foto, 
            administrator = :administrator, 
            password = :password
        WHERE id = :id;";

        $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

        return $PDOStatement->execute([
            ':id' => $user['id'],
            ':name' => $user['name'],
            ':lastname' => $user['lastname'],
            ':phoneNumber' => $user['phoneNumber'],
            ':ccNumber' => $user['ccNumber'],
            ':email' => $user['email'],
            ':foto' => $user['foto'],
            ':administrator' => $user['administrator'],
            ':password' => $user['password']
        ]);
    }

    $sqlUpdate = "UPDATE  
    users SET
        name = :name, 
        lastname = :lastname, 
        phoneNumber = :phoneNumber, 
        ccNumber = :ccNumber,
        email = :email, 
        foto = :foto, 
        administrator = :administrator
    WHERE id = :id;";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

    return $PDOStatement->execute([
        ':id' => $user['id'],
        ':name' => $user['name'],
        ':lastname' => $user['lastname'],
        ':phoneNumber' => $user['phoneNumber'],
        ':ccNumber' => $user['ccNumber'],
        ':email' => $user['email'],
        ':foto' => $user['foto'],
        ':administrator' => $user['administrator']
    ]);
}

function updatePassword($user)
{
    if (isset($user['password']) && !empty($user['password'])) {
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE  
        users SET
            name = :name, 
            password = :password
        WHERE id = :id;";

        $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

        return $PDOStatement->execute([
            ':id' => $user['id'],
            ':name' => $user['name'],
            ':password' => $user['password']
        ]);
    }
}

function deleteUser($id)
{
    $PDOStatement = $GLOBALS['pdo']->prepare('DELETE FROM users WHERE id = ?;');
    $PDOStatement->bindValue(1, $id, PDO::PARAM_INT);
    return $PDOStatement->execute();
}

function createNewUser($user)
{
    // Hash da senha
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

    $sqlCreate = "INSERT INTO 
    users (
        name,
        ccNumber, 
        email,
        password,
        administrator) 
    VALUES (
        :name,
        :ccNumber,
        :email, 
        :password,
        0
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    // Execução da consulta com os valores fornecidos
    $success = $PDOStatement->execute([
        ':name' => $user['name'],
        ':email' => $user['email'],
        ':ccNumber' => $user['ccNumber'],
        ':password' => $user['password']
    ]);

    if ($success) {
        $user['id'] = $GLOBALS['pdo']->lastInsertId();
        return $user;
    }

    return false;
}
//function para a parte da votacao
function createQuestionario($questionario)
{
    $sqlCreate = "INSERT INTO 
    questionarios (nome_questionario) 
    VALUES (:nome_questionario)";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':nome_questionario' => $questionario['nome_questionario']
    ]);

    if ($success) {
        $questionario['id_questionario'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function createPergunta($pergunta)
{
    $sqlCreate = "INSERT INTO 
    perguntas (id_questionario, tipo_pergunta, texto_pergunta) 
    VALUES (:id_questionario, :tipo_pergunta, :texto_pergunta)";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_questionario' => $pergunta['id_questionario'],
        ':tipo_pergunta' => $pergunta['tipo_pergunta'],
        ':texto_pergunta' => $pergunta['texto_pergunta']
    ]);

    if ($success) {
        $pergunta['id_pergunta'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function createOpcao($opcao)
{
    $sqlCreate = "INSERT INTO 
    opcoes (id_pergunta, texto_opcao) 
    VALUES (:id_pergunta, :texto_opcao)";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_pergunta' => $opcao['id_pergunta'],
        ':texto_opcao' => $opcao['texto_opcao']
    ]);

    return $success;
}
