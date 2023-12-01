@include("includes.head")  
<ul id="dropdownCadastrosGerais" class="dropdown-content">
    <li>
        <a href="{{ route('underConstruction') }}">Posições do Jogador</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Categorias do Jogador</a>
    </li>
    <li>
        <a href="{{ route('playersList') }}">Jogadores</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Funções do Staff</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Staff</a>
    </li>
    <li>
        <a href="{{ route('gamesList') }}">Partidas</a>
    </li>
</ul>
<ul id="dropdownCms" class="dropdown-content">
    <li>
        <a href="{{ route('bannersList') }}">Banners</a>
    </li>
    <li>
        <a href="{{ route('sectionsList') }}">Seções</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Categorias de Postagem</a>
    </li>
    <li>
        <a href="{{ route('postsList') }}">Postagens</a>
    </li>
    <li>
        <a href="{{ route('parametersList') }}">Dados Gerais</a>
    </li>
</ul>
<ul id="dropdownEcommerce" class="dropdown-content">
    <li>
        <a href="{{ route('underConstruction') }}">Clientes</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Pedidos</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Produtos</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Árvore de Categorias</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Características de Produtos</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Banners</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Regras de Promoções</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Cupons de Desconto</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Regras de Frete</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Dados Gerais</a>
    </li>
</ul>
<ul id="dropdownImprensa" class="dropdown-content">
    <li>
        <a href="{{ route('underConstruction') }}">Credenciais</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Materiais de Apoio</a>
    </li>
</ul>
<ul id="dropdownIngressos" class="dropdown-content">
    <li>
        <a href="{{ route('underConstruction') }}">Eventos</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Ingressos</a>
    </li>
</ul>
<ul id="dropdownSocios" class="dropdown-content">
    <li>
        <a href="{{ route('underConstruction') }}">Sócios</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Pagamentos</a>
    </li>
</ul>
<ul id="dropdownDesempenhoAtletas" class="dropdown-content">
    <li>
        <a href="{{ route('quizzesList') }}">Tipos de Avaliação</a>
    </li>
    <li>
        <a href="{{ route('individualAssesmentsList') }}">Avaliações Individuais</a>
    </li>
    <li>
        <a href="{{ route('collectiveAssesmentsList') }}">Avaliações Coletivas</a>
    </li>
</ul>
<ul id="dropdownConfiguracoes" class="dropdown-content">
    <li>
        <a href="{{ route('usersList') }}">Usuários</a>
    </li>
    <li>
        <a href="{{ route('underConstruction') }}">Preferências</a>
    </li>
</ul>
<div class="navbar-fixed light-green darken-2">
    <nav class="light-green darken-2">
        <div class="nav-wrapper">
            <ul class="left hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownCadastrosGerais">
                        Cadastros Gerais
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownCms">
                        CMS
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownEcommerce">
                        E-commerce
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownImprensa">
                        Imprensa
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownIngressos">
                        Ingressos
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownSocios">
                        Sócios
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownDesempenhoAtletas">
                        Desempenho de Atletas
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdownConfiguracoes">
                        Configurações
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
</div>     