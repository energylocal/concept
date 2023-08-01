<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

global $path;

$navigation = array(
    array("controller" => "", "href" => ".", "title" => "Home", "icon" => "fa-home"),
    array("controller" => "user", "href" => "user/login", "title" => "Login", "icon" => "fa-user")
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EnergyLocal Dashboard</title>
    <link rel="stylesheet" href="<?php echo $path; ?>theme/style.css?v=12" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://openenergymonitor.org/homepage/theme/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css">
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
    var path = "<?php echo $path; ?>";
</script>

<body class="d-flex flex-column min-vh-100">
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><b>EnergyLocal</b> Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <span class="navbar-text navbar-text-desktop">Making energy work for you</span>
                    <ul class="navbar-nav ms-auto">
                        <?php foreach ($navigation as $nav) {
                            $active = "";
                            if ($route->controller == $nav['controller']) $active = 'active';

                            $show = true;

                            if ($nav['href']=='user/login' && $session['userid']) $show = false;

                            if ($show) {
                        ?>
                            <li class="nav-item"><a class="nav-link <?php echo $active; ?>" href="<?php echo $path; ?><?php echo $nav['href']; ?>" title="<?php echo $nav['title']; ?>"><i class="fas <?php echo $nav['icon']; ?>"></i> <span class="nav-item-text"><?php echo $nav['title']; ?></span></a></li>
                        <?php }} ?>
                    </ul>

                    <?php if ($session['userid']) { ?>
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="avatarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img width="32" height="32" class="rounded-circle avatar-image">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown">
                                <li><a class="dropdown-item" href="<?php echo $path; ?>user/view">My account</a></li>
                                <!--<li><a class="dropdown-item" href="<?php echo $path; ?>system/list">My systems</a></li>-->
                                <?php if ($session['admin']) { ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo $path; ?>user/admin">Admin users</a></li>
                                <li><a class="dropdown-item" href="<?php echo $path; ?>system/admin">Admin systems</a></li>
                                <?php } ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo $path; ?>user/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
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
    <?php if ($session['userid']) { ?>
        <script src="<?php echo $path; ?>Lib/md5.js"></script>
        <script>
            // Include gravitar profile image
            var avatar = document.getElementsByClassName("avatar-image");
            avatar[0].src = "https://www.gravatar.com/avatar/" + CryptoJS.MD5("<?php echo $session['email']; ?>") + "?s=32&d=mm";
        </script>
    <?php } ?>
</body>

</html>
