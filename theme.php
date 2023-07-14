<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EnergyLocal Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://openenergymonitor.org/homepage/theme/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<style>
    .bg-custom {
        background-color: #44b3e2;
        /* Replace with your custom color value */
    }

    .navbar-brand {
        font-size: 22px;
        /* Replace with your desired font size */
    }

    .navbar-nav .nav-link {
        font-size: 18px;
        /* Replace with your desired font size */
    }

    .navbar .navbar-nav .nav-link i {
        margin-right: 0.5rem;
        font-size: 25px;
    }

    .navbar-text-desktop {
        color: rgba(255, 255, 255, 0.8);
    }

    .footer {

        padding: 20px;
        text-align: center;
    }

    @media (min-width: 992px) {
        .nav-item-text {
            display: none;
        }
    }

    @media (max-width: 1200px) {
        .navbar-text-desktop {
            display: none;
        }
    }
</style>

<script>
    var path = "http://localhost/heatpumpmonitororg/";
</script>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><b>EnergyLocal</b> Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <span class="navbar-text navbar-text-desktop">Making energy work for you</span>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link " href="http://localhost/heatpumpmonitororg/."
                                title="Home"><i class="fas fa-home"></i> <span class="nav-item-text">Home</span></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="avatarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img width="32" height="32" class="rounded-circle avatar-image">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown">
                                <li><a class="dropdown-item" href="http://localhost/heatpumpmonitororg/user/view">My
                                        account</a></li>
                                    <hr class="dropdown-divider">
                                <li><a class="dropdown-item"
                                        href="http://localhost/heatpumpmonitororg/user/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="flex-grow-1">
        <?php echo $content; ?>
    </div>

    <footer class="footer sticky-footer bg-custom text-light">
        <div class="container">
            EnergyLocal
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="md5.js"></script>
    <script>
        // Include gravitar profile image
        var avatar = document.getElementsByClassName("avatar-image");
        avatar[0].src = "https://www.gravatar.com/avatar/" + CryptoJS.MD5("") + "?s=32&d=mm";
    </script>
</body>

</html>