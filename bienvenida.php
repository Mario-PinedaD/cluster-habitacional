<div class="container">
        <div class="card-header">
            <h3 class="text-center text-primary" >Iniciar Sesión</h3>    
        </div>
        <form action="index.php" method="post">
            <?php
            echo email($email);
            echo password($password);
            echo btnenviar();
            ?>
        </form>
        <?php
            if(isset($mensajeError)){
                echo mensajeError($mensajeError);
            }
        ?>
    </div>
</div>