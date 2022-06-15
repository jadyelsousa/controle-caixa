
// Código jquery para validação de front end do formuluário de nova conta
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
                required: true,
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

$("#valor").keyup(function () {

    var v = $("#valor").val().replace(/\D/g, '');
    v = (v / 100).toFixed(2) + '';
    v = v.replace(".", ",");
    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
    $("#valor").val(v);
});

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

// validações de data
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

// validação de CPF

function validaCpfCnpj(val) {
    $('.cpf_cnpj-invalid').remove();
    if (val.length == 14) {
        var cpf = val.trim();

        cpf = cpf.replace(/\./g, '');
        cpf = cpf.replace('-', '');
        cpf = cpf.split('');

        var v1 = 0;
        var v2 = 0;
        var aux = false;

        for (var i = 1; cpf.length > i; i++) {
            if (cpf[i - 1] != cpf[i]) {
                aux = true;
            }
        }

        if (aux == false) {

            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');

        }

        for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
            v1 += cpf[i] * p;
        }

        v1 = ((v1 * 10) % 11);

        if (v1 == 10) {
            v1 = 0;
        }

        if (v1 != cpf[9]) {
            $('.cpf_cnpj-invalid').remove();
            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');


        }

        for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
            v2 += cpf[i] * p;
        }

        v2 = ((v2 * 10) % 11);

        if (v2 == 10) {
            v2 = 0;
        }

        if (v2 != cpf[10]) {
            $('.cpf_cnpj-invalid').remove();
            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');


        } else {
            $('.cpf_cnpj').removeClass('error is-invalid');
            $('.cpf_cnpj-invalid').remove();
        }
    } else if (val.length == 18) {
        var cnpj = val.trim();

        cnpj = cnpj.replace(/\./g, '');
        cnpj = cnpj.replace('-', '');
        cnpj = cnpj.replace('/', '');
        cnpj = cnpj.split('');

        var v1 = 0;
        var v2 = 0;
        var aux = false;

        for (var i = 1; cnpj.length > i; i++) {
            if (cnpj[i - 1] != cnpj[i]) {
                aux = true;
            }
        }

        if (aux == false) {
            $('.cpf_cnpj-invalid').remove();
            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');
        }

        for (var i = 0, p1 = 5, p2 = 13; (cnpj.length - 2) > i; i++, p1--, p2--) {
            if (p1 >= 2) {
                v1 += cnpj[i] * p1;
            } else {
                v1 += cnpj[i] * p2;
            }
        }

        v1 = (v1 % 11);

        if (v1 < 2) {
            v1 = 0;
        } else {
            v1 = (11 - v1);
        }

        if (v1 != cnpj[12]) {
            $('.cpf_cnpj-invalid').remove();
            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');
        }

        for (var i = 0, p1 = 6, p2 = 14; (cnpj.length - 1) > i; i++, p1--, p2--) {
            if (p1 >= 2) {
                v2 += cnpj[i] * p1;
            } else {
                v2 += cnpj[i] * p2;
            }
        }

        v2 = (v2 % 11);

        if (v2 < 2) {
            v2 = 0;
        } else {
            v2 = (11 - v2);
        }

        if (v2 != cnpj[13]) {
            $('.cpf_cnpj-invalid').remove();
            $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');

        } else {
            $('.cpf_cnpj').removeClass('error is-invalid');
            $('.cpf_cnpj-invalid').remove();
        }
    } else {
        $('.cpf_cnpj').focus().addClass('error is-invalid').after('<span class="error invalid-feedback cpf_cnpj-invalid">CPF/CNPJ inválido!</span>');

}
}

