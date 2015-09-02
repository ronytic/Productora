</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="<?php echo $folder?>/imagenes/logo/logo.jpg" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?php echo $folder?>imagenes/usuarios/<?php echo $datosusuario['foto']?>">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span><?php echo $datosusuario['nombre']?> <?php echo $datosusuario['paterno']?> <?php echo $datosusuario['materno']?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a><?php echo $datosusuario['nombre']?> <?php echo $datosusuario['paterno']?> <?php echo $datosusuario['materno']?></a></li>
                                    <li class="email"><a><?php echo $datosusuario['usuario']?></a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="<?php echo $folder?>imagenes/usuarios/<?php echo $datosusuario['foto']?>" class="avatar">
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="usuarios/cambiar.php" class="pull-left">Cambiar Contraseña</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo $folder?>/login/logout.php">
                                            Salir del Sistema
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                        
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" disabled />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Búqueda</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="<?php echo $folder;?>" class="menu-dropdown">
                            <i class="menu-icon fa fa-home"></i>
                            <span class="menu-text"> Inicio </span>
                        </a>
                     </li>
                    <?php foreach($menu->mostrar($Nivel) as $m){?>
                    <li>
                        <a href="<?php echo $folder;?>" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-expand"></i>
                            <span class="menu-text"><?php echo $m['nombre']?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <?php if($m['submenu']){?>
                            <ul class="submenu">
                            <?php foreach($submenu->mostrar($Nivel,$m['codmenu']) as $sm){?>
                            <li>
                                <a href="<?php echo $folder;?><?php echo $m['url']?><?php echo $sm['url']?>">
                                    <span class="menu-text"><?php echo $sm['nombre']?></span>
                                </a>
                            </li>
                            <?php }?>
                            </ul>
                        <?php }?>
                    </li>
                    <?php }?>
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            <?php echo $titulo;?>
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body" style="background-size:cover">
                <div class="row">