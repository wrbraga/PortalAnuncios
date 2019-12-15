<?php     
namespace App;
    include_once dirname(__DIR__,1) . '/includes/topo.php';
?>

<?php
    include_once dirname(__DIR__,1) . '/barraDeNavegacao.php';
    require dirname(__DIR__,1) . '/App/manipularUsuario.php';
    
    $objUsuario = new \App\ManipularUsuarios();
    $objUsuario->listarUsuario($_SESSION['loginID']);    
    
?>    
    
<div class="container">
    <div class="form-row">
        <div class="col-12">
            <p class="h1 border-bottom">Alteração dos dados</p>
        </div>            
    </div>
    <form id="formAltUsuario" action="../App/alterarUsuarios.php" method="POST">
        <input type="hidden" value="<?php echo $objUsuario->getId(); ?>" id="id" name="id">
        <div class="form-group">    
            <label for="nome">Nome</label>                
            <input class="form-control" type="text" value="<?php echo $objUsuario->getNome(); ?>" id="nome" name="nome">
        </div>
        
        <div class="form-row">
            <div class="col-9">
                <div class="form-group">                
                    <label for="endereco">Endereço</label>                  
                    <input class="form-control" type="text"  value="<?php echo $objUsuario->getEndereco(); ?>" id="endereco" name="endereco">
                </div>
            </div>
            
            <div class="col-3">
                <div class="form-group">
                    <label for="bairro">Bairro</label>                
                    <input class="form-control" type="text" value="<?php echo $objUsuario->getBairro(); ?>" id="bairro" name="bairro">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-4">        
                <div class="form-group">                
                    <label>Estado</label>
                    <select name="estados" class="form-control" id="formSelectEstado" >
                      <option value="" disabled selected>Estado</option>                  
                      <?php
                        require dirname(__DIR__,1) . '/acessorios/Utilitarios.php';
                        $estados = new \acessorios\Utilitarios();     
                        $selecionado = "";
                        foreach ($estados->retornaInfoEstados(1) as $indice => $estado) {                                              
                            if($objUsuario->getEstado() == $indice) { $selecionado = "selected"; }
                            echo "<option value=\"". $indice ."\" $selecionado>" . $estado . "</option>";
                            $selecionado = "";
                        }
                        
                      ?>                       
                    </select>                
                </div>
            </div>
            
            <div class="col-4">        
                <div class="form-group">                
                    <label for="cidade">Cidade</label>
                    <input class="form-control" type="text" value="<?php echo $objUsuario->getCidade(); ?>" id="cidade" name="cidade">
                </div>
            </div>
                                    
            <div class="col-4">
                <div class="form-group">
                    <label for="cep">Cep</label>                
                    <input class="form-control" type="text" value="<?php echo $objUsuario->getCep(); ?>" id="cep" name="cep">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-2 form-group">                               
                <label for="ddd">DDD</label>
                <input class="form-control" type="text" value="<?php echo $objUsuario->getDdd(); ?>" id="ddd" name="ddd">
            </div>
        
            <div class="col-3 form-group">
                <label for="telefone">Telefone</label>                
                <input class="form-control" type="text" value="<?php echo $objUsuario->getTelefone(); ?>" id="telefone" name="telefone">
            </div>        

            <div class="col-7 form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" value="<?php echo $objUsuario->getEmail(); ?>" id="email" name="email">
                
            </div>
        </div>      
        
        <div class="form-row">
            <div class="col-4 form-group"> 
                <label for="Senha">Nova Senha</label>
                <input class="form-control" type="password" id="password" name="password" value="null">
            </div>
            <div class="col-4 form-group"> 
                <label for="confirmaSenha">Confirma Senha</label>
                <input class="form-control" type="password" id="password2" name="password2" value="null">                
            </div>                            
        </div>
        <div class="form-group">
            <div class="d-none" id="msg">Retorno</div>
        </div>
       
        <button class="btn btn-primary" type="submit" id="alterarUsuario" name="alterarUsuario">Alterar</button>
    </form>
    
</div>


<?php
    require_once dirname(__DIR__,1) . '/includes/rodape.php';
?>