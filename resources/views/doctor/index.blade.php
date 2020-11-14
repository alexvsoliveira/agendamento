@extends('master')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container pt-3 pb-3">
        <div class="heading-section heading-section-white wow fadeIn mb-5 text-center">
            <h2 class="mb-4">Olá, Dr.</h2>
                        <span class="subheading">
                            <b>Ultimo acesso as xx:xx</b>
                        </span>
                        <br>
            <span class="subheading">Bem-vindo a Área do Profissional, onde você poderá ver suas consultas agendadas, e agendar novas consultas.
            Todo nosso relacionamento poderá ser feito de maneira fácil e rápida por aqui.</span>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt" id="">
    <div class="container-fluid mt-5" id="">
        <h2>Suas consultas marcadas</h2>
        <div id='doutor-agendamentos'></div>
            <table border="1px">
                <?php
                    $dados = array( "Arthur" => "20/12/2020", "Alex" => "21/12/2020");
                    foreach($dados as $nome => $data) { ?>
                     <tr>
                        <th><?php echo $nome; ?></th>
                        <td><?php echo $data; ?></td>
                    </tr>
                <?php } ?>
            </table>
        
    </div>
</section>

@endsection
