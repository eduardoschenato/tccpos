@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Usuários</h1>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue pulse" href="{{ route('usersNew') }}">
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
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <form action="{{ route('usersDelete', ['id' => $item->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="waves-effect waves-light btn blue" href="{{ route('usersForm', ['id' => $item->id]) }}">
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