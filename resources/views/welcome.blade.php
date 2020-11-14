@extends('master')
@section('content')
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



<section class="ftco-section ftco-no-pt  mt-5 " id="doutores">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Doutores</span>
                <h2 class="mb-4">Nossos profissionais qualificados</h2>
                <p>
                    <a href="/register-doctor" class="btn btn-secondary px-4 py-3 mt-3 show-doutor">Quero ser um doutor</a>
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
@endsection
