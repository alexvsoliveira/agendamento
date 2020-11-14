$(document).ready(function () {
	// Methodos Adicionais - by: Gaby Ribeiro

	//Validador de senha
	$.validator.addMethod("pwcheck", function (value) {
		return (

			/[A-Za-z0-9!@#\$\^\&*\)\(+=._-]+$/.test(value) && //only valids
			/[A-Za-z0-9!@#\$\^\&*\)\(+=._-]*[0-9][A-Za-z0-9!@#\$\^\&*\)\(+=._-]*$/.test(value) && //has numbers
			/[A-Za-z0-9!@#\$\^\&*\)\(+=._-]*[A-Za-z][A-Za-z0-9!@#\$\^\&*\)\(+=._-]*$/.test(value) //has lettes
			//[A-Za-z0-9!@#\$\^\&*\)\(+=._-]*[!@#\$\^\&*\)\(+=._-][A-Za-z0-9!@#\$\^\&*\)\(+=._-]*$/.test(value) //has specials
		);
	});

	// Ano invalido
	$.validator.addMethod("anoMin", function (value, element) {
		var data = value;
		var ano = data.substr(6, 4);

		if (ano < 1901) {
			return false;
		}

		return true;
	}, "Informe uma data válida");

	// Idade minima
	$.validator.addMethod("minAge", function (value, element, min) {
		var today = new Date();
		var array_data = value.split("/");
		var birthDate = new Date(array_data[1] + "/" + array_data[0] + "/" + array_data[2]);
		var age = today.getFullYear() - birthDate.getFullYear();
		if (age > min + 1) {
			return true;
		}
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
			age--;
		}
		return age >= min;
	}, "Apenas para maiores de 18 anos.");

	// Formato de data BR
	$.validator.addMethod("dateBR", function (value, element) {
		if (value.length != 10)
			return this.optional(element) || false;
		var data = value;
		var dia = data.substr(0, 2);
		var barra1 = data.substr(2, 1);
		var mes = data.substr(3, 2);
		var barra2 = data.substr(5, 1);
		var ano = data.substr(6, 4);
		if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) {
			return this.optional(element) || false;
		}
		if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) {
			return this.optional(element) || false;
		}
		if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 !== 0))) {
			return this.optional(element) || false;
		}
		if (ano < 1900) {
			return this.optional(element) || false;
		}
		if (ano < 1900) return (this.optional(element) || false);
		return this.optional(element) || true;
	}, "Informe uma data válida");

	//Validar email
	$.validator.addMethod(
		"verEmail",
		function (value, element) {
			return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
		},
		"E-mail invalido"
	);

	// Validador de CPF
	$.validator.addMethod(
		"cpf",
		function (value, element) {
			value = jQuery.trim(value);

			value = value.replace(".", "");
			value = value.replace(".", "");
			cpf = value.replace("-", "");
			while (cpf.length < 11) cpf = "0" + cpf;
			var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
			var a = [];
			var b = new Number();
			var c = 11;
			for (i = 0; i < 11; i++) {
				a[i] = cpf.charAt(i);
				if (i < 9) b += a[i] * --c;
			}
			if ((x = b % 11) < 2) {
				a[9] = 0;
			} else {
				a[9] = 11 - x;
			}
			b = 0;
			c = 11;
			for (y = 0; y < 10; y++) b += a[y] * c--;
			if ((x = b % 11) < 2) {
				a[10] = 0;
			} else {
				a[10] = 11 - x;
			}

			var retorno = true;
			if (cpf.charAt(9) != a[9] || cpf.charAt(10) != a[10] || cpf.match(expReg)) retorno = false;

			return this.optional(element) || retorno;
		},
		"Informe um CPF válido."
	); // Mensagem padrao

	// Validador de CNPJ
	$.validator.addMethod(
		"cnpj",
		function (cnpj, element) {
			cnpj = jQuery.trim(cnpj);

			// DEIXA APENAS OS NUMEROS
			cnpj = cnpj.replace("/", "");
			cnpj = cnpj.replace(".", "");
			cnpj = cnpj.replace(".", "");
			cnpj = cnpj.replace("-", "");

			var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
			digitos_iguais = 1;

			if (cnpj.length < 14 && cnpj.length < 15) {
				return this.optional(element) || false;
			}
			for (i = 0; i < cnpj.length - 1; i++) {
				if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
					digitos_iguais = 0;
					break;
				}
			}

			if (!digitos_iguais) {
				tamanho = cnpj.length - 2;
				numeros = cnpj.substring(0, tamanho);
				digitos = cnpj.substring(tamanho);
				soma = 0;
				pos = tamanho - 7;

				for (i = tamanho; i >= 1; i--) {
					soma += numeros.charAt(tamanho - i) * pos--;
					if (pos < 2) {
						pos = 9;
					}
				}
				resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
				if (resultado != digitos.charAt(0)) {
					return this.optional(element) || false;
				}
				tamanho = tamanho + 1;
				numeros = cnpj.substring(0, tamanho);
				soma = 0;
				pos = tamanho - 7;
				for (i = tamanho; i >= 1; i--) {
					soma += numeros.charAt(tamanho - i) * pos--;
					if (pos < 2) {
						pos = 9;
					}
				}
				resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
				if (resultado != digitos.charAt(1)) {
					return this.optional(element) || false;
				}
				return this.optional(element) || true;
			} else {
				return this.optional(element) || false;
			}
		},
		"Informe um CNPJ válido."
	); // Mensagem padrão

	// Validação telefone
	$.validator.addMethod("telefone", function (value, element, param) {
		var sOper = "11|12|13|14|15|16|17|18|19|21|22|24|27|28|91|92|93|94|95|96|97|98|99|31|32|33|34|35|37|38|71|73|74|75|77|79|81|82|83|84|85|86|87|88|89|41|42|43|44|45|46|47|48|49|51|53|54|55|61|62|63|64|65|66|67|68|69";
		var bRet = false;
		var valor = value.replace(/[^\d]+/g, '');
		var sDDD = valor.substr(0, 2);
		if (valor !== "" && sOper.indexOf(sDDD) >= 0) {
			if (param === "" || param == undefined) param = 'GERAL';
			param = param.toUpperCase();
			//VALIDA A LARGURA
			if (valor.length === 10 && (param === 'GERAL' || param === 'FIXO')) {
				//TELEFONE FIXO
				bRet = (valor.substr(2, 1) != "9" && valor.substr(2, 1) != "8") && !valor.match(/^(\d)\1{9}/g)
			} else {
				if (valor.length == 11 && (param === 'GERAL' || param === 'CELULAR')) {
					//TELEFONE CELULAR
					bRet = (valor.substr(2, 1) == "9") && !valor.match(/^(\d)\1{10}/g);
				}
			}
		}
		return this.optional(element) || bRet;
	}, "Telefone incorreto");

	// notEqual
	$.validator.addMethod("notEqual", function (value, element, param) {
		return this.optional(element) || !$.validator.methods.equalTo.call(this, value, element, param);
	}, "Os telefones devem ser diferentes");

	// Validação dos formularios
	var val_CadastroIniciado = "";

	// Form cadastro paciente
	var validator = $("#form_paciente").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			paciente_nome: {
				required: true,
				minlength: 3
			},
			paciente_cpf: {
				required: true,
				minlength: 11,
				cpf: true
			},
			paciente_convenio: {
				required: true
			},
			paciente_sexo: {
				required: true
			},
			paciente_dtNasc: {
				required: true,
				dateBR: true,
				minlength: 8,
				minAge: 14,
				anoMin: true
			},
			paciente_tel: {
				required: true,
				minlength: 10,
				telefone: "GERAL"
			},
			paciente_cep: {
				required: true,
				minlength: 8
			},
			paciente_endereco: {
				required: true,
				minlength: 3
			},
			paciente_bairro: {
				required: true,
				minlength: 3
			},
			paciente_cidade: {
				required: true,
				minlength: 3
			},
			paciente_uf: {
				required: true
			},
			paciente_numero: {
				required: true,
				minlength: 1
			}
		},
		messages: {
			paciente_nome: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			paciente_cpf: {
				required: "Campo obrigatório",
				minlength: "Minímo 11 caracteres",
				cpf: "CPF Inválido"
			},
			paciente_convenio: {
				required: "Campo obrigatório"
			},
			paciente_sexo: {
				required: "Campo obrigatório"
			},
			paciente_dtNasc: {
				required: "Campo obrigatório",
				dateBR: "Data inválida",
				minlength: "Minímo 8 caracteres",
				minAge: "Apenas maiores de 14 anos",
				anoMin: "Data inválida"
			},
			paciente_tel: {
				required: "Campo obrigatório",
				minlength: "Minímo 10 digítos",
				telefone: "Telefone inválido"
			},
			paciente_cep: {
				required: "Campo obrigatório",
				minlength: "Minímo 8 caracteres"
			},
			paciente_endereco: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			paciente_bairro: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			paciente_cidade: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			paciente_uf: {
				required: "Campo obrigatório"
			},
			paciente_numero: {
				required: "Campo obrigatório",
				minlength: "Número inválido"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			alert('pronto');
		},
	});

	// Form cadastro doutor
	var validator = $("#form_doutor").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			doutor_nome: {
				required: true,
				minlength: 3
			},
			doutor_cpf: {
				required: true,
				minlength: 11,
				cpf: true
			},
			doutor_especialidade: {
				required: true
			},
			doutor_doc: {
				required: true
			},
			doutor_sexo: {
				required: true
			},
			doutor_dtNasc: {
				required: true,
				dateBR: true,
				minlength: 8,
				minAge: 14,
				anoMin: true
			},
			doutor_tel: {
				required: true,
				minlength: 10,
				telefone: "GERAL"
			},
			doutor_cep: {
				required: true,
				minlength: 8
			},
			doutor_endereco: {
				required: true,
				minlength: 3
			},
			doutor_bairro: {
				required: true,
				minlength: 3
			},
			doutor_cidade: {
				required: true,
				minlength: 3
			},
			doutor_uf: {
				required: true
			},
			doutor_numero: {
				required: true,
				minlength: 1
			}
		},
		messages: {
			doutor_nome: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			doutor_cpf: {
				required: "Campo obrigatório",
				minlength: "Minímo 11 caracteres",
				cpf: "CPF Inválido"
			},
			doutor_especialidade: {
				required: "Campo obrigatório"
			},
			doutor_doc: {
				required: "Campo obrigatório"
			},
			doutor_sexo: {
				required: "Campo obrigatório"
			},
			doutor_dtNasc: {
				required: "Campo obrigatório",
				dateBR: "Data inválida",
				minlength: "Minímo 8 caracteres",
				minAge: "Apenas maiores de 14 anos",
				anoMin: "Data inválida"
			},
			doutor_tel: {
				required: "Campo obrigatório",
				minlength: "Minímo 10 digítos",
				telefone: "Telefone inválido"
			},
			doutor_cep: {
				required: "Campo obrigatório",
				minlength: "Minímo 8 caracteres"
			},
			doutor_endereco: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			doutor_bairro: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			doutor_cidade: {
				required: "Campo obrigatório",
				minlength: "Minímo 3 caracteres"
			},
			doutor_uf: {
				required: "Campo obrigatório"
			},
			doutor_numero: {
				required: "Campo obrigatório",
				minlength: "Número inválido"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			alert('pronto');
		},
	});

	// Form login paciente
	var validator = $("#form_loginPaciente").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			paciente_loginCPF: {
				required: true,
				minlength: 11,
				cpf: true
			},
			paciente_loginSenha: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			paciente_loginCPF: {
				required: "Campo obrigatório",
				minlength: "Minímo 11 caracteres",
				cpf: "CPF Inválido"
			},
			paciente_loginSenha: {
				required: "Campo obrigatório",
				minlength: "Minímo 8 caracteres"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			window.location.href = "paciente.php";
		},
	});
	// Form login Doutor
	var validator = $("#form_loginDoutor").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			doutor_loginDoc: {
				required: true
			},
			doutor_loginSenha: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			doutor_loginDoc: {
				required: "Campo obrigatório"
			},
			doutor_loginSenha: {
				required: "Campo obrigatório",
				minlength: "Minímo 8 caracteres"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			window.location.href = "doutor.php";
		},
	});

	// Form login Doutor
	var validator = $("#form_esqueci").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			esqueci_cpf: {
				required: true,
				cpf: true
			},
			esqueci_dtNasc: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			esqueci_cpf: {
				required: "Campo obrigatório",
				cpf: true
			},
			esqueci_dtNasc: {
				required: "Campo obrigatório",
				minlength: "Minímo 8 caracteres"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			alert('pronto');
		},
	});

	// Form Buscar Doutor
	var validator = $("#form_busca_paciente").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			busca_especialidade: {
				required: true
			},
			busca_dtConsulta: {
				required: true
			},
			busca_horario_paciente: {
				required: true
			},
			busca_ordenacao_paciente: {
				required: true
			}
		},
		messages: {
			busca_especialidade: {
				required: "Campo obrigatório"
			},
			busca_dtConsulta: {
				required: "Campo obrigatório"
			},
			busca_horario_paciente: {
				required: "Campo obrigatório"
			},
			busca_ordenacao_paciente: {
				required: "Campo obrigatório"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			// Mostra os resultados das buscas
			$(".buscar").click(function () {
				$('#resultados-paciente-busca').show();
			});
		},
	});

	// Form Localidade Doutor
	var validator = $("#form_localidade").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			doutor_localidade: {
				required: true
			}
		},
		messages: {
			doutor_localidade: {
				required: "Campo obrigatório"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			$(".localidade button").click(function () {
				$('.dados-agendamento').show();
			});
		},
	});

	// Form Agendar Doutor
	var validator = $("#form_agendar_doutor").validate({
		onkeyup: false,
		ignore: [],
		onfocusout: function (element) {
			$(element).valid();
		},
		rules: {
			agendar_doutor_dtConsulta: {
				required: true
			},
			agendar_horario_doutor: {
				required: true
			}
		},
		messages: {
			agendar_doutor_dtConsulta: {
				required: "Campo obrigatório"
			},
			agendar_horario_doutor: {
				required: "Campo obrigatório"
			}
		},
		errorPlacement: function (error, element) {
			if (element.is(":radio")) error.appendTo(element.parent());
			else if (element.is(":checkbox")) error.appendTo(element.parent());
			else error.insertAfter(element.next());
		},
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("span.error").show();
				$("span.error").css({
					width: "100%!important"
				});
			}
		},
		success: function (label, element) {
			// set   as text for IE
			if (val_CadastroIniciado == "") {
				val_CadastroIniciado = "0"; //GravarGA('CadastroPessoal', 'iniciado');
			}
			label.html(" ").addClass("checked");
			$(element).removeClass("error-input");
		},
		highlight: function (element, errorClass) {
			$(element)
				.parent()
				.find("." + errorClass)
				.removeClass("checked");
			$(element).addClass("error-input");
		},
		submitHandler: function (form) {
			$('#confirmar_agendamento').modal();
		},
	});
});
