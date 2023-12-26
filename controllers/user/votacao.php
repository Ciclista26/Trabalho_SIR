<?php

require_once __DIR__ . '/../../infra/repositories/votacaoRepository.php';
require_once __DIR__ . '/../../helpers/validations/votacao/validate-votacao.php';
require_once __DIR__ . '/../../helpers/session.php';

if (isset($_POST['votacao'])) {
    if ($_POST['votacao'] == 'votacaocreate') {
        votacaoCreate($_POST);
    }

    if ($_POST['votacao'] == 'votacaoupdate') {
        votacaoUpdate($_POST);
    }

}

if (isset($_GET['votacao'])) {
    if ($_GET['votacao'] == 'votacaoupdate') {
        $votacao = getByIdVotacao($_GET['id_votacao']);
        $votacao['action'] = 'votacaoupdate';
        $params = '?' . http_build_query($votacao);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
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
        $_SESSION['form_data'] = $req; // Store form data in session
        $params = '?' . http_build_query($req);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
        return false;
    }

    $data = [
        'nome_votacao' => $validatedData['titulo'],
        'objetivo_votacao' => $validatedData['objetivo'],
        'descricao_votacao' => $validatedData['descricao'],
    ];
    
    $successVotacao = createVotacao($data);
    $successOpcao = createOpcao($data);

    if ($successVotacao && $successOpcao) {
        $_SESSION['success'] = 'Votacao created successfully!';
        header('location: /Trabalho_SIR/pages/secure/');
    }
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

    $success = updateVotacao($data);

    if ($success) {
        $_SESSION['success'] = 'Votacao successfully changed!';
        $data['action'] = 'votacaoupdate';
        $params = '?' . http_build_query($data);
        header('location: /Trabalho_SIR/pages/secure/user/votacao.php' . $params);
    }
}

function delete_votacao($votacao)
{
    $data = deleteVotacao($votacao['id_votacao']);
    return $data;
}
