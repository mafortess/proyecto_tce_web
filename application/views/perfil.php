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
        <section id="pagina-perfil">  
            <h1>Cuenta</h1>      <hr><br><br>

            <div class="perfil-sup-flex">
                <div class="perfil-princ">    
                    <div> <h2><?php echo $usuario->nombre . " " .  $usuario->apellidos; ?> </h2></div>
                    <div class="img-perfil"> <img src="<?php echo base_url(); echo $usuario->imagen;?>" alt="Imagen perfil"></div>
                </div>
                <div>
                    <form method="post" action="<?php echo base_url();?>index.php/Perfil/modificarimagen">
                        <fieldset>
                        <legend> Cambiar imagen </legend>
                            <div>
                                <input type="file" accept="image" name="imagen"  value="<?php echo $usuario->imagen;?>">                                                 
                            </div>

                            <input type="submit" value="Modificar imagen">
                        </fieldset>
                    </form>        
                </div>            
                
                <div >          
                    <a href="<?php echo base_url();?>index.php/RecuperarPassword" class="change-flex">  <div class="changepassword"><p> Cambiar contraseña</p> </div></a>
                </div>
                        
            </div>
            
           
            <div>
                <form id="perfilform" method="post" action="<?php echo base_url();?>index.php/Perfil/modificarperfil" ?> 

                    <input type="hidden" name="nombre" value="<?php echo $usuario->nombre; ?>"  />
                    <input type="hidden" name="apellidos" value="<?php echo $usuario->apellidos; ?>"  />
                    <input type="hidden" name="imagen" value="<?php echo $usuario->imagen; ?>"  />
                    <input type="hidden" name="password" value="<?php echo $usuario->password; ?>"  />
                    <fieldset>   
                        <legend> <h3> Información básica </h3></legend>
                        
                        <div class="perfil-form">
                            <div>
                                <label> Fecha de Nacimiento: </label>
                                <input type="date" name="nacimiento" value="<?php echo $usuario->nacimiento; ?>">                               
                            </div>

                            <div>
                                <label> DNI: </label>
                                <input type="text" name="dni" expresion_regular_dni="/^\d{8}[a-zA-Z]$/;" value="<?php echo $usuario->dni; ?>">                                                      
                            </div>
                                                
                            <div>          
                                <label> Email: </label>
                                <input type="email " name="email" value="<?php echo $usuario->email; ?>">
                            </div>
                            <div>
                                <label> Teléfono: </label>
                                <input type="text" name="telefono" value="<?php echo $usuario->telefono; ?>">          
                            </div>
                            <div>          
                                <label> País: </label>
                                <input type="text" name="pais" value="<?php echo $usuario->pais; ?>">
                            </div>
                        </div>
                    </fieldset>

                    <br><br>
            
                    <fieldset>
                        <legend> <h3> Dirección de envio</h3></legend>
                        
                            <div class="perfil-form2">
                                <div>
                                    </label>Direccion: </label>
                                    <?php echo form_error('direccion', '<div class="error" style="color:red;">', '</div>'); ?>
                                    <input type="text" name="direccion" value="<?php echo $usuario->direccion ?>"  />
                                </div>
                                <div>
                                    </label>Codigo Postal:</label>
                                    <?php echo form_error('codigopostal', '<div class="error" style="color:red;">', '</div>'); ?>
                                    <input type="text" name="codigopostal" value="<?php echo $usuario->codigopostal  ?>"  />
                                </div>
                                <div>
                                    </label>Ciudad:</label>
                                    <?php echo form_error('ciudad', '<div class="error" style="color:red;">', '</div>'); ?>
                                    <input type="text" name="ciudad" value="<?php echo $usuario->ciudad ?>"  />
                                </div>
                                <div>
                                    <label>Telefono:</label>
                                    <?php echo form_error('telefono', '<div class="error" style="color:red;">', '</div>'); ?>
                                    <input type="text" name="telefono" value="<?php echo $usuario->telefono  ?>"  />
                                </div>
                            </div>
                    
                            <input type="hidden" name="rol" value="<?php echo $usuario->rol; ?>" />

                            <div class="fin-form">             
                                <input type="submit" value="Enviar">
                            </div>
                    </fieldset>                                                
                </form>
            </div>
    </div>
</main>
 
