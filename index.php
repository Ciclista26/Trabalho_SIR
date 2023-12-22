<?php
require_once __DIR__ . '/infra/middlewares/middleware-not-authenticated.php';
require_once __DIR__ . '/setupdatabase.php';
include_once __DIR__ . '/templates/header.php';
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffc600" class="bi bi-check-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                </svg>
                <div class="logo">
                    VotaCerto
                </div>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item pt-3 pb-3 pt-lg-0 pb-lg-0 p_lr"><a class="nav-link" href="/Trabalho_SIR/pages/public/signin.php">Login</a>
                    </li>
                    <li class="nav-item p_lr"><a type="button" href="/Trabalho_SIR/pages/public/signup.php" class="btn btn-outline-warning">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Fim Navigation-->

    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8">
                    <img src="./assets/image/logo_w.png" alt="logo" width="300px" height="auto">
                </div>
                <div class="col-md-7 col-lg-5 align-self-baseline">
                    <p class="text-white">Seja o autor das suas próprias votações online! Não apenas vota, mas também
                        pode criar as suas sondagens e partilhá-las com o mundo. Transforme as suas ideias em
                        ação e convide outros a participarem.</p>
                </div>
                <div class="h-bottons col-lg-8 d-flex align-self-baseline">
                    <div class="col-lg-3 mw-2 align-self-baseline">
                        <a class="btn w-100 btn-yellow" href="#" role="button">Criar Votação</a>
                    </div>
                    <div class="col-lg-3 mw-2 align-self-baseline">
                        <a class="btn w-100 btn-yellow" href="#" role="button">Veja como</a>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Fim Masthead-->

    <!-- Infos-->
    <section class="infos mg">
        <div class="container-lg col-12 col-lg-10 offset-lg-1 col-xxl-8 offset-xxl-2 h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs" id="infos" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="btntab-1" data-mdb-toggle="tab" role="tab" aria-controls="tabs-1" aria-selected="true">Votação</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="btntab-2" data-mdb-toggle="tab" role="tab" aria-controls="tabs-2" aria-selected="false">Personalizadas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="btntab-3" data-mdb-toggle="tab" role="tab" aria-controls="tabs-3" aria-selected="false">Resultados</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="btntab-4" data-mdb-toggle="tab" role="tab" aria-controls="tabs-4" aria-selected="false">Anonimato</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="btntab-5" data-mdb-toggle="tab" role="tab" aria-controls="tabs-5" aria-selected="false">Relatórios</a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content p-0" id="infos-content">
                    <div class="tab-pane fade d-md-flex text-content align-items-center justify-content-center text-center show active" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="col-md-6 ptb-41 p-md-4">
                            <h5 class="card-title-yellow mb-3">Participação Descomplicada</h5>
                            <p class="text-white">Envolve o teu público sem esforço. Com uma interface amigável,
                                convidamos todos a participar nas nossas votações para sondagens, garantindo que cada
                                voz seja ouvida sem mostrar a sua identidade.
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <img src="./assets/image/voto.jpg" alt="teamworker1">
                        </div>
                    </div>
                    <div class="tab-pane fade d-md-flex d-md-none text-content align-items-center justify-content-center text-center" id="tabs-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="col-md-6 ptb-41 p-md-4">
                            <h5 class="card-title-yellow mb-3">Votações Personalizadas</h5>
                            <p class="text-white">Crie votações personalizadas de acordo com as suas necessidades. Seja para decidir sobre o destino do próximo encontro ou escolher o melhor design para um projeto, o VotaCerto está aqui para tornar o processo simples e eficiente.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="./assets/image/personalizada.jpg" alt="teamworker2">
                        </div>
                    </div>
                    <div class="tab-pane fade d-md-flex d-md-none text-content align-items-center justify-content-center text-center" id="tabs-3" role="tabpanel" aria-labelledby="tab-3">
                        <div class="col-md-6 ptb-41 p-md-4">
                            <h5 class="card-title-yellow mb-3">Resultados em Tempo Real</h5>
                            <p class="text-white">Acompanha os resultados instantaneamente. Com a nossa tecnologia avançada, os resultados das votações são exibidos em tempo real, proporcionando transparência e insights imediatos.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="./assets/image/resultado.png" alt="teamworker3">
                        </div>
                    </div>
                    <div class="tab-pane fade d-md-flex d-md-none text-content align-items-center justify-content-center text-center" id="tabs-4" role="tabpanel" aria-labelledby="tab-4">
                        <div class="col-md-6 ptb-41 p-md-4">
                            <h5 class="card-title-yellow mb-3">Anonimato Respeitado</h5>
                            <p class="text-white">Respeitamos a tua privacidade. Oferecemos opções para votação anónima, garantindo que as opiniões sejam expressas sem qualquer receio.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="./assets/image/anonimo.jpg" alt="teamworker4">
                        </div>
                    </div>
                    <div class="tab-pane fade d-md-flex d-md-none text-content align-items-center justify-content-center text-center" id="tabs-5" role="tabpanel" aria-labelledby="tab-5">
                        <div class="col-md-6 ptb-41 p-md-4">
                            <h5 class="card-title-yellow mb-3">Relatórios Detalhados</h5>
                            <p class="text-white">Fornece relatórios detalhados pós-votação, incluindo análises estatísticas e gráficos que facilitam a compreensão dos resultados e auxiliam na tomada de decisões informadas.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="./assets/image/relatorio.jpg" alt="teamworker5">
                        </div>
                    </div>
                </div>
                <!-- Tabs content -->
            </div>
        </div>
    </section>
    <!--Fim Infos-->

    <!-- Sondagens-->
    <section class="sondagens mg">
        <div class="container col-12 col-md-10 offset-md-1 col-xxl-8 offset-xxl-2 h-100">
            <div class="row mb-5 align-items-center justify-content-center text-center">
                <div class="col-lg-5">
                    <h2 class="card-title">Votações para sondagens</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-10 offset-1 offset-sm-0 col-sm-6 col-xl-3 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Eleições legislativas 2024</h5>
                            </div>
                            <div class="card-text mb-1">
                                <p>Deixe a sua opinião de quem deve ser o próximo primeiro ministro!
                                </p>
                            </div>
                            <div class="card-btn">
                                <a class="btn w-100 btn-secondary" href="#" role="button">Responder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1 offset-sm-0 col-sm-6 col-xl-3 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Melhorias para o IPVC-ESTG</h5>
                            </div>
                            <div class="card-text mb-1">
                                <p>Diz-nos o que achas que o instituto devia mudar para melhorar a nossa aprendizagem!
                                </p>
                            </div>
                            <div class="card-btn">
                                <a class="btn w-100 btn-secondary" href="#" role="button">Responder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1 offset-sm-0 col-sm-6 col-xl-3 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Núcleo engenharia Informática</h5>
                            </div>
                            <div class="card-text mb-1">
                                <p>Ajuda a escolher o teu kit de curso!</p>
                            </div>
                            <div class="card-btn">
                                <a class="btn w-100 btn-secondary" href="#" role="button">Responder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1 offset-sm-0 col-sm-6 col-xl-3 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Curso de engenharia Informática</h5>
                            </div>
                            <div class="card-text mb-1">
                                <p>Achas que o curso devia abordar novas matérias! Deixa a tua opinião para perceber o
                                    que acham.</p>
                            </div>
                            <div class="card-btn">
                                <a class="btn w-100 btn-secondary" href="#" role="button">Responder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 align-items-center justify-content-center text-center">
                <div class="col-10 col-md-3">
                    <a class="btn w-100 btn-secondary" href="#" role="button">Ver mais</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Sondagens-->

    <!-- Sobre -->
    <section class="sobre mg">
        <div class="container col-12 col-lg-10 offset-lg-1 col-xxl-8 offset-xxl-2  h-100">
            <div class="row h-100 ">
                <div class="col-12 col-lg-6 p-0">
                    <img src="./assets/image/teamworker.jpg" alt="teamworker">
                </div>
                <div class="col-12 col-lg-6 p-5 justify-content-center text-center">
                    <h5 class="card-title-yellow mb-5">Sobre nos</h5>
                    <p class="text-white">O VotaCerto teve início como um projeto universitário, nascendo da ambição de
                        promover decisões.
                        O que começou como uma simples ferramenta
                        académica transformou-se numa plataforma online
                        robusta, proporcionando a todos a oportunidade de expressar opiniões de maneira fácil e eficaz.
                    </p>
                    <p class="text-white">
                        Desde então, temos evoluído continuamente, incorporando feedbacks e refinando nossa abordagem
                        para melhor atender às necessidades dos nossos utilizadores. Acreditamos que cada voto tem o
                        poder de moldar o caminho futuro, e é essa crença que impulsiona o VotaCerto. Ao unir-se a nós
                        nesta jornada, está a contribuir para mais do que uma plataforma de votação está a participar
                        na construção de uma comunidade onde as decisões são tomadas de forma consciente e colaborativa.
                        Junte-se a nós no VotaCerto e faça parte desta história em constante crescimento. Vamos votar
                        certo para um futuro mais participativo e justo.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Sobre -->



    <!-- Team-->
    <section class="team mg">
        <div class="container col-12 col-md-10 offset-md-1 col-xxl-8 offset-xxl-2 h-100">
            <div class="row mb-5 align-items-center justify-content-center text-center">
                <div class="col-lg-5">
                    <h2 class="card-title">Equipa</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mb-4 mb-md-0 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <img src="./assets/image/team/team1.jpeg" class="card-img-top" alt="team1">
                        <div class="card-body pt-0">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Rui Alves | 22</h5>

                            </div>
                            <p class="card-text mb-0">Estudante de Engenharia Informatica</p>
                            <div class="card-link d-flex">
                                <p class="card-text mb-0">ESTG - IPVC</p>
                                <a href="https://www.linkedin.com/in/ruialves2001/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-10 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <img src="./assets/image/team/team2.jpg" class="card-img-top" alt="team2">
                        <div class="card-body pt-0">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Alexandre Santos | 23</h5>

                            </div>
                            <p class="card-text mb-0">Estudante de Engenharia Informatica</p>
                            <div class="card-link d-flex">
                                <p class="card-text mb-0">ESTG - IPVC</p><a href="https://www.linkedin.com/in/alexandrepsantos1999/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fim Team-->

    <!-- Footer-->
    <footer id="footer" class="bg-footer py-3">
        <div class="container col-10 offset-1 col-lg-8 offset-lg-2 py-6">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget d-sm-flex d-lg-block">
                        <div class="mb-5">
                            <h4>Contactos</h4>
                            <a class="d-flex mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffc600" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                <p class="pl-1">
                                    +351 961 234 567
                                </p>

                            </a>
                            <a class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffc600" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg>
                                <p class="pl-1">
                                    grupo@gmail.com
                                </p>
                            </a>
                        </div>
                        <div class="mb-5">
                            <h4>Redes Sociais</h4>
                            <a class="red_soc">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentcolor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                            <a class="pl-1 red_soc">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentcolor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="widget">
                        <h4>Fale Conosco!</h4>
                        <div>
                            <div class="mb-3 d-block d-lg-flex">
                                <div class="col-12 col-lg-6 pr-0 pr-lg-1 mb-2 mb-lg-0">
                                    <label for="inputname" class="form-label">Nome</label>
                                    <input type="text" class="form-control" aria-label="name" placeholder="Full Name">
                                </div>
                                <div class="col-12 col-lg-6 pl-0 pl-lg-1">
                                    <label for="inputemail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputemail" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="textarea1" rows="3" placeholder="Escreva aqui as suas duvidas!"></textarea>
                            </div>
                            <div class="mb-3 d-block d-md-flex justify-content-flex-end">
                                <div class="col-12 col-md-2">
                                    <a class="btn w-100 btn-yellow" href="#" role="button">
                                        Enviar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="container px-4 px-lg-5">
            <div class="small text-center">
                VotaCerto © All rights reserved
            </div>
            <div class="small text-center">
                Empowered with
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc600" class="bi bi-balloon-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.49 10.92C19.412 3.382 11.28-2.387 8 .986 4.719-2.387-3.413 3.382 7.51 10.92l-.234.468a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.235-.468ZM6.726 1.269c-1.167-.61-2.8-.142-3.454 1.135-.237.463-.36 1.08-.202 1.85.055.27.467.197.527-.071.285-1.256 1.177-2.462 2.989-2.528.234-.008.348-.278.14-.386Z" />
                </svg>
                By Rui e Alexandre
            </div>
        </div>
    </footer>
    <!--Fim Footer-->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- Fim Scripts -->
</body>

</html>