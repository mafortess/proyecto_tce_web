<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main>
    <div class="content content-flex">
        <section id="lista-carrito">  
            <?php echo "Resultados para: ".$search ; 
            
                if(!empty($productos))
                    {
                        $i=0;
                        $base= base_url();
                        foreach($productos as $prod){
                            echo <<< RAW
                            <a href="{$base}index.php/Productos/index/{$productos[$i]->id}">                       
                                <article class ="producto" id=producto-flex">
                                    <div>
                                        <h1> {$productos[$i]->nombre}  </h1>    <hr> <br>                 
                                        <h4> Precio:  {$productos[$i]->precio} € </h4>     
                                        <h4> Potencia:  {$productos[$i]->potencia}  CV </h4>  
                                        <h4> Motor:  {$productos[$i]->motor}</h4>  
                                        <h4> Consumo:  {$productos[$i]->consumo}  l/100km </h4>  
                                        <h4> Lanzamiento:  {$productos[$i]->lanzamiento}  </h4> 
                                        <h4> Equipamiento:  {$productos[$i]->equipamiento} </h4>   
                                    </div>    
                                    <div>
                                        <img class="producto sepia" src="{$base}{$productos[$i]->imagen}"> 
                                    </div>
                                </article>
                            </a>  
                            RAW;
                            $i++;
                        }  
                    }  else{
                        echo "No existen resultados para esta busqueda";
                    }
                    ?>

        </section>
        <a class="ir-arriba"> <img src="<?php echo base_url(); ?>img/punta-de-flecha-hacia-arriba.png" ></a>

        <section id="categorias"> 
            <div>
                <h2 style="text-align:center">CATEGORIAS</h2> 
            </div>

            <div class="categorias-flex grises"> 
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/1"> 
                        <img src="<?php echo base_url(); ?>img/kia_picanto.png" alt="Portada urbanos">
                        <?php echo html_escape($categorias[0]->nombre); ?>
                    </a>
                </article>
                
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/2">
                        <img src="<?php echo base_url(); ?>img/util-audi_a1.jpg" alt="Portada utilitarios"> 
                        <?php echo html_escape($categorias[1]->nombre); ?>
                    </a>
                </article>

                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/3">
                        <img src="<?php echo base_url(); ?>img/compacto_ford_focus.png" alt="Portada compactos"> 
                        <?php echo html_escape($categorias[2]->nombre); ?>
                    </a>
                </article>

                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/4">
                        <img src="<?php echo base_url(); ?>img/mercedes-berlina.png" alt="Portada berlinas"> 
                        <?php echo html_escape($categorias[3]->nombre); ?>  
                    </a>
                </article>
                
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/5">
                        <img src="<?php echo base_url(); ?>img/seat-alhambra-monovol.png" alt="Portada monovolumenes"> 
                        <?php echo html_escape($categorias[4]->nombre); ?>
                    </a>
                </article>
            </div>
             
            <div class="categorias-flex grises"> 
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/6">
                        <img src="<?php echo base_url(); ?>img/suv_Q7.png" alt="Portada SUV"> 
                        <?php echo html_escape($categorias[5]->nombre); ?>
                    </a>
                 </article>

                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/7">
                        <img src="<?php echo base_url(); ?>img/peugeot-2008-suv.png" alt="Portada deportivos">
                        <?php echo html_escape($categorias[6]->nombre); ?>
                    </a>
                </article>
                
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/8">
                        <img src="<?php echo base_url(); ?>img/mercedes-todoterreno.jpg" alt="Portada todoterrenos"> 
                        <?php echo html_escape($categorias[7]->nombre); ?>  
                    </a>                 
                </article>
 
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/9">
                        <img src="<?php echo base_url(); ?>img/bugatti_veyron.PNG" alt="Portada deportivos">
                        <?php echo html_escape($categorias[8]->nombre); ?>
                    </a>
                </article>
                        
                <article class="cat">               
                    <a href="<?php echo base_url();?>index.php/Categorias/index/10">
                        <img src="<?php echo base_url(); ?>img/mercedes-gt-roadster.png" alt="Portada Descapotables">
                        <?php echo html_escape($categorias[9]->nombre); ?>                
                    </a>
                </article>        
            </div>
        </section>

    </div>
</main>