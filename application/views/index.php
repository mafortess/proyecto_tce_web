<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="content content-flex">

        <section id="portada">
            <div id="portada-flex">
                <article class="portada">
                    <video src="<?php echo base_url(); ?>assets/video/Bmw_dentro.mp4" width="100%" loop autoplay muted></video>                
                </article>
                <article class="portada">
                    <video src="<?php echo base_url(); ?>assets/video/coche_noche.mp4" width="100%" loop autoplay muted></video>               
                </article>
                <article class="portada">
                    <video src="<?php echo base_url(); ?>assets/video/Coche_deportivo.mp4" width="100%" loop autoplay muted></video>
                </article>  
            </div>
        </section>
        <section id="mejores"> 
            <div> 
                <h2 style="text-align:center">MEJORES VEHICULOS</h2>
            </div>

            <div id="mejores-flex">
                <article>
                    <a href="<?php echo base_url();?>index.php/Productos/index/40"><img class="sepia" src ="<?php echo base_url(); ?>assets/img/lambo_aventador.PNG" alt="Imagen Lamborghini"> </a>
                    <?php echo html_escape($productos[39]->nombre); ?>
                </article>

                <article class="zoom">
                    <a href="<?php echo base_url();?>index.php/Productos/index/39"> <img  src="<?php echo base_url(); ?>assets/img/ferrari_f8-detras.png" alt="Imagen Ferrari"> </a> 
                    <?php echo html_escape($productos[38]->nombre); ?>
                </article>

                <article>
                    <a href="<?php echo base_url();?>index.php/Productos/index/18"> <img class="sepia" src="<?php echo base_url(); ?>assets/img/bmw-m4.PNG" alt="Imagen BMW"> </a> 
                    <?php echo html_escape($productos[17]->nombre); ?>
                </article> 
            </div>
        </section>

        <section id="novedades"> 
            <div>
                <h2 style="text-align:center">NOVEDADES</h2> 
            </div>

            <div id="novedades-flex">
                <article>
                    <a href="<?php echo base_url();?>index.php/Productos/index/44"> <img src="<?php echo base_url(); ?>assets/img/jaguar.jpg" alt="Imagen Jaguar"> </a> 
                    <?php echo html_escape($productos[43]->nombre); ?>
                </article>

                <article>
                    <a href="<?php echo base_url();?>index.php/Productos/index/43"> <img src="<?php echo base_url(); ?>assets/img/porsche_911.jpg" alt="Imagen Porsche"> </a> 
                    <?php echo html_escape($productos[42]->nombre); ?>
                </article>

                <article>
                    <a href="<?php echo base_url();?>index.php/Productos/index/20"> <img src="<?php echo base_url(); ?>assets/img/tesla-cargando.PNG" alt="Imagen Tesla"> </a> 
                    <?php echo html_escape($productos[19]->nombre); ?>   
                </article>
            </div>
        </section>

        <section id="categorias"> 
            <div>
                <h2 style="text-align:center">CATEGORIAS</h2> 
            </div>

            <div class="categorias-flex grises"> 
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/1"> 
                        <img src="<?php echo base_url(); ?>assets/img/kia_picanto.png" alt="Portada urbanos">
                        <?php echo html_escape($categorias[0]->nombre); ?>
                    </a>
                </article>
                
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/2">
                        <img src="<?php echo base_url(); ?>assets/img/util-audi_a1.jpg" alt="Portada utilitarios"> 
                        <?php echo html_escape($categorias[1]->nombre); ?>
                    </a>
                </article>

                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/3">
                        <img src="<?php echo base_url(); ?>assets/img/compacto_ford_focus.png" alt="Portada compactos"> 
                        <?php echo html_escape($categorias[2]->nombre); ?>
                    </a>
                </article>

                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/4">
                        <img src="<?php echo base_url(); ?>assets/img/mercedes-berlina.png" alt="Portada berlinas"> 
                        <?php echo html_escape($categorias[3]->nombre); ?>  
                    </a>
                </article>
                
                <article class="cat1">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/5">
                        <img src="<?php echo base_url(); ?>assets/img/seat-alhambra-monovol.png" alt="Portada monovolumenes"> 
                        <?php echo html_escape($categorias[4]->nombre); ?>
                    </a>
                </article>
            </div>
             
            <div class="categorias-flex grises"> 
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/6">
                        <img src="<?php echo base_url(); ?>assets/img/suv_Q7.png" alt="Portada SUV"> 
                        <?php echo html_escape($categorias[5]->nombre); ?>
                    </a>
                 </article>

                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/7">
                        <img src="<?php echo base_url(); ?>assets/img/peugeot-2008-suv.png" alt="Portada deportivos">
                        <?php echo html_escape($categorias[6]->nombre); ?>
                    </a>
                </article>
                
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/8">
                        <img src="<?php echo base_url(); ?>assets/img/mercedes-todoterreno.jpg" alt="Portada todoterrenos"> 
                        <?php echo html_escape($categorias[7]->nombre); ?>  
                    </a>                 
                </article>
 
                <article class="cat">
                    <a href="<?php echo base_url();?>index.php/Categorias/index/9">
                        <img src="<?php echo base_url(); ?>assets/img/bugatti_veyron.PNG" alt="Portada deportivos">
                        <?php echo html_escape($categorias[8]->nombre); ?>
                    </a>
                </article>
                        
                <article class="cat">               
                    <a href="<?php echo base_url();?>index.php/Categorias/index/10">
                        <img src="<?php echo base_url(); ?>assets/img/mercedes-gt-roadster.png" alt="Portada Descapotables">
                        <?php echo html_escape($categorias[9]->nombre); ?>                
                    </a>
                </article>        
            </div>
        </section>

        <a class="ir-arriba"> <img src="<?php echo base_url(); ?>assets/icons/punta-de-flecha-hacia-arriba.png" alt="Boton ir arriba" ></a>
    </div>
</main>