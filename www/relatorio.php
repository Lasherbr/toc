<?php
session_start();
if($_SESSION['logado'] != "S") {
    header("Location: /login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php
  require_once "head.php";
?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       

           

        <?php
           require_once "menu_esquerdo.php";
           ?>
          

          
      
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php 
            require_once "topbar.php";
             ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Relatorio</h1>
<?php
    require_once "model/Registro.class.php";
    $Registro = new Registro;
    $Registro->id_user = $_SESSION['id_user'];
    $MEventos = $Registro->RetornaEntradas();
    ?>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data/Hora</th>
      <th scope="col">Descricao</th>
      <th scope="col">Nexus</th>
      <th scope="col">Nivel Stress Paciente</th>
      <th scope="col">Nivel Stress Observador</th>
    </tr>
  </thead>
  <tbody>
      <?php
for($x=0;$x<sizeof($MEventos);$x++) {
    $dthr_evento = $MEventos[$x]['dthr_evento'];
    $descricao =       $MEventos[$x]['descricao'];
    $nexus =         $MEventos[$x]['nexus'];
    $grau_ansiedade_paciente =         $MEventos[$x]['grau_ansiedade_paciente'];
    $grau_ansiedade_observador =         $MEventos[$x]['grau_ansiedade_observador'];
    
      ?>
    <tr>
      <th scope="row"><?php echo $dthr_evento;?></th>
      <td><?php echo $descricao;?></td>
      <td><?php echo $nexus;?></td>
      <td><?php echo $grau_ansiedade_paciente;?></td>
      <td><?php echo $grau_ansiedade_observador;?></td>
    </tr>
    <?php
}
    ?>
   
  </tbody>
</table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>