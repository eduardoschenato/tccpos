@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Dados Gerais</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        <form action="{{ route('parametersUpdate', ['id' => $item->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="type">Dado</label>
                    <input type="text" name="type" id="type" value="{{ $item->type }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="value">Valor</label>
                    <textarea class="materialize-textarea" name="value" id="value" placeholder="Digite o Valor" required>{{ $item->value }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('parametersList') }}">
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