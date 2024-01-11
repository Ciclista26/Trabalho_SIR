<?php
function validatedResposta($req)
{
    $errors = [];

    foreach ($req as $key => $value) {
        $req[$key] = trim($value);
    }

    $opcoes = $req['opcoes'];

    if (!anyOptionSelected($opcoes)) {
        $errors['opcoes'] = 'Por favor, selecione pelo menos uma opção.';
    }

    if (!empty($errors)) {
        return ['invalid' => $errors];
    }

    return $req;
}

function anyOptionSelected($opcoes)
{
    foreach ($opcoes as $opcao) {
        if (!empty($opcao)) {
            return true;
        }
    }
    return false;
}
?>
