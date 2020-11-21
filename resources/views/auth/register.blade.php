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

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter imgmb-5" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container" id="formulario_paciente">
        <div class="row">
            <div class="col-md-12 py-5 pr-md-5">
                <div class="heading-section heading-section-white ftco-animate mb-5">
                    <span class="subheading">Cadastro de paciente</span>
                    <h2 class="mb-4">Dados pessoais</h2>
                    <p>Campos com (*) são obrigatórios</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="appointment-form wow fadeIn">
                    @csrf
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="hidden" name="type" value="customer">
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
                            <input type="text" class="form-control" name="cpf" :value="old('cpf')" placeholder="CPF*">
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="form-field">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="sexo" id="sexo" class="form-control">
                                        <option value="">Sexo*</option>
                                        <option value="m">Masculino</option>
                                        <option value="f">Feminino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" class="form-control appointment_date" name="dt_nasc" placeholder="Data de nascimento*">
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" name="phone" placeholder="Telefone*">
                        </div>
                    </div>

                    <div class="d-md-flex">

                        <div class="form-group">
                            <input type="text" class="form-control" name="cep" placeholder="CEP*">
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" name="endereco" placeholder="Endereço*">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" name="bairro" placeholder="Bairro*">
                        </div>

                    </div>

                    <div class="d-md-flex">

                        <div class="form-group">
                            <input type="text" class="form-control" name="cidade" placeholder="Cidade*">
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" name="estado" placeholder="Estado*">
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" name="numero" placeholder="Número*">
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
</section>
@endsection
