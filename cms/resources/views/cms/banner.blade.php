@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Banners</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('bannersUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('bannersInsert') }}" method="POST" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="{{ $item->title }}" placeholder="Digite o Título do Banner" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="subtitle">Texto Secundário</label>
                    <textarea class="materialize-textarea" name="subtitle" id="subtitle" placeholder="Digite o Texto Secundário" required>{{ $item->subtitle }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <select name="location" id="location">
                        @foreach($locations as $location => $text)
                            <option value="{{ $location }}" {{ ($item->location == $location) ? 'selected' : '' }}>{{ $text }}</option>
                        @endforeach
                    </select>
                    <label for="location">Localização</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <select name="active" id="active">
                        <option value="1"{{ ($item->active) ? 'selected' : '' }}>Sim</option>
                        <option value="0"{{ (!$item->active) ? 'selected' : '' }}>Não</option>
                    </select>
                    <label for="active">Ativo?</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <select name="featured" id="featured">
                        <option value="1"{{ ($item->featured) ? 'selected' : '' }}>Sim</option>
                        <option value="0"{{ (!$item->featured) ? 'selected' : '' }}>Não</option>
                    </select>
                    <label for="featured">Destaque?</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" value="{{ $item->link }}" placeholder="Digite o link do Banner">
                </div>
                <div class="input-field col s12 m6 l3">
                    <select name="is_external" id="is_external">
                        <option value="1"{{ ($item->is_external) ? 'selected' : '' }}>Sim</option>
                        <option value="0"{{ (!$item->is_external) ? 'selected' : '' }}>Não</option>
                    </select>
                    <label for="is_external">Link Externo?</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <select name="new_tab" id="new_tab">
                        <option value="1"{{ ($item->new_tab) ? 'selected' : '' }}>Sim</option>
                        <option value="0"{{ (!$item->new_tab) ? 'selected' : '' }}>Não</option>
                    </select>
                    <label for="new_tab">Abrir em Nova Aba?</label>
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
                    <a class="waves-effect waves-light btn grey" href="{{ route('bannersList') }}">
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