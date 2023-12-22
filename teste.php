<?php
# EASY DATABASE SETUP
require __DIR__ . '/infra/db/connection.php';

# DROP TABLES (if needed)
$pdo->exec('DROP TABLE IF EXISTS users;');

echo 'Tables users deleted!' . PHP_EOL;
# CREATE USERS TABLE
$pdo->exec(
    'CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        name varchar(50), 
        lastname varchar(50), 
        phoneNumber varchar(50), 
        ccNumber varchar(50),
        email varchar(50) NOT NULL, 
        foto varchar(50) NULL, 
        administrator bit, 
        password varchar(200)
    );'
);

echo 'Table "users" created!' . PHP_EOL;

# DEFAULT USER TO ADD
$user = [
    'name' => 'Rui',
    'lastname' => 'Alves',
    'phoneNumber' => '987654321',
    'ccNumber' => '123456789',
    'email' => 'rui.alves@estg.ipvc.pt',
    'foto' => null,
    'administrator' => true,
    'password' => '123456'
];

# HASH PWD
$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

# INSERT USER
$sqlCreateUser = "INSERT INTO 
    users (
        name, 
        lastname, 
        phoneNumber, 
        ccNumber,
        email, 
        foto, 
        administrator, 
        password
    ) 
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

# PREPARE USER QUERY
$PDOStatementUser = $pdo->prepare($sqlCreateUser);

# EXECUTE USER QUERY
$successUser = $PDOStatementUser->execute([
    ':name' => $user['name'],
    ':lastname' => $user['lastname'],
    ':phoneNumber' => $user['phoneNumber'],
    ':ccNumber' => $user['ccNumber'],
    ':email' => $user['email'],
    ':foto' => $user['foto'],
    ':administrator' => $user['administrator'],
    ':password' => $user['password']
]);

echo 'Default user created!' . PHP_EOL;

# CREATE votacoes TABLE
try {
    $pdo->exec(
        'CREATE TABLE votacoes (
            id_votacao INTEGER PRIMARY KEY AUTO_INCREMENT,
            nome_votacao varchar(255),
            descricao_votacao varchar(255)
        );'
    );

    echo 'Table "votacoes" created!' . PHP_EOL;
} catch (PDOException $e) {
    if ($e->getCode() == '42S01' && strpos($e->getMessage(), 'already exists') !== false) {
        echo 'Table "votacoes" already exists!' . PHP_EOL;
    } else {
        echo 'Error creating table "votacoes": ' . $e->getMessage() . PHP_EOL;
    }
}

# CREATE PERGUNTAS TABLE
try {
    $pdo->exec(
        'CREATE TABLE perguntas (
            id_pergunta INT PRIMARY KEY AUTO_INCREMENT,
            id_votacao INT,
            texto_pergunta TEXT,
            FOREIGN KEY (id_votacao) REFERENCES votacoes(id_votacao)
        );'
    );

    echo 'Table "perguntas" created!' . PHP_EOL;
} catch (PDOException $e) {
    if ($e->getCode() == '42S01' && strpos($e->getMessage(), 'already exists') !== false) {
        echo 'Table "perguntas" already exists!' . PHP_EOL;
    } else {
        echo 'Error creating table "perguntas": ' . $e->getMessage() . PHP_EOL;
    }
}

# CREATE OPCOES TABLE
try {
    $pdo->exec(
        'CREATE TABLE opcoes (
            id_opcao INT PRIMARY KEY AUTO_INCREMENT,
            id_pergunta INT,
            texto_opcao TEXT,
            FOREIGN KEY (id_pergunta) REFERENCES perguntas(id_pergunta)
        );'
    );

    echo 'Table "opcoes" created!' . PHP_EOL;
} catch (PDOException $e) {
    if ($e->getCode() == '42S01' && strpos($e->getMessage(), 'already exists') !== false) {
        echo 'Table "opcoes" already exists!' . PHP_EOL;
    } else {
        echo 'Error creating table "opcoes": ' . $e->getMessage() . PHP_EOL;
    }
}
