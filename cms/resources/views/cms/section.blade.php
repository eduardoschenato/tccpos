@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Seções</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('sectionsUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('sectionsInsert') }}" method="POST" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="{{ $item->title }}" placeholder="Digite o Título da Seção" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="text">Texto</label>
                    <textarea class="materialize-textarea" name="text" id="text" placeholder="Digite o Texto" required>{{ $item->text }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="type" id="type">
                        @foreach($types as $type => $text)
                            <option value="{{ $type }}" {{ ($item->type == $type) ? 'selected' : '' }}>{{ $text }}</option>
                        @endforeach
                    </select>
                    <label for="type">Tipo de Seção</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagens</span>
                        <input type="file" name="url_image[]" id="url_image" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('sectionsList') }}">
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
        @if($item->images()->first())
            <div class="row">
                <div class="col s12 m12 l12">
                    <h2>Imagens:</h2>
                </div>
                @foreach($item->images()->get() as $image)
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ route('image', ['path' => $image->url_image]) }}" alt="Imagem da seção {{ $item->title }}">
                                <form action="{{ route('sectionsDeleteImage', ['id' => $item->id, 'image' => $image->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                        
                                    <button type="submit" class="btn-floating halfway-fab waves-effect waves-light red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>                                    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@include("includes.footer")