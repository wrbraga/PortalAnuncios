<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/geral.php';
?>
<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href= "../index.php">
    <?php
        if(empty(LOGOSITE_TXT)) {
            echo "<img src='" . LOGOSITE_IMG . "' width='50' height='50' alt='Logo' class='d-inline-block align-top'/>";
        } else {
            echo LOGOSITE_TXT;
        }
    ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="col-xl-1 d-none d-xl-block">
        
    </div>
    
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 largura" type="search" placeholder="Procurando por..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
    </form>
    </div>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Início<span class="sr-only">(current)</span></a>
      </li>
      <?php
        if(!isset($_SESSION['loginNome'])) {
      ?>      
      <li class="nav-item">
        <a class="nav-link" href="#!" data-toggle="modal" data-target="#modalFormLogin">Entrar</a>
      </li>
      <?php
        }        
        if(isset($_SESSION['loginNivel']) && ($_SESSION['loginNivel'] == 0) ) {            
      ?>
      <li class="nav-item">
          <a class="nav-link text-danger bg-warning" href="../Admin/principal.php">Administrador</a>
      </li>
      <?php
        }
      ?>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
          Cadastrar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/App/formCadastraUsuario.php">Usuário</a>
          <a class="dropdown-item" href="../App/cadastraLojista.php">Lojista</a>
          <a class="dropdown-item" href="../App/cadastraProfissional.php">Profissional</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../App/formLogin.php">Login</a>
        </div>
      </li>                 
    </ul> 
        <?php 
        if(isset($_SESSION['loginNome'])) {
            echo "<span class=\"badge badge-pill badge-success dropdown\">";
        ?>
            <a class="nav-link dropdown-toggle badge-success" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
             <?php echo $_SESSION['loginNome']; ?>
            </a>
            
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../App/formAlterarUsuario.php">Alterar Dados</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#modalExcluirConta" href="">Excluir Conta</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../App/sair.php">Sair</a>
            </div>
        <?php
         echo "</span>";
        }
        ?>
          
  </div>
</nav>


<!-- Modal de Login-->
<div class="modal fade" id="modalFormLogin" tabindex="-1" role="dialog" aria-labelledby="modalFormLogin" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faça seu login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-signin" id="formLogin" action="" method="post">
        <div class="form-group">    
            <label for="nome">Email</label>                
            <input class="form-control" type="email" placeholder="Seu email" id="email" name="email">
        </div>
        <div class="form-group">    
            <label for="senha">Senha</label>                
            <input class="form-control" type="password" placeholder="Senha" id="senha" name="senha">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="login" name="login">Entrar</button>
        </form>
      </div>
        <div class="alert">
            <div class="alert d-none" id="msg">&nbsp;</div>
        </div>        
    </div>
  </div>
</div>


<!-- Modal para excluir a conta -->
<div class="modal fade" id="modalExcluirConta" tabindex="-1" role="dialog" aria-labelledby="modalExcluirConta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exclusão definitiva da conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confirma a Exclusão da conta?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnExcluirConta">Sim Excluir!</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Manter a conta</button>
      </div>
    </div>
  </div>
</div>

