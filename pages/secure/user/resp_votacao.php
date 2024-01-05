<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../infra/repositories/votacaoRepository.php';

$idVotacao = isset($_GET['id_votacao']) ? $_GET['id_votacao'] : null;
if ($idVotacao === null) {
    exit('ID de votação não definido.');
}

$votacao = getByIdVotacao($idVotacao);
$opcoes = getByIdVotacao($idVotacao); // Supondo que esta função retorne as opções da votação
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
                <section>
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div id="successAlert" class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
                        echo $_SESSION['success'] . '<br>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_SESSION['success']);
                    }

                    if (isset($_SESSION['errors'])) {
                        echo '<div id="errorAlert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0" role="alert">';
                        foreach ($_SESSION['errors'] as $error) {
                            echo $error . '<br>';
                        }
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_SESSION['errors']);
                    }
                    ?>
                </section>
                <section>
                    <div class="resp_votacao tx-c p-3">
                        <h1 class="mb-5 card-title"><?= $votacao['nome_votacao'] ?></h1>
                        <div class="mb-5">
                            <p class="mb-1"><?= $votacao['descricao_votacao'] ?></p>
                        </div>

                        <script>
                            function votar() {
                            var divVotacao = document.querySelector(".resp_votacao");
                            var divAparecer = document.querySelector(".resp_aparecer");

                            divVotacao.classList.add("d-none");
                            divAparecer.classList.remove("d-none");
                            }
                        </script>
                        <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <button class="w-100 btn btn-warning-yellow" type="submit" name="votar" value="password" onclick="votar()">Votar</button>
                        </div>
                    </div>
                    <form class="resp_aparecer tx-c d-none" method="post" action="processar_voto.php">
                        <h1 class="mb-5 card-title p-3"><?= $votacao['nome_votacao'] ?></h1>
                        <div class="row col-12 col-xl-8 offset-xl-2 m-auto">
                            <?php
                            foreach ($opcoes as $opcao) {
                            ?>
                                <div class="col-md-4 mb-3 px-3">
                                    <div class="form-check d-flex al-c tx-l shadow">
                                        <div>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        </div>
                                        <label class="form-check-label pl-1" for="flexRadioDefault1">
                                            <?= $opcao['texto_opcao'] ?>
                                        </label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 px-3 mx-auto">
                            <button class="w-100 btn mb-3 mx-md-3 btn-warning-yellow" type="submit" name="submit" value="votacao">Finalizar Voto</button>
                        </div>
                    </form>
                </section>
            </div>
            <?php
            include_once __DIR__ . '../../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '../../../../templates/footer.php';
    ?>
</body>

</html>