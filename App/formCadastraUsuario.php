<?php 
    include_once dirname(__DIR__,1) . '/includes/topoNormal.php';    
?>    

<div class="container">
    <div class="form-row">
        <div class="col-12">
            <p class="h1 border-bottom">Inclusão de usuário</p>
        </div>            
    </div>
    <form id="formCadUsuario" action="#" method="post">
        <div class="form-group">    
            <label for="nome">Nome</label>                
            <input class="form-control" type="text" placeholder="Nome" id="nome" name="nome">
        </div>
        
        <div class="form-row">
            <div class="col-9">
                <div class="form-group">                
                    <label for="endereco">Endereço</label>                  
                    <input class="form-control" type="text"  placeholder="Endereço" id="endereco" name="endereco">
                </div>
            </div>
            
            <div class="col-3">
                <div class="form-group">
                    <label for="bairro">Bairro</label>                
                    <input class="form-control" type="text" placeholder="Bairro" id="bairro" name="bairro">
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
                        $estados = new Utilitarios();                        
                        foreach ($estados->retornaInfoEstados(1) as $indice => $estado) {                                              
                            echo "<option value=\"". $indice ."\">" . $estado . "</option>";
                        }
                        
                      ?>                       
                    </select>                
                </div>
            </div>
            
            <div class="col-4">        
                <div class="form-group">                
                    <label for="cidade">Cidade</label>
                    <input class="form-control" type="text" placeholder="Cidade" id="cidade" name="cidade">
                </div>
            </div>
                                    
            <div class="col-4">
                <div class="form-group">
                    <label for="cep">Cep</label>                
                    <input class="form-control" type="text" placeholder="Somente números" id="cep" name="cep">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-2 form-group">                               
                <label for="ddd">DDD</label>
                <input class="form-control" type="text" placeholder="DDD" id="ddd" name="ddd">
            </div>
        
            <div class="col-3 form-group">
                <label for="telefone">Telefone</label>                
                <input class="form-control" type="text" placeholder="Telefone sem DDD" id="telefone" name="telefone">
            </div>        

            <div class="col-7 form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" placeholder="E-mail" id="email" name="email">
                
            </div>
        </div>      
        
        <div class="form-row">
            <div class="col-4 form-group"> 
                <label for="Senha">Senha</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <div class="col-4 form-group"> 
                <label for="confirmaSenha">Confirma Senha</label>
                <input class="form-control" type="password" id="password2" name="password2">
            </div>                
        </div>
        <div class="form-group">
            <div class="d-none" id="msgCad">&nbsp;</div>
        </div>
       
        <button class="btn btn-primary" type="button" id="cadUsuario" name="cadUsuario" disabled>Cadastrar</button>
        
    </form>
    
</div>


<?php
    require_once dirname(__DIR__,1) . '/includes/rodape.php';
?>