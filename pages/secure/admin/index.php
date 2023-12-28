<?php
require_once __DIR__ . '/../../../infra/repositories/userRepository.php';
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';

require_once __DIR__ . '/../../../templates/header.php';

$users = getAll();
$user = user();
$title = 'Utilizadores';
?>

<body>

    <div class="wrapper-user">
        <?php
        include_once __DIR__ . '/../../../templates/sidebar.php';
        ?>

        <div class="content-wrapper w_active h_cal .al-c">
            <?php
            include_once __DIR__ . '/../../../templates/bar_user.php';
            ?>
            <div class="div_table mx-xs-3 mx-sm-4 bg-white static-top shadow">
                <section class="m-0 p-3">
                    <div class="row">
                        <div class="col-12 col-sm-5 col-md-5 pb-3 pb-sm-0">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Pesquisar..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-0 col-md-2 d-none d-md-block"></div>
                        <div class="col-12 col-sm-7 col-md-5">
                            <div class="row">
                                <div class="col-12 col-sm-6 pb-3 pb-sm-0">
                                    <a class="btn btn-secondary w-100" href="/Trabalho_SIR/pages/secure/">Voltar</a>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <a class="btn btn-warning-yellow w-100" href="./user.php">Criar utilizador</a>
                                </div>
                            </div>
                        </div>
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

                    <div class="card-tables mx-0 row d-lg-none">
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <div class="card-body-table p-3 col-12 col-sm-6 col-md-4 searchable">
                                <div class="card">
                                    <div class="row m-3">
                                        <div class="col-12 p-0 mb-md-0">
                                            <div class="card-body-table">
                                                <h5 class="card-title"><?= $user['name'] ?> <?= $user['lastname'] ?></h5>
                                                <p class="card-text mb-0">CC: <?= $user['ccNumber'] ?></p>
                                                <p class="card-text mb-0">Telemóvel: <?= $user['phoneNumber'] ?></p>
                                                <p class="card-text mb-0">Email: <?= $user['email'] ?></p>
                                                <p class="card-text mb-0">Administrator: <?= $user['administrator'] == '1' ? 'Sim' : 'Não' ?></p>
                                                <div class="col-12 mt-3 p-0 d-flex space-around al-c">
                                                    <a href="/Trabalho_SIR/controllers/admin/user.php?<?= 'user=update&id=' . $user['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?= $user['id'] ?>">
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
                                    <th scope="col">Nome</th>
                                    <th scope="col">Apelido</th>
                                    <th scope="col">CC</th>
                                    <th scope="col">Telemóvel</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Administrator</th>
                                    <th scope="col" class="tx-c">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $user) {
                                ?>
                                    <tr class="searchable">
                                        <td>
                                            <?= $user['name'] ?>
                                        </td>
                                        <td>
                                            <?= $user['lastname'] ?>
                                        </td>
                                        <td>
                                            <?= $user['ccNumber'] ?>
                                        </td>
                                        <td>
                                            <?= $user['phoneNumber'] ?>
                                        </td>
                                        <td>
                                            <?= $user['email'] ?>
                                        </td>
                                        <td>
                                            <?= $user['administrator'] == '1' ? 'Sim' : 'Não' ?>
                                        </td>
                                        <td>
                                            <div class="d-flex space-around">
                                                <a href="/Trabalho_SIR/controllers/admin/user.php?<?= 'user=update&id=' . $user['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?= $user['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar utilizador</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza de que deseja excluir este utilizador?
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn col-12 col-xl-3 col-md-4 col-sm-5 me-sm-3 mb-3 mb-sm-0 btn-warning-yellow" href="/Trabalho_SIR/controllers/admin/user.php?<?= 'user=delete&id=' . $user['id'] ?>">Confirmar</a>

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
            </section>
            <?php
            include_once __DIR__ . '/../../../templates/empowered.php';
            ?>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../templates/footer.php';
    ?>