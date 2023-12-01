<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Website do Clube</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-light px-xxl-4 px-xl-2 px-lg-1" href="#">Clube</a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto my-3">
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Notícias</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Elenco</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Partidas</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Sobre</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Loja Virtual</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Sócios</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Ingressos</a>
                        </li>
                        <li class="nav-item px-xxl-4 px-xl-2 px-lg-1">
                            <a class="nav-link text-light" href="#">Imprensa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($banners as $i => $banner)
                                <div class="carousel-item {{ ($i == 0) ? 'active' : '' }}">
                                    <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $banner->url_image }}" class="d-block w-100" alt="{{ $banner->title }}" style="max-height: 700px;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $banner->title }}</h5>
                                        <p>{{ $banner->subtitle }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @foreach($sectionsTop as $section)
            <section class="container mt-5">
                <div class="row">
                    <div class="col-lg-8 col-12 offset-lg-2">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-3">
                                    <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $section->images[0]->url_image }}" class="img-fluid rounded-start" alt="{{ $section->title }}">
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $section->title }}</h5>
                                        <p class="card-text">{{ $section->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        <section class="container mt-5">
            <div class="row my-2">
                <div class="col-12">
                    <h2 class="text-center">Notícias</h2>
                </div>
            </div>
            <div class="row d-flex align-items-stretch">
                @foreach($posts as $post)
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $post->images[0]->url_image }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->summary }}</p>
                                <a href="#" class="btn btn-dark float-end">Leia Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="container mt-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 class="text-center my-1">Última Partida</h2>
                    <div class="card">
                        <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $previousGame->url_image }}" class="img-fluid rounded-start" alt="Jogo contra {{ $previousGame->opponent }}" style="max-height: 325px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $previousGame->team_score }} X {{ $previousGame->opponent_score }} {{ $previousGame->opponent }}</h5>
                            <p class="card-text text-center">{{ date('d/m/Y', strtotime($previousGame->date)) }} - {{ $previousGame->place }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <h2 class="text-center my-1">Próxima Partida</h2>
                    <div class="card">
                        <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $nextGame->url_image }}" class="img-fluid rounded-start" alt="Jogo contra {{ $nextGame->opponent }}" style="max-height: 325px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">vs. {{ $nextGame->opponent }}</h5>
                            <p class="card-text text-center">{{ date('d/m/Y', strtotime($nextGame->date)) }} - {{ $nextGame->place }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @foreach($sectionsEnd as $section)
            <section class="container mt-5">
                <div class="row">
                    <div class="col-lg-8 col-12 offset-lg-2">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-3">
                                    <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $section->images[0]->url_image }}" class="img-fluid rounded-start" alt="{{ $section->title }}">
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $section->title }}</h5>
                                        <p class="card-text">{{ $section->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        <section class="container mt-5">
            <div class="row my-2">
                <div class="col-12">
                    <h2 class="text-center">Jogadores</h2>
                </div>
            </div>
            <div class="row d-flex align-items-stretch">
                @foreach($players as $player)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-3">
                        <div class="card">
                            <img src="http://localhost/tcc_pos/cms/public/imagem/{{ $player->url_image }}" class="card-img-top" alt="{{ $player->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $player->name }}</h5>
                                <p class="card-text">{{ $player->player_position->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <footer class="container py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Notícias</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Elenco</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Partidas</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Sobre</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Loja Virtual</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Sócios</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Ingressos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Imprensa</a>
                </li>
                <li class="nav-item">
                    <a href="https://api.whatsapp.com/send?phone={{ $parameters['whatsapp'] }}" class="nav-link px-2 text-muted">WhatsApp</a>
                </li>
                <li class="nav-item">
                    <a href="{{ $parameters['facebook'] }}" class="nav-link px-2 text-muted">Facebook</a>
                </li>
                <li class="nav-item">
                    <a href="{{ $parameters['instagram'] }}" class="nav-link px-2 text-muted">Instagram</a>
                </li>
                <li class="nav-item">
                    <a href="{{ $parameters['youtube'] }}" class="nav-link px-2 text-muted">YouTube</a>
                </li>
                <li class="nav-item">
                    <a href="{{ $parameters['tiktok'] }}" class="nav-link px-2 text-muted">TikTok</a>
                </li>
            </ul>
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="tel:{{ $parameters['phone'] }}" class="nav-link px-2 text-muted">{{ $parameters['phone'] }}</a>
                </li>
                <li class="nav-item">
                    <a href="mailto:{{ $parameters['email'] }}" class="nav-link px-2 text-muted">{{ $parameters['email'] }}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">{{ $parameters['address'] }}</a>
                </li>
            </ul>
            <p class="text-center text-muted">© 2023 - Desenvolvido por Eduardo Schenato dos Santos como TCC do curso de pós-graduação em Arquitetura de Software Distribuído - PUC Minas</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>