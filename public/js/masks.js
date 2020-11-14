$(function ($) {
    $(".apenas-numeros").keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });

     $('.apenas-letra').on('keypress keyup blur paste', function (e) {
        this.value = this.value.replace(/[^a-zA-ZÃ-Ã ]+/g,'');
     });

    $(".formato-cpf").mask("000.000.000-00");
    $(".formato-cnpj").mask("00.000.000/0000-00");
    $(".formato-data").mask("00/00/0000");
    $(".formato-data-cartao").mask("00/0000");
    $(".formato-cep").mask("00000-000");
    $('.formato-valor').mask('00.000,00', { reverse: true });
    $(".formato-numero").mask('0#');
    $('.formato-rg').mask('ZZZZZZZZZZZZZZZZZZZZ', { translation: { 'Z': { pattern: /[0-9A-Za-z\ \-\.]/, optional: true } } });

    //MÁSCARAS
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length <= 10 ? '(00) 0000-00009' : '(00) 00000-0009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.formato-telefone').mask(SPMaskBehavior, spOptions);

    //$('.formato-celular').mask('(00) 00000-0000');

    $('.formato-email').bind('copy cut paste', function (e) {
        e.preventDefault();
    });

    $('.formato-senha').bind('copy cut paste', function (e) {
        e.preventDefault();
    });


});
