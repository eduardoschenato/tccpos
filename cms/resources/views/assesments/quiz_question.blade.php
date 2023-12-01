@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Questões</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('quizQuestionsUpdate', ['id' => $item->quiz_id, 'question_id' => $item->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('quizQuestionsInsert', ['id' => $item->quiz_id]) }}" method="POST">
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="quiz_id" value="{{ $item->quiz_id }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="question">Questão</label>
                    <input type="text" name="question" id="question" value="{{ $item->question }}" placeholder="Digite a Questão" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <select name="type" id="type">
                        <option value="T"{{ ($item->type == 'T') ? 'selected' : '' }}>Texto</option>
                        <option value="N"{{ ($item->type == 'N') ? 'selected' : '' }}>Número</option>
                        <option value="TL"{{ ($item->type == 'TL') ? 'selected' : '' }}>Texto Longo</option>
                        <option value="S"{{ ($item->type == 'S') ? 'selected' : '' }}>Seleção</option>
                        <option value="ME"{{ ($item->type == 'ME') ? 'selected' : '' }}>Múltipla Escolha (seleção)</option>
                    </select>
                    <label for="type">Tipo de Questão</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <label for="options">Opções</label>
                    <input type="text" name="options" id="options" value="{{ $item->options }}" placeholder="Digite as opções da questão (separads por vírgula)">
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('quizzesForm', ['id' => $item->quiz_id]) }}">
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