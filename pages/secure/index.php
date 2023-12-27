<?php
require_once __DIR__ . '../../../infra/middlewares/middleware-user.php';
require_once __DIR__ . '../../../infra/repositories/votacaoRepository.php';
$title = 'Inicio';
@require_once __DIR__ . '/../../helpers/session.php';
include_once __DIR__ . '../../../templates/header.php';

$votacoes = getAllVotacoes();
$user = user();
?>

<body>

    <div class="wrapper-user">
        <?php
        include_once __DIR__ . '../../../templates/sidebar.php';
        ?>

        <div class="content-wrapper w_active h_cal .al-c">
            <?php
            include_once __DIR__ . '../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-xs-3 mx-sm-4 bg-white static-top shadow">
                <div class="m-0 p-3 ">
                    <div class="w-100 d-sm-flex col-12 ">
                        <div class="col-12 col-lg-4 col-sm-5 pb-3 pb-sm-0  p-0">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Pesquisar...">
                            </div>

                        </div>
                        <div class="col-0 col-lg-6 col-sm-3"></div>
                        <div class="col-12 col-lg-2 col-sm-4 p-0">
                            <a class="btn w-100 btn-secondary" href="/Trabalho_SIR/pages/secure/user/votacao.php" role="button">Criar Votacao</a>
                        </div>
                    </div>
                </div>


                <div class="card-tables mx-0 row d-lg-none">
                    <?php
                    foreach ($votacoes as $votacao) {
                    ?>
                        <div class="card-body-table p-3 col-12 col-sm-6 col-md-4">
                            <div class="card">
                                <div class="row m-3">
                                    <div class="col-12 p-0 mb-md-0">
                                        <div class="card-body-table">
                                            <h5 class="card-title"><?= $votacao['nome_votacao'] ?></h5>
                                            <p class="card-text mb-0"><?= $votacao['objetivo_votacao'] ?></p>
                                            <div class="col-12 mt-3 p-0 d-flex space-around al-c">
                                                <a href="/Trabalho_SIR/controllers/user/votacao.php?<?= 'votacao=respvotacao&id_votacao=' . $votacao['id_votacao'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                                    </svg>
                                                </a>
                                                <a href="/Trabalho_SIR/controllers/user/votacao.php?<?= 'votacao=votacaoupdate&id_votacao=' . $votacao['id_votacao'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?= $votacao['id_votacao'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="table-info d-none d-lg-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-3">Nome</th>
                                <th class="col-7">Objetivo</th>
                                <th class="tx-c col-2">Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($votacoes as $votacao) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $votacao['nome_votacao'] ?>
                                    </td>
                                    <td>
                                        <?= $votacao['objetivo_votacao'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex space-around">
                                            <a href="/Trabalho_SIR/controllers/user/votacao.php?<?= 'votacao=respvotacao&id_votacao=' . $votacao['id_votacao'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                                </svg>
                                            </a>
                                            <a href="/Trabalho_SIR/controllers/user/votacao.php?<?= 'votacao=votacaoupdate&id_votacao=' . $votacao['id_votacao'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?= $votacao['id_votacao'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete<?= $votacao['id_votacao'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar votação</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza de que deseja excluir este votação?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn col-12 col-xl-3 col-md-4 col-sm-5 me-sm-3 mb-3 mb-sm-0 btn-warning-yellow" href="/Trabalho_SIR/controllers/user/votacao.php?<?= 'votacao=votacaodelete&id_votacao=' . $votacao['id_votacao'] ?>">Confirmar</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            include_once __DIR__ . '../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '../../../templates/footer.php';
    ?>