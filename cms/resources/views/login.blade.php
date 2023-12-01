@include("includes.head")
<header class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h1 class="center-align">Login</h1>
        </div>
    </div>
</header>
<section class="container">
    <div class="row">
        <form class="col s12 m10 l8 offset-l2 offset-m1" action="{{ route('doLogin') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu E-Mail" required>
                </div>
                <div class="input-field col s12 m12 l12">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua Senha" required>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="right">
                    <a class="waves-effect waves-light btn grey" href="{{ route('gamesList') }}">
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