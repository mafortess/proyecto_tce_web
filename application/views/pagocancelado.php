<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
<div class="content content-flex">
        <section id="pago-flex"> 
            <div>
                <h1>PAGO CANCELADO</h1>
                Codigo de operacion: <?php echo htmlspecialchars($PeticionActual); ?>
            </div>

            <div>
                <img class="pago" src="<?php echo base_url()?>/img/cancelado.png" alt="Pago cancelado">
            </div>    
        
        </section>
    </div>
</main>
