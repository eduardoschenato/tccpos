<footer class="page-footer transparent">
    <div class="container black-text center-align">
        © 2023 - Desenvolvido por Eduardo Schenato dos Santos como TCC do curso de pós-graduação em Arquitetura de Software Distribuído - PUC Minas
    </div>
</footer>

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();
});

function submitDeleteForm() {
    return confirm("Deseja realmente excluir este registro?");
}
</script>
</body>
</html>