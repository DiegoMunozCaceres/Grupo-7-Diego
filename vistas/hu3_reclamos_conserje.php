<?php
function borrarErrores(){
	$borrado = false;
	

	if(isset($_SESSION['ingresado'])){
		$_SESSION['ingresado'] = null;
		$borrado = true;
	}
    if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}
?>
<!-- head -->
<?php include('../partes/head.php') ?>

<!-- fin head -->

<!-- mostrar diario mural -->
<?php include("../controlador/hu3_controlador_reclamos/hu3_mostrar_reclamos.php") ?>
<?php include('../partes/hu4_conserjeria/hu4_modal_agregar.php'); ?>

<!-- fin diario mural -->
<?php if($_SESSION['tipo']=='Vecino' || !isset($_SESSION['tipo'])){

header('Location: ../inicio');
}
?>
<body>

    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">
            <!-- Navbar -->

            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <!-- Button trigger modal -->
                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3 ">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">¡Bienvenido al apartado de Reclamos! </h1><br>
                            <h5>Revisa la última información de la tabla de reclamos.</h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h5 class="text-center">Recuerda mantener discreción con la privacidad de los reclamos emitidos.</h5>


                            <?php if(isset($_SESSION['ingresado'])): ?>
                            <div class="alert alert-success" role="alert">
                            <h5 class="text-center">Reclamo eliminado exitosamente!</h5>
                            </div>
                            <?php endif; ?>
                            <?php borrarErrores(); ?>        



                        </div>

                    </div>
                </section>

                <section class="py-0 my-0">
                    <div class="container">
                        <!-- Listar tabla de avisos -->
                        <table class="table table-hover" id="table_reclamos">
                            <!-- Head Tabla -->
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th scope="col-1">Remitente</th>
                                    <th scope="col-1">Destinatario</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col-1">Descripción</th>
                                    <th scope="col-1">Opciones </th>
                                   
                                    


                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php if($consulta_reclamos_conserje_sql): foreach($resultado_conserje as $row): ?>
                                <tr>
                                    <td aling="center">
                                    <?php  echo "<b style='font-weight: bold;'>".$row['remitente_nombre']." ".$row['remitente_apellido']."</b><br>";?>
                                        
                                        <?php echo "<small>".$row['remitente_edificio']." - ".$row['remitente_departamento']."</small>"?>
                                        <br>
                                        <?php echo "<small>".$row['remitente_correo']."</small>"?>
                                    </td>

                                    <td aling="center">
                                    <?php  echo "<b style='font-weight: bold;'>".$row['destinatario_nombre']." ".$row['destinatario_apellido']."</b><br>";?>
                                        
                                        <?php echo "<small>".$row['destinatario_edificio']." - ".$row['destinatario_departamento']."</small>"?>
                                        <br>
                                        <?php echo "<small>".$row['destinatario_correo']."</small>"?>
                                    </td>

                                    <td><?php echo $row['formulario_fecha']." ".$row['formulario_hora']?></td>

                                    <td>
                                    <?php  echo "<b style='font-weight: bold;'>".$row['formulario_titulo']."</b><br>";?>
                                        <?php echo $row['formulario_contenido']?></td>
                                    
                                        <?php $formulario_id = $row['reclamo_id']; ?>
                                    <td>
                                    <a class="btn btn-primary " id="eliminar"
                                                    href="../controlador/hu3_controlador_reclamos/hu3_eliminar_reclamo_conserje.php?id=<?= $formulario_id?>"><i
                                                    class="btn-del fa-solid fa-trash-can"></i>
                                                    </a>
                                    </td>

                                    <td>



                                </tr>
                                <?php endforeach; endif ?>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <!-- Modal publicar -->
            
                                 
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
                integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
                integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
                integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
                crossorigin="anonymous">
            </script>

            <!-- Font awesome -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
                integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- Data table -->
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

            <!-- Data table cambio de idioma -->
            <script type="text/javascript" src="../js/data_table_reclamos.js"></script>

            <!-- Sweet alert-->
            <script type="text/javascript" src="../js/alerta_agregar.js"></script>
            <script type="text/javascript" src="../js/alerta_eliminar.js"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>

            <!-- sweetalert2 -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/alerta_agregar.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>

            <script type="text/javascript" src="../js/alerta_agregar.js"></script>

            

</body>

</html>
