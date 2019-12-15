<?php 
 require_once __DIR__ . '/includes/geral.php';
 require_once DOCUMENT_ROOT . '/includes/topo.php';
?>
<!-- BODY -->      

    <!-- TOPO -->    
    <?php
        require_once DOCUMENT_ROOT . '/barraDeNavegacao.php';
    ?>    
    
<div class="container-fluid">    
    <!-- SLIDE -->
    <?php 
    if(EXIBIRSLIDE) {
    ?>    
    <div class='row'>
        <div class="container d-none d-md-block">
        <?php
            require_once DOCUMENT_ROOT . '/includes/slider.php';        
        ?>
        </div>
    </div>
    <?php
    }
    ?>
    
    <!-- CORPO -->
    <div class='row'>
        <!-- MENU LADO ESQUERDO -->
        <?php
        $col = 12;
        if(MENUESQUERDO) {        
            $col -= 2;
        ?>
        <div class='col-md-2 d-none d-md-block'>    
            <?php
                include_once DOCUMENT_ROOT . '/includes/menuLateralDireito.php';
            ?>
        </div>
        
        <?php
        }
         
        (MENUDIREITO?$col-=2:0);
            
        ?>
        <!-- MIOLO -->
        <div class="col-md-<?php echo $col;?> padrao">  
            <?php
                require_once DOCUMENT_ROOT . '/includes/miolo.php';
            ?>
        </div>
        
        <!-- MENU LADO DIREITO -->
        <?php
        
        if(MENUDIREITO) {
        ?>
        <div class='col-md-2 d-none d-md-block'>    
            <?php
                include DOCUMENT_ROOT . '/includes/menuLateralDireito.php';
            ?>
        </div>
        <?php
            }
        ?>
        
    </div>    
    
    <!-- RODAPÉ -->    
    <div class="bg-light text-center" style="font-size:9px">
            &REG; <strong>Wesley R. Braga</strong>
    </div>    
</div>
    
<?php
  require_once DOCUMENT_ROOT . '/includes/rodape.php';
?>
