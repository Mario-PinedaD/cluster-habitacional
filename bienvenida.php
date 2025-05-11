<?php
//$ruta_base = ''; // Ruta base para los archivos CSS y JS
?>
<div class="body-login">
<div class="container align-middle mt-5 login-wrapper">
        <div class="card-header">
            <h3 class="text-center text-primary" >Iniciar Sesión</h3>    
        </div>
        <form action="index.php" method="post">
            <?php
            echo email($email);
            echo password($password);
            echo btnenviar("Iniciar Sesión");
            ?>
        </form>
        <?php
            if(isset($mensajeError)){
                echo mensajeError($mensajeError);
            }
        ?>
    </div>
</div>