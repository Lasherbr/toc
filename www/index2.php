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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>


<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registre o dia!</h1>
                            </div>
                            <form class="user" action="registro.php" method="post" id="formulario">
                            <div class="form-group">
    <label for="exampleFormControlTextarea1">Descricao do registro</label>
    <textarea name="descricao" class="form-control" id="descricao" rows="5"></textarea>
  </div>
                                <div class="form-group">
                                    Evento Nexus? (Algum evento mais relevante e/ou estressante do que o normal)
                                    <select name="nexus">
                                        <option value="N" selected>Não</option>
                                        <option value="S">Sim</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Grau de ansiedade medido por voce escala de 1 a 10, sendo 1 nenhum stress e 10 muito estressado(a)/ansioso(a).
                                    <select name="grau_ansiedade_observador">
                                        <?php
                                        for($x=0;$x<=10;$x++) {
                                        ?>
                                        <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Grau de ansiedade que o paciente relata em escala de 1 a 10, sendo 1 nenhum stress e 10 muito estressado(a)/ansioso(a).
                                    <select name="grau_ansiedade_paciente">
                                        <?php
                                        for($x=0;$x<=10;$x++) {
                                        ?>
                                        <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> -->
                                <input type=hidden name="logar" id="logar">
                                <a href="javascript:document.getElementById('formulario').submit();" class="btn btn-primary btn-user btn-block">
                                    Registrar
                                </a>
                                <hr>
                             
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



<!-- Outer Row -->
<?php
require_once "model/RegistroEvento.class.php";
$RegistroEvento = new RegistroEvento;
$Matriz = $RegistroEvento->ListaTipoEventos();

for($x=0;$x<sizeof($Matriz);$x++) {
    $TipoEvento = new TipoEvento;
    $TipoEvento = $Matriz[$x];
?>
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $TipoEvento->tipo_evento;?></h1>
                                <p class="mb-4"> <?php echo $TipoEvento->descricao;?></p>
                               

                            </div>
                            <form class="user" action="registro_evento.php" method="post" id="formulario<?php echo $x;?>">
                                <input type="hidden" name="id_tipo_evento" value="<?php echo $TipoEvento->id_tipo_evento;?>" >
                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="quantidade" name="quantidade" aria-describedby="emailHelp"
                                                placeholder="0">
                                        </div>
                                <a href="javascript:document.getElementById('formulario<?php echo $x;?>').submit();" class="btn btn-primary btn-user btn-block">
                                    Registrar Quantidade
                                </a>
                                <hr>
                             
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

</div>

                   
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
                    <a class="btn btn-primary" href="auth/logoff.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>