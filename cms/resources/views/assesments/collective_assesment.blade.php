@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Avaliação Coletiva</h1>
            <p class="center-align">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</p>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            @if($item->answers()->first())
                <table class="bordered highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Questão</th>
                            <th>Resposta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item->answers()->get() as $item)
                        <tr>
                            <td>{{ $item->quiz_question->question }}</td>
                            <td>{{ $item->answer }}</td>
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