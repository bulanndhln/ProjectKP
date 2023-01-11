<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script>
    window.onload = function() {
        jam();

    }

    function jam() {
        var a = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        a.innerHTML = h + ":" + m + ":" + s;

        setTimeout('jam()', 1000);

        if ((h == 12 && m == 14) || (h == 15 && m == 59)) {
            var element = document.getElementById('satu');
            var newElement = ' <meta http-equiv=\'refresh\' content=\'5; URL=/Dashboard/bot\' />'
            element.insertAdjacentHTML('afterend', newElement);
        }
    }

    function set(a) {
        a = a < 10 ? '0' + a : a;
        return a;
    }
    </script>

    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!--boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('css/dashboard.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel=" stylesheet" id="satu">
    <link rel="shortcut icon" href="<?= base_url('img/logo2.png') ?>">
</head>

<body>

    <header class="navbar sticky-top flex-md-nowrap p-0 shadow" >
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
            <div id="img-logo ">
                <img style="width: 130px; height:40px; " src="/img/logo.png" alt="Logo Telkom Akses">
            </div>
        </a>
        
    </header>

    <div class="container-fluid">
        <div class="row" id="sidebarMenu">
            <nav id="sidebarMenu" class=" col-md-3 col-lg-2 d-md-block sidebar collapse ">
                <div class="position-sticky  sidebar-sticky mt-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if($title=='Welcome | Dashboard' ) echo 'active'; ?>"
                                aria-current="page" href="/Dashboard" id="link-nav">
                                <i class="bi bi-house-door-fill"></i></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($title=='Report PO') echo 'active' ?>"
                            href="/POController/index">
                            <i class="bi bi-file-earmark-text-fill"></i> Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php $active = ($title == 'Target Revenue'  ) ? 'active' : ''; echo $active?>"
                                href="/RevController/index">
                                <i class="bi bi-pin-angle-fill"></i> Target Revenue
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link  <?php if($title=='Data Staff') echo 'active'; ?>"
                                href="/Auth/tampilStaff">
                                <i class="bi bi-people-fill"></i> Staff
                            </a>
                        </li>
                        <li>
                            <div class="navbar-nav" id="logout">
                                <div class="nav-item text-nowrap">
                                <a class="nav-link px-3" href="/logout"><button type="button" class="btn btn-outline-danger">Sign Out</button></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <footer>
                                <div class="copy"><img src="/img/unsri.png" alt="logo unsri" style="width: 40px; "></div>
                                <div class="pembuat"> &copy; <?php echo date('Y')?> This project made with love by Mahasiswa Magang Universitas Sriwijaya</div>
                            </footer>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-1 border-bottom">
                    <h1 class="h2" style="color: #A90000; font-weight:bold;"><?php  
                    if($title=='Welcome | Dashboard') echo 'Welcome to Dashboard';
                    if($title=='Report PO') echo 'Report PO';
                    if($title=='Target Revenue') echo 'Target Revenue';
                    if($title=='Data Staff') echo 'Data Staff';
                    ?>
                    </h1>
                    <h2 id="jam"></h2>
                </div>
                <?= $this->renderSection('container'); ?>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>