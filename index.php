
<!DOCTYPE html>
<html lang="es-mx" xmlns="http://www.w3.org/1999/xhtml" class="element-demo" style='width: 100% !important;'>
<head runat="server">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Equipos de respaldo</title>
    <link href="JS/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="CSS/sb-admin-2.min.css" rel="stylesheet">
    <link href="JS/bootstrap/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="JS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/jquery-confirm.css">
    <script src="JS/jquery/jquery.min.js"></script>
    <script src="JS/bootstrap/js/bootstrap.min.js"></script>
    <script src="JS/bootstrap/js/bootstrap-toggle.js"></script>
    <script src="JS/confirm/jquery_confirm.js"></script>
    <script src="JS/angular/angular.min.js"></script>
    <script src="JS/angular/angular-route.min.js"></script>

    <link rel="stylesheet" href="CSS/amaran/amaran.css" />
    <link rel="stylesheet" href="CSS/amaran/animate.css" />
    <script src="JS/amaran/amaran.js"></script>
    <script src="JS/amaran/acciones.js?"></script>

</head>
<body ng-app='mainController'  id="page-top" class="bodywhite element-demo">
    <div id="frmloginSesion" style='background-image: url("img/nueva.jpg");background-position: center right;background-repeat: no-repeat;background-size: cover;position: fixed;top: 0px;bottom: 0px;width: 100%;height: 100%;'>
        <div class='row' style='width: 100% !important;'>
            <div class="col-md-4 col-md-offset-4" style='margin-top:100px;'>
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="loginForm" >
							<legend>Iniciar sesión</legend>

							<div class="form-group" id="frmHP_divErrorUser">
								<label for="usuario">Usuario</label>
								<input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
							</div>

							<div class="form-group" id=frmHP_divErrorPass>
								<label for="password">Password</label>
								<input type="password" name="txtPassword" class="form-control" required id="password" placeholder="****">
							</div>

							<button type="button" class="btn btn-success pull-right" style='background:#1b4b95 !important;' onclick='fnLoginPH();' id='frmPHLogin_OK'>Ingresar</button>
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper" style='display:none;'>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src='img/inkisidor.png' style='width: 50px;' >
                </div>
                <div class="sidebar-brand-text mx-6"></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
                    <div id="Menu_EquipoRespaldo">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Equipos de respaldo</span></a>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link">
                    <div id="Menu_InsertaComponentes">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Componentes</span>
                    </div>
                </a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">equipos </h6>
                        <a class="collapse-item">equipos</a>

                    </div>
                </div>
            </li>
        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logoutoo
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid" ng-view id=ContenedorGeneral>

                </div>
                <div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-md-12">
                                    <div class="col-md-10">
                                        <h5 class="modal-title" id="ModalGeneral_TituloModalGeneral"></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" onclick="$('#exampleModalLong').hide();" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body" id="ModalGeneral_ModalBodyGeneral">

                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>
<script src="JS/RutesAngular.js"></script>
<script src="JS/RespaldosJS.js"></script>
