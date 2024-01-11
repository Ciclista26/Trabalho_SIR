<?php

require_once __DIR__ . '/../../infra/repositories/votacaoRepository.php';
require_once __DIR__ . '/../../helpers/session.php';
require_once __DIR__ . '/../../helpers/validations/votacao/validate-resposta.php';

if (isset($_POST['resposta'])) {
    if ($_POST['resposta'] == 'createresposta') {
        respResposta($_POST);
    }
}

if (isset($_GET['resposta'])) {
    if ($_GET['resposta'] == 'respresposta') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'respresposta';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/resp_votacao.php' . $params);
    }
    
    if ($_GET['resposta'] == 'resultresposta') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'resultresposta';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/resultados.php' . $params);
    }
}

function respResposta($req)
{
    if (isset($req['invalid'])) {
        $_SESSION['errors'] = $req['invalid'];
        $_SESSION['form_data'] = $req;
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/responder.php' . $params);
        return false;
    }

    $dataResposta = [
        'id_votacao' => $req['id_votacao'],
        'id_user' => $req['id_user'],
        'texto_resposta' => $req['texto_resposta'],
    ];

    $resposta = responderVotacao($dataResposta);

    if ($resposta === false) {
        return false;
    }

    $_SESSION['success'] = 'Resposta created successfully!';
    header('location: /Trabalho_SIR/pages/secure/');
} 


/* function respVotacao($req)
{
    if (isset($req['invalid'])) {
        $_SESSION['errors'] = $req['invalid'];
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/responder.php' . $params);
        return false;
    }

    $success = responderVotacao($req);

    if ($success) {
        $_SESSION['success'] = 'Voting processed successfully!';
        header('location: /Trabalho_SIR/pages/secure/');
    }
} */

