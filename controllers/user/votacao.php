<?php

require_once __DIR__ . '/../../infra/repositories/votacaoRepository.php';
require_once __DIR__ . '/../../helpers/validations/votacao/validate-votacao.php';
require_once __DIR__ . '/../../helpers/session.php';

if (isset($_POST['votacao'])) {
    if ($_POST['votacao'] == 'create') {
        create($_POST);
    }

    if ($_POST['votacao'] == 'update') {
        update($_POST);
    }

    if ($_POST['votacao'] == 'votacao') {
        updateVotacao($_POST);
    }
}

if (isset($_GET['votacao'])) {
    if ($_GET['votacao'] == 'update') {
        $votacao = getById($_GET['id_votacao']);
        $votacao['action'] = 'update';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
    }

    if ($_GET['votacao'] == 'delete') {
        $votacao = getById($_GET['id_votacao']);
        
        $success = delete_user($votacao);

        if ($success) {
            $_SESSION['success'] = 'Votacao deleted successfully!';
            header('location: /Trabalho_SIR/pages/secure/user/');
        }
    }
}

function create($req)
{
    var_dump($_POST);
    var_dump($req);

    $data = validatedVotacao($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
        return false;
    }

    $success = createVotacao($data);
    $success = createOpcao($data);

    if ($success) {
        $_SESSION['success'] = 'Votacao created successfully!';
        header('location: /Trabalho_SIR/pages/secure/user/');
    }
}

function update($req)
{
    $data = validatedVotacao($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $_SESSION['action'] = 'update';
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);

        return false;
    }

    $success = updateVotacao($data);

    if ($success) {
        $_SESSION['success'] = 'Votacao successfully changed!';
        $data['action'] = 'update';
        $params = '?' . http_build_query($data);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
    }
}

function delete_votacao($votacao)
{
    $data = deleteVotacao($votacao['id_votacao']);
    return $data;
}
