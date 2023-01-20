<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main>
    <div class="content content-flex">
        <div class= "breadcrumbs">
                <ol>
                    <li> <a href="<?php echo base_url();?>index.php"> <b>Home</b> </a> </li>
                    <li> <?php echo "> <b>". $titulo . "</b>"; ?> </li>
                </ol>   
            </div>    
        <section id="lista-pedidos">    
            <?php    
            if(!empty($compras))
            {
                $i=0;
                $base = base_url();
               
                foreach($compras as $comp){
                   

                    echo <<< RAW
                        <a href="{$base}index.php/Productos/index/{$id[$i]}">                       
                            <article class ="producto" id=producto-flex">
                                <div>
                                    <h1> {$nombre[$i]}  </h1> <hr> <br>                      
                                    <div> ID transacción: {$id_compra[$i]} </div>
                                    <div> Fecha compra: {$fecha_compra[$i]} </div>
                                    <h4> Precio: {$precio[$i]}€ </h4>                                    
                                    <div> Cantidad: {$cantidad[$i]} </div>
                                </div>    
                                <div class="producto-carrito">
                                    <img class="producto sepia" src="{$base}{$imagen[$i]}">                                            
                                    
                                </div>
                            </article>
                        </a>  
                        RAW;
                    $i++;
                }
            } else{
                echo "No hay compras realizadas";
            }
            ?>           
        </section>

    </div>
</main>