<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang = "es">

<head>
    <meta charset="UTF-8">
    <title> <?php echo $titulo; ?> </title>
    <link rel = "icon" href="<?php echo base_url(); ?>assets/img/hacker.jpg"/>
    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url(); ?>assets/css/style-user-dark-mode.css" />
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#imgContrasena").click(function () {
                var control = $(this);
                var estatus = control.data('activo');

                var image = control.find('img');
                if (estatus == false) {
                    control.data('activo', true);
                    $(image).attr('src', '<?php echo base_url(); ?>assets/img/visible_ocultar.png');
                    $("#password").attr('type', 'text');
                }
                else {
                    control.data('activo', false);
                    $(image).attr('src', '<?php echo base_url(); ?>assets/img/visible_mostrar.png');
                    $("#password").attr('type', 'password');
                }
            });
        });
    </script>
</head>

<body>
    <div id="container">
        <main>
            <div class="content">
                <div id="central"> 
                    <div id="login">   <?php //Formulario que envia los datos al controlador login y funcion submit_form ?>
                        <?php echo validation_errors(); ?>                        
                        <h2>Inicia sesión</h2>     
                        <form id="loginform"  method="post" action="<?php echo base_url();?>index.php/Login" ?> 
                            <fieldset>
                                <div>
                                    <div>
                                        <div> <label for="email">Email</label></div>
                                        <div> <input type="text" maxlength="20" name="email" value="miguel@uma.es"> <br></div>
                                    </div>
                                    <div class="ps">
                                        <label for="password">Contraseña</label>
                                        <div> <input type="password" class="control" maxlength="20" name="password" value="hola1234" id="password"> <br></div>
                                        <div style="fit-content" id="imgContrasena" data-activo=false><img src="<?php echo base_url(); ?>assets/icons/visible_mostrar.png" class="icon"></div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="fin-form-login">
                                <input type="submit" value="Entra">
                                <input type="reset" value="Restablecer">
                            </div>
                        </form>
                
                        <div class="pie-form">
                            <a href="<?php echo base_url();?>index.php/RecuperarPassword/index">¿Perdiste tu contraseña?</a>
                            <a href="<?php echo base_url();?>index.php/Registro/index">¿No tienes Cuenta? Registrate</a>
                        </div>
                        <br>
                        <div class="inferior">
                            <div> <a href="<?php echo base_url();?>">Volver a inicio</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>