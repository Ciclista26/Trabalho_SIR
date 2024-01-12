<?php

function isLoginValid($req)
{
    foreach ($req as $key => $value) {
        $req[$key] = trim($req[$key]);
    }
    
    if (empty($req['email']) || !filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'O campo Email não pode estar vazio e deve ter o formato de e-mail, por exemplo: nome@example.com.';
    }

    if (empty($req['password']) || strlen($req['password']) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $req['password'])) {
        $errors['password'] = 'O campo Password deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.';
    }

    if (isset($errors)) {
        return ['invalid' => $errors];
    }

    return $req;
}

function isPasswordValid($req)
{
    if (!isset($_SESSION['id'])) {
        
        $user = getByEmail($req['email']);

        if (!$user && (!password_verify($req['password'], $user['password']))) {
            $errors['email'] = 'E-mail ou senha incorretos.';
        }
        
        if (isset($errors)) {
            return ['invalid' => $errors];
        }

        return $user;
    }
}
