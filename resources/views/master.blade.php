<!DOCTYPE html>
<html lang="en">
<head>
		<title>USJT</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta property="locale" content="pt-BR" />
		<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="/css/animate.css">
		<link rel="stylesheet" href="/css/owl.carousel.min.css">
		<link rel="stylesheet" href="/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="/css/magnific-popup.css">
		<link rel="stylesheet" href="/css/aos.css">
		<link rel="stylesheet" href="/css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="/css/jquery.timepicker.css">
		<link rel="stylesheet" href="/css/icomoon.css">
		<link rel="stylesheet" href="/css/full-calendar.min.css">
		<link rel="stylesheet" href="/css/flaticon.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/custom.css">
		<link rel="stylesheet" href="/css/multiSelect/bootstrap-multiselect.min.css" type="text/css"/>
	</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <p class="button-custom order-lg-last mb-0">
                @if(Auth::check())
                    @if(Auth::user()->current_team_id == 2)
                        <a href="/user/profile" class="btn btn-secondary py-2 px-3 show-login">Perfil <i class="icon-user-md"></i></a>
                        <a href="/consulta" class="btn btn-secondary ml-3 py-2 px-3 show-paciente">Marque sua consulta</a>
                        <a href="/meus-agendamentos/{{Auth::user()->id}}" class="btn btn-secondary ml-3 py-2 px-3 show-paciente">Meus Agendamentos</a>
                    @else
                        <a href="/user/profile" class="btn btn-secondary py-2 px-3 show-login">Perfil <i class="icon-user-md"></i></a>
                        <a href="/meus-agendamentos/{{Auth::user()->id}}" class="btn btn-secondary ml-3 py-2 px-3 show-paciente">Consultas Agendadas</a>
                    @endif
                @else
                    <a href="/login" class="btn btn-secondary py-2 px-3 show-login">Login <i class="icon-user-md"></i></a>
                    <a href="/register" class="btn btn-secondary ml-3 py-2 px-3 show-paciente">Cadastre-se</a>
                @endif
            </p>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav mr-auto">
                    @if(Auth::check())
                        <li class="nav-item active"><a href="/" class="nav-link pl-0">Home</a></li>
                        <li class="nav-item"><a href="/#doutores" class="nav-link">Doutores</a></li>
                    @else
                        <li class="nav-item active"><a href="/" class="nav-link pl-0">Home</a></li>
                        <li class="nav-item"><a href="/#doutores" class="nav-link">Doutores</a></li>
                        <li class="nav-item"><a href="/register_doctor" class="nav-link show-doutor">Trabalhe Conosco</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md">

                    <div class="ftco-footer-widget text-center">


                        <ul class="ftco-footer-social list-unstyled mt-3">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

            <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <!-- <script src="js/popper.min.js"></script> -->
    <script src="/js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <!-- <script src="/js/jquery.waypoints.min.js"></script> -->
    <!-- <script src="/js/jquery.stellar.min.js"></script> -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- <script src="/js/jquery.magnific-popup.min.js"></script> -->
    <script src="/js/aos.js"></script>
    <!-- <script src="/js/jquery.animateNumber.min.js"></script> -->
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="/js/multiSelect/bootstrap-multiselect.min.js"></script>
    <!-- <script src="/js/scrollax.min.js"></script> -->
    <script src="/js/main.js"></script>
    <script src="/js/jquery-validation.min.js"></script>
    <script src="/js/jquery-masks.min.js"></script>
    <script src="/js/fullCalendar/main.min.js"></script>
    <script src="/js/fullCalendar/interaction/main.min.js"></script>
    <script src="/js/fullCalendar/locales/pt-br.js"></script>
    <script src="/js/validation.js"></script>
    <script src="/js/masks.js"></script>
    <script src="/js/custom.js"></script>
</body>

</html>
