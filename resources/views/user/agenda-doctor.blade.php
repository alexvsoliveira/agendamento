@extends('master')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container pt-5 pb-3">
        <div class="heading-section heading-section-white wow fadeIn mb-5 text-center">
            <h2 class="mb-4">Olá, Dr. {{Auth::user()->name}}</h2>
            <span class="subheading">
            </span>
            <br>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Hospital
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Dia da Semana
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Horario Inicial
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Horario Final
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            -
                        </th>
                        <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($hours as $hour)
                    <tr>
                        <td class="col-lg-2 col-md-2">
                            <h5>{{\App\Models\Offices::where('id', $hour->office_id)->first()->name}}</h5>
                        </td>
                        <td class="col-lg-2 col-md-2">
                            <h5>{{$hour->weekday}}</h5>
                        </td>
                        <td class="col-lg-2 col-md-2">
                            <h5>{{$hour->start}}</h5>
                        </td>
                        <td class="col-lg-2 col-md-2">
                            <h5>{{$hour->end}}</h5>
                        </td>

                        <td class="col-lg-2 col-md-2">
                            <a href="">Editar</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <span class="subheading">Bem-vindo a Área do Profissional, onde você poderá configura os horarios disponiveis na semana da sua agenda.
                Todo nosso relacionamento poderá ser feito de maneira fácil e rápida por aqui. <br><br>
                Para cadastrar seus horários selecione abaixo a unidade hospitalar que deseja trabalhar. <br><br>
            </span>
            <!-- Formulario de localidade -->
            <form method="POST" action="{{ route('storeAgenda', Auth::user()->id) }}">
                <div class="localidade">
                    <div class="row mx-auto">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select id="doutor_localidade" name="doutor_localidade" class="form-control">
                                            <option value="">Unidade Hospitalar*</option>
                                            @foreach($offices as $office)
                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="form_agendar_doutor" class="appointment-form">
                    @csrf
                    <div class="hidden dados-agendamento">
                        <br><br>
                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Segunda" readonly value="Segunda" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[0]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Terça" readonly value="Terça" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[1]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Quarta" readonly value="Quarta" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[2]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Quinta" readonly value="Quinta" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[3]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Sexta" readonly value="Sexta" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[4]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Sábado" readonly value="Sábado" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[5]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control" placeholder="Domingo" readonly value="Domingo" name="weekday[]">
                                        <span class="error error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_start[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mx-auto">
                                <h4>Até</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <div class="form-group">
                                    <select class="agendar_horario_doutor" name="hours_end[]">
                                        <option value="8">08:00</option>
                                        <option value="9">09:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option selected value="18">18:00</option>
                                    </select>
                                    <span class="error error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mx-auto">
                                <input type="checkbox" name="off[6]" value="1">
                                <label for="scales">Dia Off</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="button" class="btn btn-secondary px-4 buscar">Agendar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection
