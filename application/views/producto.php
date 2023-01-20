<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main>
    <div class="content content-flex">
        <div class= "breadcrumbs">
            <ol>
                <li> <a href="<?php echo base_url();?>index.php"> <b>Home</b> </a> </li>
                <li> <a href="<?php echo base_url();?><?php echo "index.php/Categorias/index/" . $id_cat; ?> "> <?php echo "> <b>". $nombre_categoria . "</b>"; ?> </a> </li>
                <li> <?php echo "> <b>". $titulo . "</b>"; ?> </li>
            </ol>   
        </div>         
        <section id="producto">
            <div id="caracts"> 
                <div class="car-sup">
                    <div class="imagen"> 
                        <img class="producto sepia" src="<?php echo base_url();?><?php echo $imagen; ?>">
                    </div>
                
                    <div class="car">
                        <div> <?php echo "Precio: " .$precio. "€"; ?></div>
                        <div> <?php echo "Potencia: " . $potencia.  "CV"; ?></div>
                        <div> <?php echo "Motor: " . $motor ; ?></div>
                        <div> <?php echo "Consumo: " . $consumo.  "l/100km"; ?></div>
                        <div> <?php echo "Lanzamiento: " . $lanzamiento ; ?></div>
                        <div> <?php echo "Equipamiento: " . $equipamiento ; ?></div>
                    </div>

                    <?php
                        $base= base_url();
                        if(isset($_SESSION['logged_in'])){
                            echo <<< RAW
                                <div class="prodform-flex">
                                    <form id="productform" method="post" action="{$base}index.php/Carritos/insertarproducto" ?>
                                        <input type="hidden" name="id_prod" value="$id">
                                        <input type="hidden" name="nombre" value="$nombre"> 
                                        <input type="hidden" name="imagen" value="$imagen">
                                        <input type="hidden" name="precio" value="$precio">
                                        <div>Cantidad: <input type="number" name="cantidad" value="1" min="1" class="cantidad"></div>
                                        <div><input type="submit" value="Añadir al carrito"></div>
                                    </form> 
                                </div>
                            RAW;
                        }
                        else{
                            echo <<< RAW
                                <div class="prodform-flex">
                                    <div class="compranos">
                                        <a href="{$base}index.php/login/index"> 
                                            <p>Inicia sesión para poder comprar nuestros vehículos</p>
                                        </a>    
                                    </div>
                                </div>
                            RAW;

                        }
                    ?>

                </div>
                <div class="car-inf>">
                    <div>    
                        <div><h1> <?php echo $nombre; ?> </h1></div>
                        <div> <?php echo $descripcion; ?></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>