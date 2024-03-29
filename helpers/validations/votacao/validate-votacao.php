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

    if (empty($req['data_fim'])) {
        $errors['data_fim'] = 'O campo Fim da Votação não pode estar vazio.';
    } elseif (strtotime($req['data_fim']) <= time()) {
        $errors['data_fim'] = 'A data de Fim da Votação deve ser posterior à data atual.';
    }

    if (empty($req['objetivo']) || strlen($req['objetivo']) < 0 || strlen($req['objetivo']) > 50) {
        $errors['objetivo'] = 'O campo objetivo não pode estar vazio e deve ter entre 0 e 50 caracteres.';
    }

    if (empty($req['descricao']) || strlen($req['descricao']) < 0 || strlen($req['descricao']) > 1000) {
        $errors['descricao'] = 'O campo descricao não pode estar vazio e deve ter entre 0 e 250 caracteres.';
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
