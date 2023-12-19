<?php

function passwordIsValid($req)
{
    foreach ($req as $key => $value) {
        $req[$key] = trim($req[$key]);
    }

    if (empty($req['old_password']) || !password_verify($req['old_password'], user()['password'])) {
        $errors['old_password'] = 'A password atual não pode estar vazia ou esta incorreta.';
    }

    if (empty($req['password']) || strlen($req['password']) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $req['password'])) {
        $errors['password'] = 'O campo Password deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.';
    }

    if (!empty($req['confirm_password']) && ($req['confirm_password']) != $req['password']) {
        $errors['confirm_password'] = 'O campo Confirmar Password não pode estar vazio e deve ser igual ao campo Password.';
    }

    if (isset($errors)) {
        return ['invalid' => $errors];
    }

    return $req;
}

?>



