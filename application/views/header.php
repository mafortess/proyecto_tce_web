<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang = "es">

<head>
    <meta charset="UTF-8">
    <title> <?php echo $titulo; ?> </title>
    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url(); ?>assets/css/style-dark-mode.css" />
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.ir-arriba').click(function(){
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);
            });
            //Boton aparece cuando hacemos scroll hacia abajo
            $(window).scroll(function(){
                if( $(this).scrollTop() > 0 ){
                    $('.ir-arriba').slideDown(300);
                } else {
                    $('.ir-arriba').slideUp(300);
                }
            });
             
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

            $('.sepia').hover(function(){
                filter: sepia(60);
            })
        });
    </script>
</head>

<body>
    <div id="container">
        
        <header class=" header-flex">

            <div class="logo"><a id="logo_header" href="<?php echo base_url(); ?>" > <img src="<?php echo base_url(); ?>assets/img/luxcar_logo.jpeg" alt="Logo"></a>
            </div>

            <div >
                <form class="search" action="<?php echo base_url();?>index.php/productos/barraBusqueda" method="post">
                    <div class="barra-busqueda"><input type="search" name="search"> </div>
                    <div class="btn_header"> <input type="image" src="<?php echo base_url(); ?>assets/icons/lupa-dark.png" size="40px" alt="Boton Lupa"> </div>
                </form>
            </div>

            <div class="util">
            
                    <?php
                        $base=base_url();
                        if(!isset($_SESSION['logged_in'])){
                        //if(!this->session->nombre){
                            echo <<< RAW
                                <div class="btn_header btn_user"><a href="{$base}index.php/login/index"> <div> <p>Inicia sesión</p> <img src="{$base}assets/icons/user-dark.png" alt="Boton Login"> </div></a> </div>
                                <div class="btn_header btn_user"><a href="{$base}index.php/registro/index"> <div> <p>Regístrate</p> <img src="{$base}assets/icons/user-add-dark.png" alt="Boton Registro"> </div> </a> </div>                               
                            RAW;
                        } else{
                            $name = $this->session->username;
                            $id = $this->session->id;
                            $imagen = $this->session->imagen;
                            //echo "<div class=\"btn_user\"> <div class=\"int\"> Hola " .$name ."</div></div>";
                            echo <<< RAW
                                <div class="btn_header btn_user"> <a href="{$base}index.php/Perfil/index"> <div class="int"> Hola $name</div> </a> <div> <img class="user"src="{$base}{$imagen}" alt="Imagen usuario"> </div> </div>
                                <div class="btn_header btn_user"><a href="{$base}index.php/mispedidos/index"> <div> <p>Mis pedidos</p> </div></a> </div>
                                <div class="btn_header"><a href="{$base}index.php/Logout/index"> <div> <img src="{$base}assets/icons/apagar-dark.png" alt="Boton Cerrar Logout"></div></a> </div>
                                <div class="btn_header"><a class="item-flex" id="carrito-img" href="{$base}index.php/Carritos/index"> 
                                    <div> <img src="{$base}assets/icons/carrito-compras-dark.png" alt="Boton carrito compra"> </div></a></div>
                            RAW; 
                        } ?>
  
            </div>

        </header>
</body>

</html>