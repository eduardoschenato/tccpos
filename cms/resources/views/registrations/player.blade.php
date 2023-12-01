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
        <form action="{{ route('playersUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('playersInsert') }}" method="POST" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $item->name }}" placeholder="Digite o Nome do Jogador" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <select name="player_position_id" id="player_position_id">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ ($item->player_position_id == $position->id) ? 'selected' : '' }}>{{ $position->name }}</option>
                        @endforeach
                    </select>
                    <label for="player_position_id">Posição</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <select name="active" id="active">
                        <option value="1"{{ ($item->active) ? 'selected' : '' }}>Sim</option>
                        <option value="0"{{ (!$item->active) ? 'selected' : '' }}>Não</option>
                    </select>
                    <label for="active">Ativo?</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
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
                    <a class="waves-effect waves-light btn grey" href="{{ route('playersList') }}">
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