@extends('master')
@section('content')
<input type="hidden" value="{{URL::to('/')}}" id="url_base">
<input type="hidden" value='{{json_encode($schedulings)}}' id="schedulings">
<div class="modal" id="confirmar_agendamento" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendamento <br><span class="start"></span> até <span class="end"></span><br><br>Endereço: <span class="office"></span> - <span class="address"></span><br></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class='name'></h3>
                <h4 class='subject'></h4>
                <p class='description'></p>
                <!-- <a class="btn btn-secondary confirmAgendamentoBt">Cancelar Agendamento</a> -->
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container pt-3 pb-3">
        <div class="heading-section heading-section-white wow fadeIn  text-center">
            <h2 class="mb-4">Olá, {{Auth::user()->name}}</h2>
            <span class="subheading">Seus agendamentos</span>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt" id="">
    <div class="container-fluid mt-5" id="">
        <div id='paciente-agendamentos'></div>
    </div>
</section>
@endsection
