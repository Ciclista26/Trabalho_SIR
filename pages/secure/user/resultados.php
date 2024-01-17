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
$userPhotoPath =  "../assets/images/uploads/" . $user['foto'];
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
                        <a class="btn col-12 col-xl-2 col-md-3 col-sm-4 me-sm-3 mb-3 mb-sm-0 btn-secondary" href="../pages/secure/">Voltar</a>
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

                                                <h4>
                                                    <?php echo $totalVotos; ?> Votos
                                                </h4>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Mais votado</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h4>
                                                    <?php
                                                    echo isset($maisVotada['texto_resposta']) ? $maisVotada['texto_resposta'] . ' (' . $maisVotada['total_votos_opcao'] . ' votos)' : 'Não há dados disponíveis';
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Menos votado</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h4>
                                                    <?php
                                                    echo isset($maisVotada['texto_resposta']) ? $menosVotada['texto_resposta'] . ' (' . $menosVotada['total_votos_opcao'] . ' votos)' : 'Não há dados disponíveis';
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 ">
                                        <div class="card h-100 p-3 jc-center">
                                            <h3 class="mb-4 card-title">Votos em branco</h3>
                                            <div class="col-12 p-0 mb-md-0">
                                                <h4>
                                                    <?php echo $votosBranco; ?> Votos
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load("current", {
                                    packages: ["corechart"]
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Resposta', 'Nº Votações'],
                                        <?php
                                        foreach ($totalVotosPorOpcao as $total) {
                                            $texto_resposta = empty(trim($total['texto_resposta'])) ? 'Votos em Branco' : $total['texto_resposta'];
                                        ?>['<?= $texto_resposta ?>', <?= $total['total_votos_opcao'] ?>],
                                        <?php } ?>
                                    ]);

                                    var options = {
                                        pieHole: 0.4,
                                        margin: 0,
                                        legend: {
                                            position: 'bottom',
                                            alignment: 'center',
                                            maxLines: null
                                        },
                                        chartArea: {
                                            top: 10,
                                            width: '100%',
                                            height: '80%'
                                        }
                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

                                    function resizeChart() {
                                        chart.draw(data, options);
                                    }
                                    window.addEventListener('resize', resizeChart);
                                    resizeChart();
                                }
                            </script>

                            <div class="card-body-table p-3 col-12 col-lg-6">
                                <div class="card mb-3">
                                    <div class="row m-3">
                                        <div class="col-12 p-0 justify-content-center">
                                            <div id="donutchart" style="width: 100%; height: 400px;"></div>
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
    <!-- <?php include_once __DIR__ . '../../../templates/footer.php'; ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../js/script_user.js"></script>
  <script src="../js/search.js"></script>
</body>

</html>