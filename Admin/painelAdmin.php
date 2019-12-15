<!-- <div class="container"> -->
<!--  --------------------- -->
<div class="row">
    <div class='col-12'>           
        <div class="accordion" id="painelAdmin">
            
            <div class="card">
                <div class="card-header" id="sanfona1" >
                  <h2 class="mb-0">
                    <button class="btn btn-primary col-4" type="button" data-toggle="collapse" data-target="#card1" aria-expanded="true" aria-controls="painelAdmin">          
                        Usuários &RightArrow; Profissionais &RightArrow; Lojistas
                    </button>
                  </h2>
                </div>

                <div id="card1" class="collapse"  aria-labelledby="headingOne" data-parent="#painelAdmin">
                  <div class="card-body">
                      <div class='row'>
                          <div class="col-12">
                              <a class="btn btn-success disabled" href="">Gerenciar Usuários</a>
                              <a class="btn btn-success disabled" href="">Gerenciar Profissionais</a>
                              <a class="btn btn-success disabled" href="">Gerenciar Lojistas</a>                              
                          </div>
                      </div>        
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="sanfona2">
                  <h2 class="mb-0">
                    <button class="btn btn-danger col-4" type="button" data-toggle="collapse" data-target="#card2" aria-expanded="true" aria-controls="painelAdmin">          
                        Categorias &RightArrow; Subcategorias &RightArrow; Itens
                    </button>
                  </h2>
                </div>
                <div id="card2" class="collapse" aria-labelledby="headingOne" data-parent="#painelAdmin">
                  <div class="card-body">
                      
                      <div class='row'>
                          <div class="col-12">                              
                              <a class="btn btn-categoria" href="/Admin/formGerenciarCategorias.php">Gerenciar Categorias</a>
                              <a class="btn btn-subcategoria" href="/Admin/formCadastraSubCategoria.php">Cadastro de Subcategoria</a>
                              <a class="btn btn-subcategoria" href="/Admin/formGerenciarSubCategorias.php">Gerenciar Subcategoria</a>
                              <a class="btn btn-item" href="/Admin/formCadastraItens.php">Cadastro de ítens</a>
                              <a class="btn btn-item" href="/Admin/formGerenciarItens.php">Gerenciar ítens</a>
                          </div>
                      </div>        
                      <div class='row'>
                          <div class="col-12">
                              <a class="btn btn-success" href="/Admin/formGerenciarMontadoras.php">Gerenciar Montadora</a>                              
                          </div>
                      </div>        
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="sanfona3">
                  <h2 class="mb-0">
                    <button class="btn btn-warning col-4" type="button" data-toggle="collapse" data-target="#card3" aria-expanded="true" aria-controls="painelAdmin">          
                        Administração de propagandas
                    </button>
                  </h2>
                </div>
                <div id="card3" class="collapse" aria-labelledby="headingOne" data-parent="#painelAdmin">
                  <div class="card-body">
                      <div class='row'>
                          <div class="col-12">
                              <a class="btn btn-success" href="">Criar Banner</a>
                              <a class="btn btn-success" href="">Criar Slider</a>
                              <a class="btn btn-success" href="">Gerenciar Propagandas</a>                              
                          </div>
                      </div>        
                  </div>
                </div>
             </div>    
        </div>
    </div>   
   <!----------------------  -->
</div> <!-- DIV CONTAINER -->

