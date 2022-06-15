// script para passar valor da conta para modal de exclusão

$(document).on('click', '.delete', function () {
    var id = $(this).attr('data-id');
    // pega o id da conta ao clicar no botão, e adiciona ao input id_account
    $('#id_account').val(id);

    $('#mdlExcluir').modal('show');
});
