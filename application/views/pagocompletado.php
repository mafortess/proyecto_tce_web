<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="content content-flex">
        <section id="pago-flex"> 
            <div>
                <h1>PAGO COMPLETADO</h1>
                Codigo de operacion: <?php echo htmlspecialchars($PeticionActual); ?>
            </div>

            <div>
                <img class="pago" src="<?php echo base_url()?>assets/img/completado.png" alt="Pago completado">
            </div>          
        </section>
    </div>
</main>