$(document).ready(function () {
    //Esconde o menu com a rolagem para baixo
    if ($(window).width() > 992) {
        $(window).scroll(function(){  
           if ($(this).scrollTop() > 40) {
              $('#navbar_top').addClass("fixed-top");
              // add padding top to show content behind navbar
              $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
              $('#navbar_top').removeClass("fixed-top");
               // remove padding top from body
              $('body').css('padding-top', '0');
            }   
        });
      }
    //Dropdown do menu
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
      });
  
      // make it as accordion for smaller screens
      if ($(window).width() < 992) {
            $('.dropdown-menu a').click(function(e){
                e.preventDefault();
              if($(this).next('.submenu').length){
                  $(this).next('.submenu').toggle();
              }
              $('.dropdown').on('hide.bs.dropdown', function () {
                 $(this).find('.submenu').hide();
              })
            });
      }

      $('.carousel').carousel({
          interval: 1000
      })
    
    $("#btn-mostrar").click(function () {
        $(".carousel").show();
    });
    $("#btn-ocultar").click(function () {
        $(".carousel").hide();
    });
    $('[data-toggle=tooltip]').tooltip()
    $('[data-toggle=popover]').popover({ html: true });

    $('.btn-excluir').click(function () {

        $(this).parents("tr").remove();


        $(".toast").toast({
            autohide: true,
            delay: 3000
        }).toast("show");
    });

    $("#form-user").validate({
        rules: {
            name: "required",
            password: "required",
            age: {
                required: true,
                number: true,
                min: "16"
            },

            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: "Insira seu nome",
            password: "Insira sua senha",
            age: {
                required: "Insira sua Idade",
                number: "Sua idade deve ser numérica",
                min: "Você deve ser maior de 16 anos"
            },
            email: {
                required: "Insira seu e-mail",
                email: "Seu e-mail deve ser válido"
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element).addClass("text-danger");
        },
        errorClass: "is-invalid"
    });

    $("#btn-enviar").click(function (event) {
        event.preventDefault();
        if ($("#form-user").valid()) {
            $.ajax({
                method: "POST",
                url: "php.php",
                data: $("#form-user").serialize(),
                timeout: 15000,
                dataType: "json",
                success: function (retorno) {
                    $("#cadastro-cliente .toast-body").html(retorno["message"])
                    $("#cadastro-cliente").toast({
                        autohide: true,
                        delay: 3000
                    }).toast("show");
                }
            });
        }
    });
    function atualizaEndereco(dadosCep){
        if (dadosCep != false){
            $("#cidade").val(dadosCep["cidade"]);
            $("#uf").val(dadosCep["estado"]);
            $("#rua").val(dadosCep["logradouro"]);
            $("#bairro").val(dadosCep["bairro"]);
        }
    }

    $("#cep").focusout(function () {
        let cep = $(this).val();
       consultaCep(cep, atualizaEndereco);
        
    });


});