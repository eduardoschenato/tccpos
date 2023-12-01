@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Avaliações Coletivas</h1>
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
                            <th>Questionário</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->quiz->name }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                            <td>
                                <a class="waves-effect waves-light btn blue" href="{{ route('collectiveAssesmentsShow', ['id' => $item->id]) }}">
                                    <i class="material-icons">edit</i>
                                </a>
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