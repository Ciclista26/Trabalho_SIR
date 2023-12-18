<?php

function validatedUser($req)
{
    foreach ($req as $key => $value) {
        $req[$key] =  trim($req[$key]);
    }

    if (empty($req['name']) || strlen($req['name']) < 3 || strlen($req['name']) > 255) {
        $errors['name'] = 'O campo Nome não pode estar vazio e deve ter entre 3 e 255 caracteres.';
    }

    if (empty($req['lastname']) || strlen($req['lastname']) < 3 || strlen($req['lastname']) > 255) {
        $errors['lastname'] = 'O campo Apelido não pode estar vazio e deve ter entre 3 e 255 caracteres.';
    }

    if (!preg_match('/^\d{9}$/', $req['phoneNumber'])) {
        $errors['phoneNumber'] = 'O campo Telemóvel não pode estar vazio e deve ter 9 números.';
    }

    if (!preg_match('/^\d{9}$/', $req['ccNumber'])) {
        $errors['ccNumber'] = 'O campo Cartão de Cidadão não pode estar vazio e deve ter 9 números.';
    }

    if (empty($req['email']) || !filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'O campo Email não pode estar vazio e deve ter o formato de e-mail, por exemplo: nome@example.com.';
    }

    // if (getByEmail($req['email'])) {
    //     $errors['email'] = 'Email já registado no nosso sistema.';
    //     return ['invalido' => $errors];
    // }

    $req['administrator'] = !empty($req['administrator']) == 'on' ? true : false;

    if (isset($errors)) {
        return ['invalid' => $errors];
    }
    return $req;
}
?>