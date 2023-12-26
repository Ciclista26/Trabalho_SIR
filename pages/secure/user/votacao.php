<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = 'Criar votação';
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
                <section class="pb-4">
                    <form enctype="multipart/form-data" action="/Trabalho_SIR/controllers/user/votacao.php" method="post" class="px-3">
                        <div class="row">
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Titulo votação:</span>
                                <input type="text" class="form-control" name="titulo" maxlength="100" size="100" value="<?= isset($_REQUEST['nome_votacao']) ? $_REQUEST['nome_votacao'] : null ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Objetivo votação:</span>
                                <input type="text" class="form-control" name="objetivo" maxlength="100" size="100" value="<?= isset($_REQUEST['objetivo_votacao']) ? $_REQUEST['objetivo_votacao'] : null ?>" required>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3">
                                <span class="small">Descrição:</span>
                                <textarea class="form-control" aria-label="With textarea" name="descricao" value="<?= isset($_REQUEST['descricao_votacao']) ? $_REQUEST['descricao_votacao'] : null ?>" required></textarea>
                            </div>
                            <div class="input col-12 col-sm-6 mb-3" id="opcoes-container">
                                <span class="small">Opcões:</span>
                                <div class="row" id="opcoes-lista">
                                    <div class="col-12 col-md-6 opcao-div">
                                        <input type="text" name="opcao1_text" value="<?= isset($_REQUEST['texto_opcao']) ? $_REQUEST['texto_opcao'] : null ?>" placeholder="Opção 1" class="form-control col-6 mb-3" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <button class="w-100 btn btn-warning-yellow mb-3" type="button" onclick="adicionarInput()">Adicionar opção</button>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <button class="w-100 btn btn-danger mb-3" type="button" onclick="removerUltimaInput()">Remover opção</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="d-grid col-12 col-xl-2 col-md-3 col-sm-4 mx-auto">
                            <input type="hidden" name="id_votacao" value="<?= isset($_REQUEST['id_votacao']) ? $_REQUEST['id_votacao'] : null ?>">
                            <button type="submit" class="w-100 btn btn-warning-yellow mb-3" name="votacao" <?= isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'value="update"' : 'value="create"' ?>><?php echo isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'Alterar' : 'Criar'; ?></button>
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