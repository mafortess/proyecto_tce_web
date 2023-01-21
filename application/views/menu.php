<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<nav>
    <div id= "menu_opciones">
        <ul class = "menu_desplegable">
            <li class="first" ><a href=""> <img class="menu_img" src="<?php echo base_url(); ?>assets/icons/menu-burger-dark.png"> Nuestros vehículos</a>
                <ul class="desplegable">    
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/1"><?php echo html_escape($categorias[0]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/2"><?php echo html_escape($categorias[1]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/3"><?php echo html_escape($categorias[2]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/4"><?php echo html_escape($categorias[3]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/5"><?php echo html_escape($categorias[4]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/6"><?php echo html_escape($categorias[5]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/7"><?php echo html_escape($categorias[6]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/8"><?php echo html_escape($categorias[7]->nombre); ?></a> </li>
                    <li><a href="<?php echo base_url();?>index.php/Categorias/index/9"><?php echo html_escape($categorias[8]->nombre); ?></a> </li>
                    <li class="last"><a href="<?php echo base_url();?>index.php/Categorias/index/10"><?php echo html_escape($categorias[9]->nombre); ?></a> </li>

                </ul>
            </li>
            <li><a href="<?php echo base_url();?>index.php/aboutus"; ?>Acerca de LuxCar</a></li>
            <li><a href="<?php echo base_url();?>index.php"; ?>Novedades</a></li>
            <li><a href="<?php echo base_url();?>index.php"; ?>Contacto</a></li>
            <li><a href="<?php echo base_url();?>index.php"; ?>Servicio al cliente</a></li>
           
        </ul>
    </div>

    
        
</nav>