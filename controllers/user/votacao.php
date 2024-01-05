<?php

require_once __DIR__ . '/../../infra/repositories/votacaoRepository.php';
require_once __DIR__ . '/../../helpers/validations/votacao/validate-votacao.php';
require_once __DIR__ . '/../../helpers/validations/votacao/validate-resposta.php';
require_once __DIR__ . '/../../helpers/session.php';

if (isset($_POST['votacao'])) {
    if ($_POST['votacao'] == 'votacaocreate') {
        votacaoCreate($_POST);
    }

    if ($_POST['votacao'] == 'votacaoupdate') {
        votacaoUpdate($_POST);
    }
    if ($_POST['votacao'] == 'respvotacao') {
        respVotacao($_POST);
    }
    if ($_POST['votacao'] == 'resulvotacao') {
        resulVotacao($_POST);
    }
}

if (isset($_GET['votacao'])) {
    if ($_GET['votacao'] == 'votacaoupdate') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'votacaoupdate';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
    }

    if ($_GET['votacao'] == 'respvotacao') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'respvotacao';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/resp_votacao.php' . $params);
    }

    if ($_GET['votacao'] == 'resulvotacao') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'resulvotacao';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/resultados.php' . $params);
    }

    if ($_GET['votacao'] == 'votacaodelete') {
        $votacao = getByIdVotacao($_GET['id_votacao']);

        $success = delete_votacao($votacao);

        if ($success) {
            $_SESSION['success'] = 'Votacao deleted successfully!';
            header('location: /Trabalho_SIR/pages/secure/');
        }
    }
}

function votacaoCreate($req)
{
    $validatedData = validatedVotacao($req);

    if (isset($validatedData['invalid'])) {
        $_SESSION['errors'] = $validatedData['invalid'];
        $_SESSION['form_data'] = $req;
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
        return false;
    }

    $dataVotacao = [
        'nome_votacao' => $validatedData['titulo'],
        'objetivo_votacao' => $validatedData['objetivo'],
        'descricao_votacao' => $validatedData['descricao'],
    ];

    $votacao = createVotacao($dataVotacao);

    if ($votacao === false) {
        return false;
    }

    for ($i = 1; isset($validatedData["opcao{$i}_text"]); $i++) {
        $dataOpcao = [
            'id_votacao' => $votacao['id_votacao'],
            'texto_opcao' => $validatedData["opcao{$i}_text"],
        ];
        $successOpcao = createOpcao($dataOpcao);

        if (!$successOpcao) {
            return false;
        }
    }

    $_SESSION['success'] = 'Votacao created successfully!';
    header('location: /Trabalho_SIR/pages/secure/');
}

function votacaoUpdate($req)
{
    $data = validatedVotacao($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $_SESSION['action'] = 'votacaoupdate';
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);

        return false;
    }

    $success = responderVotacao($data);

    if ($success) {
        $_SESSION['success'] = 'Votacao successfully changed!';
        $data['action'] = 'votacaoupdate';
        $params = '?' . http_build_query($data);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
    }
}

function respVotacao($req)
{
    $data = validatedResposta($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $_SESSION['action'] = 'respvotacao';
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/resp_votacao.php' . $params);

        return false;
    }

    $success = responderVotacao($data);

    if ($success) {
        $_SESSION['success'] = 'Votacao successfully changed!';
        $data['action'] = 'respvotacao';
        $params = '?' . http_build_query($data);
        header('location: /Trabalho_SIR/pages/secure/user/resp_votacao.php' . $params);
    }
}

function resulVotacao($req)
{
}

function delete_votacao($votacao)
{
    $data = deleteVotacao($votacao['id_votacao']);
    return $data;
}
