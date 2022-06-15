// validação frontend para campos em edição de conta
$(function () {

    $('#cadForm').validate({
        rules: {
            conta: {
                required: true,
            },
            tipo: {
                required: true
            },
            data: {
                required: true
            },
            fornecedor: {
                required: true
            },
            cpf_cnpj: {
                required: true
            },
            valor: {
                required: true
            },
        },
        messages: {
            conta: {
                required: "Preencha esse campo!",
            },
            tipo: {
                required: "Preencha esse campo!"
            },
            data: {
                required: "Preencha esse campo!"
            },
            fornecedor: {
                required: "Preencha esse campo!"
            },
            cpf_cnpj: {
                required: "Preencha esse campo!"
            },
            valor: {
                required: "Preencha esse campo!"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

//  Máscaras de inputs

var e = $("#valor").val().replace(/\D/g, '');
e = (e / 100).toFixed(2) + '';
e = e.replace(".", ",");
e = e.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
e = e.replace(/(\d)(\d{3}),/g, "$1.$2,");
$("#valor").val(e);

$("#valor").keyup(function () {

    var v = $("#valor").val().replace(/\D/g, '');
    v = (v / 100).toFixed(2) + '';
    v = v.replace(".", ",");
    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
    $("#valor").val(v);
});


var tamanho = $("#cpf_cnpj").val().length;

if (tamanho <= 11) {
    $("#cpf_cnpj").mask("999.999.999-99");
} else {
    $("#cpf_cnpj").mask("99.999.999/9999-99");
}



$("#cpf_cnpj").keydown(function () {
    try {
        $("#cpf_cnpj").unmask();
    } catch (e) { }

    var tamanho = $("#cpf_cnpj").val().length;

    if (tamanho < 11) {
        $("#cpf_cnpj").mask("999.999.999-99");
    } else {
        $("#cpf_cnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function () {
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});

// validação de data
$(function () {

    $('#reservationdatetime').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: new Date(),
        changeMonth: true,
        changeYear: true,
        locale: 'pt-br',
    });
});

$('#data').mask('99/99/9999');

