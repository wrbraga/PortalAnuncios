<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <?php
        require_once 'geral.php';
        include_once DOCUMENT_ROOT . '/includes/geral.php';
        $arquivos = array();
        foreach(array_diff(scandir(DIRIMGSLIDE), array('..', '.')) as $a) {
            if(strripos($a, EXTENSAOIMGSLIDES)) {
                $arquivos[] = $a;
            }

        }

        $tamanho = count($arquivos);
        $texto = "";
        
        for($i = 0; $i < ($tamanho < LIMITENUMIMGSLIDE ? $tamanho : LIMITENUMIMGSLIDE); $i++) {
            $texto .= "<li data-target=\"#carousel-example-1z\" data-slide-to=\"" . ($i) ;
            if(($i) == 0) {
                $texto .= "\" class=\"active\"></li>";
            } else {
                $texto .= "\"></li>";
            }
            echo $texto . "\n";
            $texto = "";
        }
    ?>
  </ol>
  <!--/.Indicators-->
  
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
      
    <?php               
        foreach ($arquivos as $indice => $arquivo) {            
            if ($arquivo != ".." && $arquivo != ".") {
                $texto .= "<div class='carousel-item" . ($indice == 2 ? " active'" : "'") . ">";
                $texto .= "<img class='d-block w-100'  height='" . ALTURAIMAGEMSLIDE . "' src='" . DIRIMGSLIDE . $arquivo . "' alt='slide " . ($indice) . "'>";
                $texto .= "</div>\n";
                echo $texto;       
                $texto = "";
            }
       }
    ?>            
    
  </div>
  <!--/.Slides-->
  
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->