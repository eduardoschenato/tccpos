@include("includes.header")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Usuários</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        @if($item->id)
        <form action="{{ route('usersUpdate', ['id' => $item->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('usersInsert') }}" method="POST">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $item->name }}" placeholder="Digite o Nome do Usuário" required>
                </div>
                <div class="input-field col s12 m6 l6">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" value="{{ $item->email }}" placeholder="Digite o E-Mail do Usuário" required>
                </div>
            </div>
            @if($item->id)
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" value="" placeholder="Caso deseje manter a senha atual, basta deixar o campo em branco">
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" id="password" value="" placeholder="Caso deseje manter a senha atual, basta deixar o campo em branco">
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" value="" placeholder="Digite a Senha do Usuário" required>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" id="password" value="" placeholder="Confirme a Senha do Usuário" required>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('usersList') }}">
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