<?php

function validatedResposta($req)
{
    $errors = [];

    foreach ($req as $key => $value) {
        $req[$key] = trim($req[$key]);
    }

    $opcoes = $req['opcoes'];
    $opcaoSelecionada = false;
    foreach ($opcoes as $opcao) {
        $opcao = trim($opcao);
        if (!empty($opcao)) {
            $opcaoSelecionada = true;
            break;
        }
    }

    if (!$opcaoSelecionada) {
        $errors['opcoes'] = 'Por favor, selecione pelo menos uma opção.';
    }

    if (!empty($errors)) {
        return ['invalid' => $errors];
    }

    return $req;
}
?>
