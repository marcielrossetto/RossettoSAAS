<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?? "RossettoSaas"; ?></title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="assets/adminlte/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/css/all.min.css">

    <!-- Optional - custom CSS -->
    <style>
        .content-wrapper { padding: 25px; }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logout" class="nav-link text-danger">Sair</a>
            </li>
        </ul>

    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="dashboard" class="brand-link">
            <span class="brand-text font-weight-light">RossettoSaas</span>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="reservas" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Reservas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="nova-reserva" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Nova Reserva</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php require $view; ?>
    </div>

</div>

<!-- AdminLTE JS -->
<script src="assets/adminlte/js/jquery.min.js"></script>
<script src="assets/adminlte/js/bootstrap.bundle.min.js"></script>
<script src="assets/adminlte/js/adminlte.min.js"></script>

</body>
</html>
