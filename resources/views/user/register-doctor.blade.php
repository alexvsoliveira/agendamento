@extends('master')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter imgmb-5" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container" id="formulario_doutor">
        <div class="row">
            <div class="col-md-12 py-5 pr-md-5">
                <div class="heading-section heading-section-white ftco-animate mb-5">
                    <span class="subheading">Cadastro de Profissionais</span>
                    <h2 class="mb-4">Dados pessoais</h2>
                    <p>Campos com (*) são obrigatórios</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="appointment-form ftco-animate">
                    @csrf
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nome completo*">
                            <input type="hidden" name="type" value="doctor">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="email" name="email" :value="old('email')" required class="form-control" placeholder="E-mail*">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="password" name="password" name="password" required class="form-control" placeholder="Senha*">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" name="password_confirmation" required class="form-control" placeholder="Confirme a senha*">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" name="cpf" class="form-control" required placeholder="CPF*">
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="form-field">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="special_id" id="" class="form-control">
                                        <option value="">Especialidade medica*</option>
                                        @foreach($specials as $special)
                                        <option value="{{$special->id}}">{{$special->title}}</option>
                                        @endforeach
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
                                    <select name="sexo" id="" class="form-control">
                                        <option value="">Sexo*</option>
                                        <option value="f">Feminino</option>
                                        <option value="m">Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" name="crm" class="form-control" placeholder="CRM/CRO*">
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" name="dt_nasc" class="form-control appointment_date" placeholder="Data de nascimento*">
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text"name="phone" class="form-control" placeholder="Telefone*">
                        </div>
                    </div>

                    <div class="d-md-flex">

                        <div class="form-group">
                            <input type="text" name="cep" class="form-control" placeholder="CEP*">
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço*">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" name="bairro" class="form-control" placeholder="Bairro*">
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
