<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="content content-flex">
        <section id="form-envio">
            <div class="form-envio">
                <h1>Tienda Online</h1>

                <h2>Paso final - Direccion de envio</h2>
            
                <?php echo validation_errors('<div class="error" style="color:red;">', '</div>'); ?>

                <?php echo form_open('envio'); ?>

                <h5>Direccion</h5>
                <?php echo form_error('direccion', '<div class="error" style="color:red;">', '</div>'); ?>
                <input type="text" name="direccion" value="<?php echo $direccion /*echo set_value('direccion'); */?>" size="40" />

                <h5>Codigo Postal</h5>
                <?php echo form_error('codigopostal', '<div class="error" style="color:red;">', '</div>'); ?>
                <input type="text" name="codigopostal" value="<?php echo $codigopostal /*set_value('codigopostal');*/ ?>" size="40" />

                <h5>Ciudad</h5>
                <?php echo form_error('ciudad', '<div class="error" style="color:red;">', '</div>'); ?>
                <input type="text" name="ciudad" value="<?php echo $ciudad/*echo set_value('ciudad');*/ ?>" size="40" />

                <h5>Telefono</h5>
                <?php echo form_error('telefono', '<div class="error" style="color:red;">', '</div>'); ?>
                <input type="text" name="telefono" value="<?php echo $telefono /*set_value('telefono');*/ ?>" size="40" /><br><br>

                <input type="hidden" name="total" value="<?php echo $total?>">

                

                <div><input type="submit" value="Continuar" /></div>

                </form>
            </div>
        </section> 
    </div>
</main>