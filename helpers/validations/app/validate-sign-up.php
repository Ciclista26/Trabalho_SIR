<?php

function isSignUpValid($req)
{
    foreach ($req as $key => $value) {
        $req[$key] = trim($req[$key]);
    }

    if (empty($req['name']) || strlen($req['name']) < 3 || strlen($req['name']) > 255) {
        $errors['name'] = 'O campo de nome não pode estar vazio e deve ter entre 3 e 255 caracteres.';
    }

    if (empty($req['ccNumber']) || strlen($req['ccNumber']) < 9) {
        $errors['ccNumber'] = 'O campo de Número do Cartão de Crédito não pode estar vazio e deve ter pelo menos 9 caracteres.';
    }

    if (empty($req['email']) || !filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'O campo de E-mail não pode estar vazio e deve ter um formato de e-mail válido, por exemplo: nome@example.com.';
    }

    if (getByEmail($req['email'])) {
        $errors['email'] = 'E-mail já registado no sistema. Se você não consegue lembrar sua senha, por favor, entre em contacto connosco.';
        return ['invalid' => $errors];
    }

    if (empty($req['password']) || strlen($req['password']) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $req['password'])) {
        $errors['password'] = 'O campo de Senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.';
    }

    if ($req['confirm_password'] != $req['password']) {
        $errors['confirm_password'] = 'O campo de Confirmação de Senha não pode estar vazio e deve ser o mesmo que o campo de Senha.';
    }

    if (isset($errors)) {
        return ['invalid' => $errors];
    }

    return $req;
}

?>