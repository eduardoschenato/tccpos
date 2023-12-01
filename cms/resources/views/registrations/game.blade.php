@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Partidas</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('gamesUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('gamesInsert') }}" method="POST" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l4">
                    <label for="opponent">Adversário</label>
                    <input type="text" name="opponent" id="opponent" value="{{ $item->opponent }}" placeholder="Digite o Nome do Adversário" required>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label for="place">Local</label>
                    <input type="text" name="place" id="place" value="{{ $item->place }}" placeholder="Digite o Local da Partida" required>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label for="date">Data</label>
                    <input type="date" name="date" id="date" value="{{ ($item->date) ? date('Y-m-d', strtotime($item->date)) : date('Y-m-d') }}" placeholder=" " required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <label for="team_score">Placar do Time</label>
                    <input type="number" name="team_score" id="team_score" value="{{ $item->team_score }}" placeholder="Digite o Placar do Time (deixar em branco caso a partida não tenha sido jogada)">
                </div>
                <div class="input-field col s12 m6 l6">
                    <label for="opponent_score">Placar do Adversário</label>
                    <input type="number" name="opponent_score" id="opponent_score" value="{{ $item->opponent_score }}" placeholder="Digite o Placar do Adversário (deixar em branco caso a partida não tenha sido jogada)">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem</span>
                        <input type="file" name="url_image" id="url_image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('gamesList') }}">
                        <i class="material-icons left">cancel</i>
                        Cancelar
                    </a>
                    <button type="submit" class="waves-effect waves-light btn light-green">
                        <i class="material-icons left">save</i>
                        Salvar
                    </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@include("includes.footer")