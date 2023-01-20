<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
<title>Conectandose a UMAPal</title>

</head>
<body onload="document.umapal.submit()">
<!-- <body onload="document.forms['member_signup'].submit()"> -->

<h3>Conectandose a UMAPal, espere unos instantes...</h3>

<!-- Ver https://developer.paypal.com/api/nvp-soap/paypal-payments-standard/integration-guide/formbasics/ -->
<form name="umapal" action="<?php echo base_url(); ?>umapal/procesar.php" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="mi@negocio.com">
  <?php
    $i=0;
    foreach($productos as $prod){
      echo <<< RAW
        <input type="hidden" name="item_name{$i}" value="{$nombre[$i]}">
        <input type="hidden" name="item_number{$i}" value="{$id[$i]}">
        <input type="hidden" name="amount{$i}" value="{$precio[$i]}">
        <input type="hidden" name="quantity{$i}" value="{$cantidad[$i]}">
        <input type="hidden" name="currency_code{$i}" value="EUR">
        RAW;
        $i++;
    }
  ?>
  <input type="hidden" name="amount" value="<?php echo $total ?>">
  <!-- Indicamos que la direccion viene dada por la web -->
  <input type="hidden" name="address_override" value="1">
  <input type="hidden" name="first_name" value="<?php echo $firstname /*echo set_value('nombre') */?>">
  <input type="hidden" name="last_name" value="<?php echo $lastname /*set_value('apellidos') */?>">
  <input type="hidden" name="address1" value="<?php echo set_value('direccion'); ?>">
  <input type="hidden" name="city" value="<?php echo set_value('ciudad'); ?>">
  <input type="hidden" name="zip" value="<?php echo set_value('codigopostal'); ?>">
  <input type="hidden" name="country" value="ES">
  <input type="hidden" name="return" value="<?php echo base_url(); ?>index.php/PagoSuccess">
  <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>index.php/PagoCancel">
  <!-- Este valor no existe en paypal, pero nos ayudara a la hora de simular peticiones unicas -->
  <input type="hidden" name="cartID" value="<?php echo $PeticionActual; ?>">
  <input type="submit" value="Enviar a UMAPal" />
</form>

</body>
</html>