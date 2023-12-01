@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Postagens</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('postsUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('postsInsert') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="summary">Resumo</label>
                    <textarea class="materialize-textarea" name="summary" id="summary" placeholder="Digite o Resumo" required>{{ $item->summary }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <select name="post_category_id" id="post_category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($item->post_category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="post_category_id">Categoria</label>
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
                    <label for="text">Texto</label>
                    <textarea class="materialize-textarea" name="text" id="text" placeholder="Digite o Texto" required>{{ $item->text }}</textarea>
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
                    <a class="waves-effect waves-light btn grey" href="{{ route('postsList') }}">
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
                                <img src="{{ route('image', ['path' => $image->url_image]) }}" alt="Imagem da postagem {{ $item->title }}">
                                <form action="{{ route('postsDeleteImage', ['id' => $item->id, 'image' => $image->id]) }}" method="POST">
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