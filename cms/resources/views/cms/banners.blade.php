@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Banners</h1>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue pulse" href="{{ route('bannersNew') }}">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            @if($items->first())
                <table class="bordered highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Localização</th>
                            <th>Título</th>
                            <th>Ativo</th>
                            <th>Destaque</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                @if($item->url_image)
                                    <img class="responsive-img" src="{{ route('image', ['path' => $item->url_image]) }}" alt="Banner: {{ $item->title }}" style="max-width: 200px;">
                                @endif
                            </td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->active ? 'Sim' : 'Não' }}</td>
                            <td>{{ $item->featured ? 'Sim' : 'Não' }}</td>
                            <td>
                                <form action="{{ route('bannersDelete', ['id' => $item->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="waves-effect waves-light btn blue" href="{{ route('bannersForm', ['id' => $item->id]) }}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <button type="submit" class="waves-effect waves-light btn red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card horizontal hoverable">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>Nenhum Registro Encontrado!</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@include("includes.footer")