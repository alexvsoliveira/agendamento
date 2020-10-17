<!DOCTYPE html>
<html lang="en">
  <head>
    <title>USJT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">


    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <p class="button-custom order-lg-last mb-0">
          <a href="#section-counter" class="btn btn-secondary py-2 px-3 show-login">Login <i class="icon-user-md"></i></a>
          <a href="#section-counter" class="btn btn-secondary ml-3 py-2 px-3 show-paciente">Marque sua consulta</a>
        </p>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="#home" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="#doutores" class="nav-link">Doutores</a></li>
            <li class="nav-item"><a href="#section-counter" class="nav-link show-doutor">Trabalhe Conosco</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel" id="home">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Ajudando você <span>A se manter bem</span></h1>
            <p><a href="#doutores" class="btn btn-secondary px-4 py-3 mt-3">Veja nossos profissionais</a>
            <a href="#section-counter" class="btn btn-secondary px-4 py-3 mt-3 show-paciente">Marque sua consulta</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">Nós importamos<span>Com sua saúde</span></h1>
            <p><a href="#doutores" class="btn btn-secondary px-4 py-3 mt-3">Veja nossos profissionais</a>
            <a href="#section-counter" class="btn btn-secondary px-4 py-3 mt-3 show-paciente">Marque sua consulta</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter imgmb-5" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      <div class="container" id="formulario_paciente">
        <div class="row">
          <div class="col-md-12 py-5 pr-md-5">
            <div class="heading-section heading-section-white ftco-animate mb-5">
              <span class="subheading">Cadastro de paciente</span>
              <h2 class="mb-4">Dados pessoais</h2>
              <p>Campos com (*) são obrigatórios</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="appointment-form ftco-animate">
              @csrf
              <div class="d-md-flex">
                <div class="form-group">
                  <input type="text" name="name" :value="old('name')" required class="form-control" placeholder="Nome completo*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="email" name="email" :value="old('email')" required class="form-control" placeholder="E-mail*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="password" name="password" required class="form-control" placeholder="Senha*">
                </div>
                <div class="form-group">
                  <input type="password" name="password_confirmation" required class="form-control" placeholder="Confirme a senha*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="CPF*">
                </div>
                <div class="form-group ml-md-4">
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Convenio*</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-md-flex">
                <div class="form-group">
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Sexo*</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group ml-md-4">
                  <div class="input-wrap">
                    <div class="icon"><span class="ion-md-calendar"></span></div>
                    <input type="text" class="form-control appointment_date" placeholder="Data de nascimento*">
                  </div>
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Telefone*">
                </div>
              </div>

              <div class="d-md-flex">

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="CEP*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Endereço*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Bairro*">
                </div>

              </div>

              <div class="d-md-flex">

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cidade*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Estado*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Número*">
                </div>


              </div>

              <div class="d-md-flex col-md-5 ml-auto">
                <div class="form-group ml-md-4">
                  <input type="submit" value="Cadastrar" class="btn btn-secondary py-3 px-4">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <div class="container" id="formulario_doutor" style="display: none;">
        <div class="row">
          <div class="col-md-12 py-5 pr-md-5">
            <div class="heading-section heading-section-white ftco-animate mb-5">
              <span class="subheading">Cadastro de Profissionais</span>
              <h2 class="mb-4">Dados pessoais</h2>
              <p>Campos com (*) são obrigatórios</p>
            </div>
            <form action="#" class="appointment-form ftco-animate">
              @csrf
              <div class="d-md-flex">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nome completo*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="email" name="email" :value="old('email')" required class="form-control" placeholder="E-mail*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="password" name="password" required class="form-control" placeholder="Senha*">
                </div>
                <div class="form-group">
                  <input type="password" name="password_confirmation" required class="form-control" placeholder="Confirme a senha*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" required placeholder="CPF*">
                </div>
                <div class="form-group ml-md-4">
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Especialidade medica*</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-md-flex">
                <div class="form-group">
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Sexo*</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="CRM/CRO*">
                </div>
                <div class="form-group ml-md-4">
                  <div class="input-wrap">
                    <div class="icon"><span class="ion-md-calendar"></span></div>
                    <input type="text" class="form-control appointment_date" placeholder="Data de nascimento*">
                  </div>
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Telefone*">
                </div>
              </div>

              <div class="d-md-flex">

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="CEP*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Endereço*">
                </div>
                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Bairro*">
                </div>

              </div>

              <div class="d-md-flex">

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Cidade*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Estado*">
                </div>

                <div class="form-group ml-md-4">
                  <input type="text" class="form-control" placeholder="Número*">
                </div>


              </div>

              <div class="d-md-flex col-md-5 ml-auto">
                <div class="form-group ml-md-4">
                  <input type="submit" value="Cadastrar" class="btn btn-secondary py-3 px-4">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <div class="container" id="formulario_login" style="display: none;">
        <div class="row">
          <div class="col-md-12 py-5 pr-md-5">
            <div class="heading-section heading-section-white ftco-animate mb-5">
              <span class="subheading">Login de paciente</span>
              <p>Campos com (*) são obrigatórios</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="appointment-form ftco-animate">
              @csrf
              <div class="d-md-flex">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" :value="old('email')" required placeholder="Email*">
                </div>
                <div class="form-group ml-md-4">
                  <input  type="password" name="password" required class="form-control" placeholder="Senha*">
                </div>
              </div>

              <div class="d-md-flex">
                <a class="text-white" href="{{ route('password.request') }}">
                    Esqueci minha senha
                </a>  
              </div>

              <div class="d-md-flex col-md-5 ml-auto">
                <div class="form-group ml-md-4">
                  <input type="submit" value="Entrar" class="btn btn-secondary py-3 px-4">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>



		<section class="ftco-section ftco-no-pt  mt-5 " id="doutores">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Doutores</span>
            <h2 class="mb-4">Nossos profissionais qualificados</h2>
            <p>
              <a href="#section-counter" class="btn btn-secondary px-4 py-3 mt-3 show-doutor">Quero ser um doutor</a>
            </p>
          </div>
        </div>
				<div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/doc-1.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr. Lloyd Wilson</h3>
								<span class="position mb-2">Pediatra</span>

							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/doc-2.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr. Rachel Parker</h3>
								<span class="position mb-2">Neurologista</span>

							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/doc-3.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr. Ian Smith</h3>
								<span class="position mb-2">Dentista</span>

							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/doc-4.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr. Alicia Henderson</h3>
								<span class="position mb-2">Ortodontista</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

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

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
