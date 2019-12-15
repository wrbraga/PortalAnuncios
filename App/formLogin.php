<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<div class="container">
    
    <form class="form-signin" id="formLogin" action="" method="post">
        <div class="form-group">    
            <label for="nome">Email</label>                
            <input class="form-control" type="email" placeholder="Seu email" id="email" name="email">
        </div>
        <div class="form-group">    
            <label for="senha">Senha</label>                
            <input class="form-control" type="password" placeholder="Senha" id="senha" name="senha">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="login" name="login" disabled>Entrar</button>
    </form>
    
</div>
        