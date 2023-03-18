<?php
    include_once '../Controllers/AutenticacionController.php';

    if(session_status() == PHP_SESSION_NONE)
    {
      session_start();
    }


    //esto no funciona al 100%, deberia si la variable de sesion es diferente a vacia mostrar el header de visitante y si esta llena mostrar el de cliente o admin
    function mostrarNavbar()
    {
        if($_SESSION['email'] == null)
        {
            echo '
            <div class="container-fluid bg-light pt-3 d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center">
                            <p><i class="fa fa-envelope mr-2"></i>info@viajesabc.com</p>
                            <p class="text-body px-3">|</p>
                            <p><i class="fa fa-phone-alt mr-2"></i>+506 0000 0000</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary pl-3" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
            <div class="container-fluid position-relative nav-bar p-0">
                <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                        <a href="" class="navbar-brand">
                            <h1 class="m-0 text-primary"><span class="text-dark">Viajes</span>ABC</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                            <div class="navbar-nav ml-auto py-0">
                                <a href="home.php" class="nav-item nav-link active">Inicio</a>
                                <a href="about.php" class="nav-item nav-link">Sobre Nosotros</a>
                                <a href="service.php" class="nav-item nav-link">Servicios</a>
                                <a href="package.php" class="nav-item nav-link">Paquetes de tour</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu border-0 rounded-0 m-0">
                                        <a href="blog.php" class="dropdown-item">Blog</a>
                                        <a href="single.php" class="dropdown-item">Detalles de blog</a>
                                        <a href="destination.php" class="dropdown-item">Destinos</a>
                                        <a href="guide.php" class="dropdown-item">Guias al viajero</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonios</a>
                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link">Contactenos</a>
                                <a href="Login.php" class="nav-item nav-link">Login</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> '; 
        }else{   
            echo '
            <div class="container-fluid bg-light pt-3 d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center">
                            <p><i class="fa fa-envelope mr-2"></i>info@viajesabc.com</p>
                            <p class="text-body px-3">|</p>
                            <p><i class="fa fa-phone-alt mr-2"></i>+506 0000 0000</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary px-3" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary pl-3" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
            <div class="container-fluid position-relative nav-bar p-0">
                <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                        <a href="" class="navbar-brand">
                            <h1 class="m-0 text-primary"><span class="text-dark">Viajes</span>ABC</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                            <div class="navbar-nav ml-auto py-0">
                                <a href="home.php" class="nav-item nav-link active">Inicio</a>
                                <a href="about.php" class="nav-item nav-link">Sobre Nosotros</a>
                                <a href="service.php" class="nav-item nav-link">Servicios</a>
                                <a href="package.php" class="nav-item nav-link">Paquetes de tour</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu border-0 rounded-0 m-0">
                                        <a href="blog.php" class="dropdown-item">Blog</a>
                                        <a href="single.php" class="dropdown-item">Detalles de blog</a>
                                        <a href="destination.php" class="dropdown-item">Destinos</a>
                                        <a href="guide.php" class="dropdown-item">Guias al viajero</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonios</a>
                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link">Contactenos</a>
                                <form action="" method="post">
                                    <input type="submit" class="nav-item nav-link" id="btnCerrarSesion" name="btnCerrarSesion" value="Cerrar Sesion"
                                    style="background-color: transparent; border: 0px;"/>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> '; 
        }
    }
        
    
        function mostrarFooter()
        {
            echo '
            <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="" class="navbar-brand">
                        <h1 class="text-primary"><span class="text-white">Viajero</span>ABC</h1>
                    </a>
                    <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p>
                    <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Siguenos</h6>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Sobre nosotros</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destinos</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicios</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Paquetes</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guias para el viajero</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonios</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Enlaces recomendados</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Sobre nosotros</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destinos</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Serbicios</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Paquetes</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guias para el viajero</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonios</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Guanacaste Costa Rica</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+506 0000 0000</p>
                    <p><i class="fa fa-envelope mr-2"></i>info@viajesabc.com</p>
                    <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Noticias</h6>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Correo Electronico">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-3">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="row">
                <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0 text-white-50">Copyright &copy; <a href="#">www.viajesabc.com</a>. Todos los derechos reservados.</a>
                    </p>
                </div>
                <div class="col-lg-6 text-center text-md-right">
                    <p class="m-0 text-white-50">Template by <a href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
            </div>
        </div>';
    }
?>