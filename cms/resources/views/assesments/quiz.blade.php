@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Questionários</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('quizzesUpdate', ['id' => $item->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('quizzesInsert') }}" method="POST">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $item->name }}" placeholder="Digite o Nome do Questionário" required>
                </div>
                <div class="input-field col s12 m6 l6">
                    <select name="type" id="type">
                        <option value="I"{{ ($item->type == 'I') ? 'selected' : '' }}>Individual</option>
                        <option value="C"{{ ($item->type == 'C') ? 'selected' : '' }}>Coletiva</option>
                    </select>
                    <label for="type">Tipo de Avaliação</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('quizzesList') }}">
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
        @if($item->id)
            <div class="row">
                <div class="col s12 m12 l12">
                    <a class="waves-effect waves-light btn blue right" href="{{ route('quizQuestionsNew', ['id' => $item->id]) }}"  style="margin-top: 50px">
                        <i class="material-icons">add</i>
                    </a>
                    <h2>Questões:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    @if($item->questions()->first())
                        <table class="bordered highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Questão</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item->questions()->get() as $question)
                                <tr>
                                    <td>{{ $question->question }}</td>
                                    <td>
                                        <form action="{{ route('quizQuestionsDelete', ['id' => $question->quiz_id, 'question_id' => $question->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="waves-effect waves-light btn blue" href="{{ route('quizQuestionsForm', ['id' => $question->quiz_id, 'question_id' => $question->id]) }}">
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
        @endif
    </div>
</section>
@include("includes.footer")