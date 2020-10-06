<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Merciado Amusement Park</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="../project-2/assets/css/UI.css">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
</head>
<style>
    /* dropdown */
    .dropdown {
      position: relative;
      display: inline-block;
  }
  
  .dropdown-content{
      display: none ;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
  }
  
  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
  }
  
  .dropdown-content a:hover {
      background-color: #ddd;
  }
  
  .dropdown:hover .dropdown-content {
      display: block;
  }
</style>

<body id="home">
    <section class=" header-4 header-sticky">
        <header class="absolute-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h1><a class="navbar-brand" href="index.php"> <span class="fa fa-pagelines" aria-hidden="true"></span>
                            Merciado Park
                        </a></h1>
                    <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav  ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About Us </a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link">Services</a>
                                    <div class="dropdown-content">
                                        <a href="#">Link 1</a>
                                        <a href="#">Link 2</a>
                                        <a href="#">Link 3</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                        <a href="./login.php" class="ml-lg-3 mt-lg-0 mt-3 book btn btn-style"> Log In </a>
                    </div>
            </div>
            </nav>
            </div>
        </header>
    </section>
    <script src="../merciado/assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <script src="./assets/js/jquery-3.5.1.js"></script>
    <!--bootstrap working-->
    <script src="../merciado/assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>