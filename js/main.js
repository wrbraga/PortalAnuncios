function mostraDialogo(mensagem, tipo, tempo){    
    // se houver outro alert desse sendo exibido, cancela essa requisição
    if($("#message").is(":visible")){
        return false;
    }

    // se não setar o tempo, o padrão é 3 segundos
    if(!tempo){
        var tempo = 3000;
    }

    // se não setar o tipo, o padrão é alert-info
    if(!tipo){
        var tipo = "info";
    }

    // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
    var cssMessage = "display: block; position: fixed; top: 0; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
    var cssInner = "margin: 0 auto; box-shadow: 1px 1px 5px black;";

    // monta o html da mensagem com Bootstrap
    var dialogo = "";
    dialogo += '<div id="message" style="'+cssMessage+'">';
    dialogo += '    <div class="alert alert-'+tipo+' alert-dismissable" style="'+cssInner+'">';
    dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
    dialogo +=          mensagem;
    dialogo += '    </div>';
    dialogo += '</div>';

    // adiciona ao body a mensagem com o efeito de fade
    $("body").append(dialogo);
    $("#message").hide();
    $("#message").fadeIn(200);

    // contador de tempo para a mensagem sumir
    setTimeout(function() {
        $('#message').fadeOut(300, function(){
            $(this).remove();
        });
    }, tempo); // milliseconds

}

var linhaTabelaCategoria ; //Linha da tabela de alteração de categoria escolhida
var imagemAlterada ; //Linha da tabela de alteração de categoria escolhida

$(document).ready(function(){    
    $('.carousel').carousel();
    $('.collapse').collapse();
    
    $("#password2").keyup(function(){
       var cont = 0;
       $("#msgCad").removeClass("d-none");
       if($("#password").val() !== $("#password2").val()) {
           $("#password2").addClass("border-danger");
           $("#msgCad").html("A senha de confirmação <strong>não é igual</strong>!");           
           $("#msgCad").addClass("alert alert-danger");
       } else {
           $("#msgCad").html("Senha OK!");
           $("#password2").removeClass("border-danger");
           $("#password2").addClass("border-success");           
           $("#msgCad").removeClass("alert alert-danger");
           $("#msgCad").addClass("alert alert-success");

            $("#formCadUsuario input").each(function(){
                if($(this).val() === "") {                    
                    cont++;
                 }
            });
            if(cont === 0) {
                $('#cadUsuario').attr("disabled", false); 
            }
       }
       
    });    
    
    // Cadastro de usuários
    $('#cadUsuario').click(function() {        
        var dados = $('#formCadUsuario').serialize();        
        var cont = 0;
        $("#formCadUsuario input").each(function(){
            if($(this).val() === "") {
                $(this).css({"border" : "1px solid #F00", "padding": "2px"});
                cont++;
             }
        });
                        
        if(cont === 0) {            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../App/cadastrarUsuarios.php',
                async: true,
                data: dados,
                    success: function(retorno) {                        
                        var mensagem = "<strong>Informações cadastradas com sucesso!</strong>";
                        mostraDialogo(mensagem, "success", 2500);
                        $("#formCadUsuario")[0].reset();                    
                        $("#msgCad").addClass("d-none")
                        $('#cadUsuario').attr("disabled", true); 
                        $("#formCadUsuario input").each(function(){
                            $(this).css({"border" : "1px solid rgba(0,0,0,.2)", "padding" : "10px"});                        
                        });
                    },
                    error: function(retorno) {                        
                        var mensagem = "<strong>Falha  no cadastro!</strong>";
                        mostraDialogo(mensagem, "danger", 2500);
                    }
                          
            });
        }
        
        return false;
    });

    // Alteração dos dados dos usuários
    $('#alterarUsuario').click(function() {       
        var dados = $('#formAltUsuario').serialize();         
        var cont = 0;
        $("#formAltUsuario input").each(function(){
            if($(this).val() === "") {                
                cont++;
             }
        });
        
        if(cont === 0) {    
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../App/alterarUsuarios.php',
                async: true,
                data: dados,
                    success: function(retorno) {
                        if(retorno.status === 'success') {
                            var mensagem = "<strong>Informações alteradas com sucesso!</strong>";
                            mostraDialogo(mensagem, "success", 2500);
                        } else {
                            var mensagem = "<strong>Erro</strong> na alteração!<p>Verifique se você não deixou algum campo em branco!";
                            mostraDialogo(mensagem, "danger", 2500);                    
                        }
                    },
                    error: function(retorno) {
                        var mensagem = "<strong>Erro</strong> na alteração!";
                        mostraDialogo(mensagem, "danger", 2500);                    
                    }

            });
        } else {
            var mensagem = "<strong>Erro</strong> na alteração!<p>Verifique se você não deixou algum campo em branco!";
            mostraDialogo(mensagem, "danger", 2500);   
        };
        return false;
    });
    
    // Se pressionar ENTER no campo SENHA para fazer o LOGIN
    $('#formLogin #senha').keypress(function() {        
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $("#formLogin #login").click();
        };
    });
    
    // Botão para fazer LOGIN
    $('#login').click(function() {      
        var dados = $('#formLogin').serialize();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../App/login.php',
            async: true,
            data: dados
        }).done(function(retorno) {    
            if(retorno.status === 'success') {  
                $('#modalFormLogin').modal('hide');
                location.reload();
            } else {
                console.dir(retorno);
                $("#msg").addClass("alert alert-danger");
                $("#msg").removeClass("d-none");
                $("#msg").html("Falha na autenticação 1!");
            }
        }).fail(function(retorno) {
            console.dir(retorno);
            $("#msg").addClass("alert alert-danger");
            $("#msg").removeClass("d-none");
            $("#msg").html("Falha na autenticação 2!");
        });
        
        return false;
    });
    
    // Botão para EXCLUIR a conta
    $('#btnExcluirConta').click(function() {      
        var dados = null;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../App/excluirUsuario.php',
            async: true,
            data: dados,
            success: function(retorno) {
                if(retorno.status === 'success') {                      
                    $('#modalExcluirConta').modal('hide');
                    location.reload();
                } else {
                    var mensagem = "<strong>Erro</strong> na exclusão!";
                    mostraDialogo(mensagem, "danger", 2500);  
                }  
            },
            error: function(retorno) {
                var mensagem = "<strong>Erro</strong> na exclusão!";
                mostraDialogo(mensagem, "danger", 2500);  
            }
                
        });
        return false;        
    });
    
    // Botão para Cadastro de Categorias
    $('#cadCategoria').click(function() {    
        var modal = $('#formCadCategoria');           
                       
        var file_data = modal.find("#imagem").prop('files')[0];
        var titulo = modal.find("#tituloCategoria").val();
        var form_data = new FormData();  
        form_data.append('file', file_data);
        form_data.append('titulo', titulo);

        $.ajax({
                url         : '../Admin/cadastrarCategoria.php',
                dataType    : 'text',
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                    success: function(retorno) {                     
                        var mensagem = "<strong>Categoria cadastrada com sucesso!</strong>";
                        mostraDialogo(mensagem, "success", 2500);                        
                    },
                    error: function(retorno) {                        
                        var mensagem = "<strong>Falha no cadastro!</strong>";
                        mostraDialogo(mensagem, "danger", 2500);
                    }
         });
         $('#imagem').val('');              
         $('#descricao').val('');
    });
    
    $('#tabelaCategoria #btnAlterar').click(function(e) {
        $('#formModalAltCategoria').modal('show');
      
        var nlinha = (e.target.parentNode.parentElement.rowIndex - 1);
        var linha = $('#tabelaCategoria tbody').find('tr').eq(nlinha);
        var idCategoria = linha.find('td:eq(0)');
        var titulo = linha.find('td:eq(1)');
        linhaTabelaCategoria = nlinha;
      
        var modal = $('#formAltCat');
        modal.find('#descricao').val(titulo.html());
        modal.find('#idcategoria').val(idCategoria.html());
        
    });

    //Botão dentro da janela MODAL para confirmar a alteração 
    //dos dados da categoria
    $('#btnConfirAltCategoria').click(function(event) {
        var file_data = $('#imagem').prop('files')[0];
        var descricao = $('#descricao').val();
        var id = $('#idcategoria').val();
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('descricao', descricao);
        form_data.append('id', id);  
        
        $.ajax({
                url         : '../Admin/alterarCategoria.php',
                dataType    : 'text',           
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                    success: function(retorno) {       
                        var linha = $('#tabelaCategoria tbody').find('tr').eq(linhaTabelaCategoria);
                        var titulo = linha.find('td:eq(1)');
                        var imagem = linha.find('td:eq(2)').find('img'); //conteúdo da célula com a imagem
                        imagem.attr('src',imagemAlterada);
                        titulo.html(descricao);
                                                                        
                        var mensagem = "Categoria <strong>alterada</strong> com sucesso!";
                        mostraDialogo(mensagem, "success", 2500);                        
                    },
                    error: function(retorno) {
                        var mensagem = "<strong>Falha no cadastro!</strong>";
                        mostraDialogo(mensagem, "danger", 2500);
                    }
         });
        $('#imagem').val('');  
        $('#formModalAltCategoria').modal('hide');
    });
    
    //Retorna a imagem escolhida para ser usada na categoria
    $('#formModalAltCategoria #imagem').change( function(event) {
        imagemAlterada = URL.createObjectURL(event.target.files[0]);
        $('#formModalAltCategoria').find('img').fadeIn("fast").attr('src',imagemAlterada);
    });
        
    /* Excluir categoria     
     */
    $('#tabelaCategoria #btnExcluir').click(function(e) {        
        var numLinha = (e.target.parentNode.parentElement.rowIndex - 1);                
        var linha = $('#tabelaCategoria tbody').find('tr').eq(numLinha);
        var id = linha.find('td:eq(0)').html();
        var titulo = linha.find('td:eq(1)').html();
        var modal = $('#modalExcluirCategoria #msg');
        modal.html("Confirma a exclusão de <strong>" + titulo + "</strong>" );
        
        $('#btnExcluirCategoria').click(function() {
            var form_data = new FormData();  
            form_data.append('id', id);

            $.ajax({
                    url         : '../Admin/excluirCategoria.php',
                    dataType    : 'text',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data        : form_data,                         
                    type        : 'post',
                        success: function(retorno) {  
                            $('#tabelaCategoria tbody').find('tr').eq(numLinha).remove();
                            var mensagem = "<strong>Categoria excluída com sucesso!</strong>";
                            mostraDialogo(mensagem, "success", 2500);                        
                        },
                        error: function(retorno) {
                            var mensagem = "<strong>Falha na exclusão!</strong>";
                            mostraDialogo(mensagem, "danger", 2500);
                        }
             });
                                                 
        });
    });
    
    // Botão para Cadastro de Categorias
    $('#cadSubCategoria').click(function() {   
        
        var file_data = $('#formCadSubCategoria #imagem').prop('files')[0];
        var titulo = $('#formCadSubCategoria #titulo').val();
        var idcategoria = $('#formCadSubCategoria #idCategoria').val();
        var form_data = new FormData();  
        form_data.append('file', file_data);
        form_data.append('titulo', titulo);
        form_data.append('id', idcategoria);
        
        $.ajax({
                url         : '../Admin/cadastrarSubCategoria.php',
                dataType    : 'text',
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                    success: function(retorno) {  
                        console.dir(retorno);
                        var mensagem = "<strong>Subcategoria cadastrada com sucesso!</strong>";
                        mostraDialogo(mensagem, "success", 2500);                        
                    },
                    error: function(retorno) {
                        console.dir(retorno);
                        var mensagem = "<strong>Falha no cadastro!</strong>";
                        mostraDialogo(mensagem, "danger", 2500);
                    }
         });
         $('#imagem').val('');              
         $('#titulo').val('');
    });    
    
});