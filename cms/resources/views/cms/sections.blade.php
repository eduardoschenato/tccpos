@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Seções</h1>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue pulse" href="{{ route('sectionsNew') }}">
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
                            <th>Tipo</th>
                            <th>Título</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                @if($item->images()->first())
                                    <img class="responsive-img" src="{{ route('image', ['path' => $item->images()->first()->url_image]) }}" alt="Seção {{ $item->title }}" style="max-width: 200px;">
                                @endif
                            </td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <form action="{{ route('sectionsDelete', ['id' => $item->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="waves-effect waves-light btn blue" href="{{ route('sectionsForm', ['id' => $item->id]) }}">
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