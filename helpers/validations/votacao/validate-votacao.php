<?php

function validatedVotacao($req)
{
    $errors = [];

    foreach ($req as $key => $value) {
        $req[$key] =  trim($req[$key]);
    }

    if (empty($req['titulo']) || strlen($req['titulo']) < 0 || strlen($req['titulo']) > 50) {
        $errors['titulo'] = 'O campo titulo não pode estar vazio e deve ter entre 0 e 50 caracteres.';
    }

    if (empty($req['objetivo']) || strlen($req['objetivo']) < 0 || strlen($req['objetivo']) > 50) {
        $errors['objetivo'] = 'O campo objetivo não pode estar vazio e deve ter entre 0 e 50 caracteres.';
    }

    if (empty($req['descricao']) || strlen($req['descricao']) < 0 || strlen($req['descricao']) > 50) {
        $errors['descricao'] = 'O campo descricao não pode estar vazio e deve ter entre 0 e 50 caracteres.';
    }

    foreach ($req as $nome_campo => $valor) {
        if (preg_match('/^opcao\d+_text$/', $nome_campo)) {
            if (empty($valor) || strlen($valor) < 3 || strlen($valor) > 50) {
                $errors[$nome_campo] = "O campo {$nome_campo} não pode estar vazio e deve ter entre 0 e 50 caracteres.";
            }
        }
    }

    if (!empty($errors)) {
        return ['invalid' => $errors];
    }
    return $req;
}