<?php
$session = session()->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Page design</title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&display=swap" rel="stylesheet">
    <!--css link-->
    <link rel="stylesheet" href="<?php echo base_url('admin/style.css') ?>">
    <!--owl slider link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <style>
        .bottom_hicon {
            color: #000;
            width: 30px;
        }
    </style>

</head>

<body>
    <section class="header_sc">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($session['isLoggedInAdmin'])) { ?>
                        <div class="logout_box">
                            <div class="logoutContainer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="logout_icon" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z" />
                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                </svg>
                                <a class='' href='<?php echo base_url("admin/LogOut") ?>'>LogOut</a>
                            </div>
                            <div class="user_container">
                                <img src="<?= base_url("admin/images/" . $session['profilePic']) ?>" alt="">
                                <span><?= $session['username'] ?></span>
                            </div>
                        </div>
                </div>
            <?php } else { ?>
                <div class=" dropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bottom_hicon" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class='dropdown-item' href='<?php echo base_url("admin/signUp") ?>'>Sign Up</a>
                        <a class='dropdown-item' href='<?php echo base_url("admin/login") ?>'>Login</a>
                    </div>
                </div>
            <?php } ?>


            </div>
        </div>
        </div>
    </section>