<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../infra/repositories/votacaoRepository.php';

$idVotacao = isset($_GET['id_votacao']) ? $_GET['id_votacao'] : null;
$id_user = $_SESSION['id'];

$votacao = getByIdVotacao($idVotacao);

$dataFim = DateTime::createFromFormat('Y-m-d H:i:s', $votacao['data_fim']);
$dataAtual = new DateTime();

if (usuarioJaRespondeu($id_user, $idVotacao) && $dataAtual <= $dataFim) {
    $_SESSION['errors'] = ['Você já respondeu a esta votação.'];
    header('location: /Trabalho_SIR/pages/secure/');
    exit();
}

$opcoes = getByIdOpcoes($_REQUEST['id_votacao']);
$title = 'Responder votação';
$user = user();
?>

<body>
    <div class="wrapper-user">
        <?php
        include_once __DIR__ . '../../../../templates/sidebar.php';
        ?>

        <div class="content-wrapper w_active h_cal .al-c">
            <?php
            include_once __DIR__ . '../../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-xs-3 mx-sm-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <div class="d-sm-flex justify-content">
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="/Trabalho_SIR/pages/secure/">Voltar</a>
                    </div>
                </section>
                <?php
                include_once __DIR__ . '../../../../templates/error.php';
                ?>
                <?php
                if ($dataAtual < $dataFim) {
                ?>
                    <section id="votacaoaberta">
                        <div class="resp_votacao tx-c p-3">
                            <h1 class="mb-5 card-title"><?= $votacao['nome_votacao'] ?></h1>
                            <div class="mb-5 mx-md-5 mx-0">
                                <p><?= $votacao['descricao_votacao'] ?></p>
                            </div>

                            <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                                <button class="w-100 btn btn-warning-yellow" type="submit" name="votar" value="password" onclick="votar()">Votar</button>
                            </div>
                        </div>
                        <form name="responderForm" class="resp_aparecer tx-c d-none" enctype="multipart/form-data" action="/Trabalho_SIR/controllers/user/responder.php" method="post">
                            <h1 class="mb-5 card-title p-3"><?= $votacao['nome_votacao'] ?></h1>
                            <div class="row col-12 col-xl-8 offset-xl-2 m-auto">
                                <?php
                                foreach ($opcoes as $opcao) {
                                ?>
                                    <div class="col-md-4 mb-3 px-3">
                                        <div class="form-check d-flex al-c tx-l shadow">
                                            <div>
                                                <input class="form-check-input" type="radio" name="texto_resposta" id="flexRadioDefault<?= $opcao['id_opcao'] ?>" value="<?= $opcao['texto_opcao'] ?>">
                                            </div>
                                            <label class="form-check-label pl-1" name="texto_resposta" for="flexRadioDefault<?= $opcao['id_opcao'] ?>">
                                                <?= $opcao['texto_opcao'] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 px-3 mx-auto">
                                <input type="hidden" name="id_votacao" value="<?= isset($_REQUEST['id_votacao']) ? $_REQUEST['id_votacao'] : null ?>">
                                <input type="hidden" name="id_user" value="<?= isset($_REQUEST['id']) ? $_REQUEST['id'] : null ?>">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#finalizar<?= $votacao['id_votacao'] ?>">
                                    <button class="w-100 btn mb-3 mx-md-3 btn-warning-yellow">Finalizar Voto</button>
                                </a>
                            </div>
                            <div class="modal fade" id="finalizar<?= $votacao['id_votacao'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Finalizar votação</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja concluir o seu voto?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="w-100 btn mb-3 mx-md-3 btn-warning-yellow" type="submit" name="resposta" value="createresposta">Finalizar Voto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                <?php
                } else {
                ?>
                    <section id="votacaofechada">
                        <div class="resp_votacao tx-c p-3">
                            <h1 class="mb-5 card-title"><?= $votacao['nome_votacao'] ?></h1>
                            <div class="mb-5 mx-md-5 mx-0">
                                <h5>A Votação que pretende responder já nao esta a decorrer!</h5>
                            </div>
                        </div>
                        <div class="d-grid col-12 col-xl-2 col-md-3 col-sm-4 px-3 mx-auto">
                            <input type="hidden" name="id_votacao" value="<?= isset($_REQUEST['id_votacao']) ? $_REQUEST['id_votacao'] : null ?>">
                            <a href="/Trabalho_SIR/controllers/user/responder.php?<?= 'resposta=resultresposta&id_votacao=' . $votacao['id_votacao'] ?>">
                                <button class="w-100 btn btn-warning-yellow">Resultado</button>
                            </a>
                        </div>
                    </section>
                <?php
                }
                ?>
            </div>
            <?php
            include_once __DIR__ . '../../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '../../../../templates/footer.php';
    ?>