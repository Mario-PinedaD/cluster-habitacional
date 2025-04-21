<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="text-center text-white">INICIAR SESION</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php
                        echo idUsuario($idusuario);
                        echo inputPassword($password);
                        echo btnenviar();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>