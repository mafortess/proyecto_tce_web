<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang = "es">

<head>
    <meta charset="UTF-8">
    <title> <?php echo $titulo; ?> </title>
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
                    $(image).attr('src', '<?php echo base_url(); ?>assets/icons/visible_ocultar.png');
                    $("#password").attr('type', 'text');
                }
                else {
                    control.data('activo', false);
                    $(image).attr('src', '<?php echo base_url(); ?>assets/icons/visible_mostrar.png');
                    $("#password").attr('type', 'password');
                }
                }); 
            });
            $(document).ready(function(){
                $("#imgContrasenaconf").click(function () {
                var control = $(this);
                var estatus = control.data('activo');

                var image = control.find('img');
                if (estatus == false) {
                    control.data('activo', true);
                    $(image).attr('src', '<?php echo base_url(); ?>assets/icons/visible_ocultar.png');
                    $("#passwordconf").attr('type', 'text');
                }
                else {
                    control.data('activo', false);
                    $(image).attr('src', '<?php echo base_url(); ?>assets/icons/visible_mostrar.png');
                    $("#passwordconf").attr('type', 'password');
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
                    <div id="registro">
                        <?php echo validation_errors(); ?>
                        <h2>Regístrate</h2>    
                        <form id="registerform" method="post" action="<?php echo base_url();?>index.php/Registro" ?> 
                        
                            <fieldset name="informacion">
                                <div>                             
                                    <label> Nombre: </label>
                                    <input type="text" name="nombre">                                    
                                </div>
                                <div>
                                    <label> Apellidos: </label>
                                    <input type="text" name="apellidos">                                                 
                                </div>
                                <div>
                                    <label> Fecha de Nacimiento: </label>
                                    <input type="date" name="nacimiento">                               
                                </div>
                                <div>
                                    <label> DNI: </label>
                                    <input type="text" name="dni" expresion_regular_dni=/^\d{8}[a-zA-Z]$/;>                                                      
                                </div>
                                <div>          
                                    <label> País: </label>
                                    <input type="text" name="pais">
                                </div>
                                <div>          
                                    <label> Provincia: </label>
                                    <input type="text" name="provincia">
                                </div>
                                <div>          
                                    <label> Contraseña: </label>
                                    <input type="password" name="password" class="control" id="password">
                                    <div id="imgContrasena" data-activo=false><img src="<?php echo base_url(); ?>assets/icons/visible_mostrar.png" class="icon"></div>
                     
                                </div>
                                <div>          
                                    <label> Vuelve a introducir la contraseña: </label>
                                    <input type="password" name="password_confirmation" id="passwordconf">
                                    <div id="imgContrasenaconf" data-activo=false><img src="<?php echo base_url(); ?>assets/icons/visible_mostrar.png" class="icon"></div>
                                </div>
                                <div>          
                                    <label> Email: </label>
                                    <input type="email " name="email">
                                </div>
                                <div>
                                    <label> Teléfono: </label>
                                    <input type="text" name="telefono">                          
                                </div>
                            </fieldset>
                            <div class="fin-form">             
                                    <input type="submit" value="Entra">
                                    <input type="reset" value="Restablecer">                                 
                            </div>
                        </form>
                        <div class="inferior">
                            <a href="<?php echo base_url();?>index.php/Login/index">¿Ya tienes Cuenta? Inicia sesión</a>
                            <br>
                            <div> <a href="<?php echo base_url(); ?>">Volver a inicio</a> </div>
                        </div>
                    </div>
                </div>          
            </div>
            </main>
        </div>
    </body>
</html>