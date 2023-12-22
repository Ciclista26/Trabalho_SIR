<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = 'Mudar Password';
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
                    <div class="resp_votacao tx-c p-3">
                        <h1 class="mb-5 card-title">Núcleo engenharia Informática</h1>
                        <div class="mb-5">
                            <p class="mb-1">O Núcleo de Engenharia Informática pretende criar os novos kits de curso para o ano letivo de 2023/2024.</p>
                            <p class="mb-1">Para isso pedimos a opinião dos alunos de Engenharia Informática o que devia ser feito para este kit.</p>
                        </div>

                        <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <button class="w-100 btn btn-warning-yellow" type="submit" name="user" value="password" onclick="votar()">Votar</button>
                        </div>
                    </div>
                    <div class="resp_aparecer tx-c d-none">
                        <h1 class="mb-5 card-title p-3">Núcleo engenharia Informática</h1>
                        <div class="row col-12 col-xl-8 offset-xl-2 m-auto">
                            <div class="col-md-4 mb-3 px-3">
                                <div class="form-check d-flex al-c tx-l shadow">
                                    <div>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                    <label class="form-check-label pl-1" for="flexRadioDefault1">
                                        Casaco impermeável
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 px-3">
                                <div class="form-check d-flex al-c tx-l shadow">
                                    <div>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    </div>
                                    <label class="form-check-label pl-1" for="flexRadioDefault2">
                                        Camisola
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 px-3">
                                <div class="form-check d-flex al-c tx-l shadow">
                                    <div>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                    </div>
                                    <label class="form-check-label pl-1" for="flexRadioDefault3">
                                        Casaco impermeável + Camisola
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid my-4 col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <button class="w-100 btn mb-3 mx-md-3 btn-warning-yellow" type="submit" value="votacao">Finalizar Voto</button>
                        </div>
                    </div>

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