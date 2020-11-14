//Efeito wow ao rolar o site
new WOW().init();

$('#agendar_horario_doutor').multiselect({
          nonSelectedText: 'Selecionar horários*',
           includeSelectAllOption: true,
           selectAllName: 'Todos horários',
           allSelectedText: 'Todos horários',
           nSelectedText: 'horários',
           buttonWidth: '100%',
           buttonClass: 'form-control',
           selectAllText: 'Selecionar todos'
       });

       $('#example-selectAll-visible').on('click', function() {
           $('#example-selectAll').multiselect('selectAll', true);
       });
       $('#example-selectAll-all').on('click', function() {
           $('#example-selectAll').multiselect('selectAll', false);
       });

$('.closeActual').click(function(event) {
  $('.modal').modal('hide');
});

//Config do calendario
// document.addEventListener('DOMContentLoaded', function () {
  //Calendario para agendamento do paciente
// 	var c1 = document.getElementById('paciente-agendar');
// 	var paciente_agendar = new FullCalendar.Calendar(c1, {
//     editable: true,
// 		initialView: 'timeGridWeek',
// 		allDaySlot: false,
// 		selectable: true,
// 		height: 400,
//     events: [
//         {
//           title: 'Consulta',
//           start: '2020-10-29T10:00:00',
//           end: '2020-10-29T10:15:00'
//         }
//       ],
// 		dateClick: function (info) {
// 			//Quando clicar na data
// 			alert('Clicked on: ' + info.dateStr);
// 		}
// 	});
// 	paciente_agendar.setOption('locale', 'pt-br');
// 	paciente_agendar.render();
// });

document.addEventListener('DOMContentLoaded', function () {
  //Calendario para meus agendamentos do paciente
  var c2 = document.getElementById('paciente-agendamentos');
  var paciente_meus_agendamentos = new FullCalendar.Calendar(c2, {
    editable: true,
    height: 350,
    initialView: 'listWeek',
    events: [
        {
          title: 'Consulta 1',
          start: '2020-10-29T10:00:00',
          end: '2020-10-29T16:00:00'
        },
        {
          title: 'Consulta 2',
          start: '2020-10-28T12:00:00',
          end: '2020-10-28T16:00:00'
        },
        {
          title: 'Consulta 3',
          start: '2020-11-12T15:00:00',
          end: '2020-11-12T16:00:00'
        }
      ],
      eventClick: function(info) {
   alert('Event: ' + info.event.title);

   // change the border color just for fun
   info.el.style.borderColor = 'red';
 }
  });
  paciente_meus_agendamentos.setOption('locale', 'pt-br');
  paciente_meus_agendamentos.render();
});

document.addEventListener('DOMContentLoaded', function () {
  //Calendario para meus agendamentos do doutor
  var c2 = document.getElementById('doutor-agendamentos');
  var doutor_meus_agendamentos = new FullCalendar.Calendar(c2, {
    editable: true,
    height: 350,
    initialView: 'listWeek',
    events: [
        {
          title: 'Consulta 1',
          start: '2020-10-29T10:00:00',
          end: '2020-10-29T16:00:00'
        },
        {
          title: 'Consulta 2',
          start: '2020-10-28T12:00:00',
          end: '2020-10-28T16:00:00'
        },
        {
          title: 'Consulta 3',
          start: '2020-10-30T15:00:00',
          end: '2020-10-30T16:00:00'
        }
      ]
  });
  doutor_meus_agendamentos.setOption('locale', 'pt-br');
  doutor_meus_agendamentos.render();
});

// document.addEventListener('DOMContentLoaded', function () {
//   //Calendario para agenda do doutor
// 	var c1 = document.getElementById('doutor-agendar');
// 	var doutor_agendar = new FullCalendar.Calendar(c1, {
//     editable: true,
// 		initialView: 'timeGridWeek',
// 		allDaySlot: false,
// 		selectable: true,
// 		height: 400,
//     events: [
//         {
//           title: 'Consulta',
//           start: '2020-10-29T10:00:00',
//           end: '2020-10-29T10:15:00'
//         }
//       ],
// 		dateClick: function (info) {
// 			//Quando clicar na data
// 			alert('Clicked on: ' + info.dateStr);
// 		}
// 	});
// 	doutor_agendar.setOption('locale', 'pt-br');
// 	doutor_agendar.render();
// });

//Busca endereço pelo CEP
function limpa_formulário_cep() {
	// Limpa valores do formulário de cep.
	$("#paciente_endereco").val("");
	$("#paciente_bairro").val("");
	$("#paciente_cidade").val("");
	$("#paciente_uf").val("");
}

//Quando o campo cep perde o foco.
$("#paciente_cep").blur(function () {

	//Nova variável "cep" somente com dígitos.
	var cep = $(this).val().replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Expressão regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if (validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			$("#paciente_endereco").val("...");
			$("#paciente_bairro").val("...");
			$("#paciente_cidade").val("...");
			$("#paciente_uf").val("...");

			//Consulta o webservice viacep.com.br/
			$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

				if (!("erro" in dados)) {
					//Atualiza os campos com os valores da consulta.
					$("#paciente_endereco").val(dados.logradouro);
					$("#paciente_bairro").val(dados.bairro);
					$("#paciente_cidade").val(dados.localidade);
					$("#paciente_uf").val(dados.uf);
				} //end if.
				else {
					//CEP pesquisado não foi encontrado.
					limpa_formulário_cep();
					alert("CEP não encontrado.");
				}
			});
		} //end if.
		else {
			//cep é inválido.
			limpa_formulário_cep();
			alert("Formato de CEP inválido.");
		}
	} //end if.
	else {
		//cep sem valor, limpa formulário.
		limpa_formulário_cep();
	}
});

// Mostra o calendário quanto clicar em Agendar
$(".agendar").click(function () {
	$('#resultados-paciente-busca').hide();
	$('#resultados-paciente-agendamento').removeClass('hidden');
	$('#resultados-paciente-agendamento').addClass('shower');
});

//Esconde ou mostra o formulário de login/cadastro de Doutor/Paciente
$(".show-doutor").click(function () {
	$('#section-counter .container').hide();
	$('#formulario_doutor').show();
});

$(".show-paciente").click(function () {
	$('#section-counter .container').hide();
	$('#formulario_paciente').show();
});

$("#show_loginPaciente").click(function () {
	$('#section-counter .container').hide();
	$('#login_paciente').show();
});

$("#show_loginDoutor").click(function () {
	$('#section-counter .container').hide();
	$('#login_doutor').show();
});
