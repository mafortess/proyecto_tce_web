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
        <section id="lista-carrito">    
            <?php    
             $total = 0;
             $base = base_url();
            if(!empty($productos))
            {
                $i=0;
               
               
                foreach($productos as $prod){
                    $subtotal = $precio[$i] * $cantidad[$i];

                    echo <<< RAW
                        <a href="{$base}index.php/Productos/index/{$id[$i]}">                       
                            <article class ="producto" id=producto-flex">
                                <div>
                                    <h1> {$nombre[$i]}  </h1> <br>                     

                                    <h4> Precio: {$precio[$i]}€ </h4>          

                                    <div class="cantidad-carrito">
                                        <div>
                                            <form id="compraform" method="post" action="{$base}index.php/Carritos/disminuirproducto">
                                            <input type="hidden" name="id_prod" value="{$id[$i]}">
                                            <input type="submit" name="eliminar" value="<">
                                            </form>
                                        </div>

                                        <div class="cantidad"> {$cantidad[$i]} </div>      
                                    
                                        <div>
                                            <form id="compraform" method="post" action="{$base}index.php/Carritos/aumentarproducto">
                                            <input type="hidden" name="id_prod" value="{$id[$i]}">
                                            <input type="submit" name="eliminar" value=">">
                                            </form>
                                        </div>
                                    </div>

                                </div>    
                                <div class="producto-carrito">
                                    <img class="producto sepia" src="{$base}{$imagen[$i]}"> 
                                    
                                    <div class="subtotal"> Subtotal: {$subtotal}€ </div>      
                                    
                                    <div>
                                        <form id="compraform" method="post" action="{$base}index.php/Carritos/eliminarproducto">
                                        <input type="hidden" name="id_prod" value="{$id[$i]}">
                                        <input type="submit" name="eliminar" value="Eliminar del carrito">
                                        </form>
                                    </div>                                  
                                    
                                </div>
                            </article>
                        </a>  
                        RAW;
                        $total += $precio[$i] * $cantidad[$i];
                    $i++;
                }
                
                $numproductos= sizeof($productos); //PARA DEPURACIÓN
                //echo $numproductos; //PARA DEPURACIÓN
                //echo $total; //PARA DEPURACIÓN

                $i=0;

                echo <<< RAW
                    <a class="ir-arriba"> <img src="{$base}img/punta-de-flecha-hacia-arriba.png" alt="Boton ir arriba" ></a>

                    <article class="carrito-final" id="final-flex">
                        <form id="compraform" method="post" action="{$base}index.php/Carritos/completarcompra">
                        <input type="hidden" name="numproductos" value="{$numproductos}">
                    RAW; 
                        foreach($productos as $prod){
                            echo <<< RAW
                                <input type="hidden" name="productos" value="{$nombre[$i]}">
                            RAW;
                            
                            $i++;
                        }
                    echo <<< RAW
                        <input type="hidden" name="total" value="{$total}">
                        <input type="submit" name="comprar" action="Form/index" value="Comprar">
                        </form>
                        <div> <h3>Importe total: {$total}€ </h3></div>
                    </article>
                    
                    RAW;
            } else{
                echo "La cesta está vacía";
                echo <<< RAW
                    <div class="logo-carrito"><a id="logo_header" href="{$base}" > <img src="{$base}img/luxcar_logo.jpeg" alt="Logo"></a></div>
                RAW;
            }
            ?>           
        </section>
    </div>
</main>