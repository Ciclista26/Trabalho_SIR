<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../infra/repositories/votacaoRepository.php';
$idVotacao = isset($_GET['id_votacao']) ? $_GET['id_votacao'] : null;
$result = getByIdresult($_REQUEST['id_votacao']);
$totalVotos = getTotalVotos($idVotacao);
$votosBranco = getVotosBranco($idVotacao);
$maisVotada = getOpcaoMaisVotada($idVotacao);
$menosVotada = getOpcaoMenosVotada($idVotacao);
$totalVotosPorOpcao = getTotalVotosPorOpcao($idVotacao);
$votacao = getByIdVotacao($idVotacao);
$title = 'Resultados votação';
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
                <section>
                    <div class="resp_votacao tx-c">
                        <h1 class="mb-5 card-title px-3"><?= $votacao['nome_votacao'] ?></h1>
                        <div class="mx-0 row">
                            <div class="card-body-table p-3 col-12 col-lg-6">
                                <div class="row h-100">
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Total de votos</h3>
                                            <div class="col-12 p-0 mb-md-0">

                                                <h5>
                                                    <?php echo $totalVotos; ?>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Mais votado</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h5>
                                                    <?php
                                                    echo isset($maisVotada['texto_resposta']) ? $maisVotada['texto_resposta'] . ' (' . $maisVotada['total_votos_opcao'] . ' votos)' : 'Não há dados disponíveis';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Menos votado</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h5>
                                                    <?php
                                                    echo isset($maisVotada['texto_resposta']) ? $menosVotada['texto_resposta'] . ' (' . $menosVotada['total_votos_opcao'] . ' votos)' : 'Não há dados disponíveis';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Votos em branco</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h5>
                                                    <?php echo $votosBranco; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body-table p-3 col-12 col-lg-6">
                                <div class="card mb-3">
                                    <div class="row m-3">
                                        <div class="col-12 p-0">
                                            <div class="card-body-table row">
                                                <div class="chart-pie col-12 col-lg-8 ">
                                                    <canvas id="myPieChart" height="300px"></canvas>
                                                </div>
                                                <div class="col-12 col-lg-4 al-self mt-3 mt-sm-0">
                                                    <div class="small row">
                                                        <div class="d-flex col-12 col-sm-4 col-lg-12 mb-1 al-c jc-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                                <circle cx="8" cy="8" r="8" />
                                                            </svg>
                                                            <span class="ml-2">Direct</span>
                                                        </div>
                                                        <div class="d-flex col-12 col-sm-4 col-lg-12 mb-1 al-c jc-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                                <circle cx="8" cy="8" r="8" />
                                                            </svg>
                                                            <span class="ml-2">Direct</span>
                                                        </div>
                                                        <div class="d-flex col-12 col-sm-4 col-lg-12 mb-1 al-c jc-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                                <circle cx="8" cy="8" r="8" />
                                                            </svg>
                                                            <span class="ml-2">Direct</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
    <!-- <script>
        var ctx = document.getElementById("myPieChart");
        const genChart = (data) => {
            return new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Direct", "Referral", "Social"],
                    datasets: [{
                        data: [...data],
                        backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
                        hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }, ],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: "#dddfeb",
                        borderWidth: 1,
                        xPadding: 0,
                        yPadding: 0,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false,
                    },
                    cutoutPercentage: 80,
                },
            });
        };
    </script>
    <?php
    $bla = [12, 12, 12]; // ARRAY para string para meteres em baixo
    // tens que criar um get para ir buscar estes valores
    // trocar o bla por algo melhor e meter ali em baixo
    echo "<script>genChart($bla)</script>" ?> -->