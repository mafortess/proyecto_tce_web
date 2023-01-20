<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang = "es">  

<head>
    <title> <?php echo $titulo; ?> </title>
    <link  href= "<?php echo base_url(); ?>css/style-user-dark-mode.css"  rel="stylesheet" type = "text/css"/>
</head>

<body>
    <div  id= "container">
        <main>
            <div class="content">
                <div id="central">  
                    <div id = "account-info" >
                        
                        <h3> Bienvenido <?php  echo  $usuario->nombre;?> ! </h3>
                        <p> <b> Nombre: </b> <?php echo $usuario->nombre; ?> </p>
                        <p> <b> Correo electrónico: </b> <?php echo $usuario->email; ?> </p>
                        <p> <b> Teléfono: </b> <?php echo $usuario->telefono; ?> </p>

                        <div class="inferior">
                            <div> <a href="<?php echo base_url(); ?>index.php/Login/index">Iniciar sesión </a> </div>
                        </div>
                    </div>
                </div >
            </div>
        </main>
    </div>
</body>
</html> 
