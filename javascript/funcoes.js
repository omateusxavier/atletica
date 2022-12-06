function ativ_categoria(id_ativcategoria){
	
	//Definindo caminho da URL para o metodo
	var url = '../Atividade/listar_ativ_categoriaJSON/' + id_ativcategoria; 	

	//Limpa container das atividades
	$('#box_atividades').empty();
	
	$('#box_atividades').append("<div class='center' style='margin-top:40px;'><div class='preloader-wrapper big active'>" +
								"<div class='spinner-layer spinner-blue-only'>" +
								  "<div class='circle-clipper left'>" +
									"<div class='circle'></div>" +
								  "</div><div class='gap-patch'>" +
									"<div class='circle'></div>" +
								  "</div><div class='circle-clipper right'>" +
									"<div class='circle'></div>" +
								  "</div>" +
								"</div>" +
							  "</div><br/>Aguarde, carregando...</div>");

	$.getJSON(url, function(data, status){
	
		//Limpa container das atividades
		$('#box_atividades').empty();
	
		//Se Requisição JSON executada com SUCESSO
		if(status == 'success'){

			//Se houver resultados na consulta
			if(data.atividades.length > 0){
				
				var atividades = "<ul class='collapsible' data-collapsible='accordion'>";
				
				var txtResumo = "";
				var txtHoraAtv = "";
				var txtCargaHoraria = "";
				var txtLocal = "";
				var txtPalestrante = "";
				var icone = "";
				
				for(var i = 0; i < data.atividades.length; i++){
				
					//Trata o campo resumo
					if(data.atividades[i].resumo == ""){
						txtResumo = "Nenhuma informação";
					}
					else{
						txtResumo = data.atividades[i].resumo;
					}
					
					//Trata o campo Palestrante
					if(data.atividades[i].palestrante == ""){
						txtPalestrante = "";
					}
					else{
						txtPalestrante = "<br/><strong>Palestrante:</strong><br/>" + data.atividades[i].palestrante;
					}
					
					//Trata o campo Local
					if(data.atividades[i].local == ""){
						txtLocal = "";
					}
					else{
						txtLocal = "<br/><strong>Local:</strong><br/>" + data.atividades[i].local;
					}
					
					//Trata o campo Hora da atividade
					if(data.atividades[i].hora_atividade == null){
						txtHoraAtv = "";
					}
					else{
						txtHoraAtv = " - " + data.atividades[i].hora_atividade + "h";
					}
					
					//Trata o campo Carga Horaria
					if(data.atividades[i].carga_horaria == null || data.atividades[i].carga_horaria == 0){
						txtCargaHoraria = "";
					}
					else{
						txtCargaHoraria = "<br/><strong>Carga Horária:</strong><br/>" + data.atividades[i].carga_horaria;
					}
					
					//Trata botao de inscrição, se candidato já inscrito, desabilita botao
					if(data.atividades[i].ja_inscrito == true){
						botao_inscricao = "<a class='btn right waves-effect tooltipped disabled' data-position='top' data-delay='50' data-tooltip='Você já está inscrito nesta atividade'><i class='material-icons'>done</i></a>";
						icone = "<i class='material-icons green white-text circle tooltipped' style='width:42px; margin-top:5px; font-size:18px;' data-position='top' data-delay='50' data-tooltip='Você já está inscrito nesta atividade'>done</i>";
					}
					else{
						botao_inscricao = "<a href='../InscricaoAtiv/confirmacao/" + data.atividades[i].id_atividade + "' class='btn right green darken-1 waves-effect tooltipped' data-position='top' data-delay='50' data-tooltip='Inscrever-me'><i class='material-icons'>input</i></a>";
						icone = "<i class='material-icons blue white-text circle' style='width:42px; margin-top:5px; font-size:18px;'>create</i>";
					}
				
					atividades = atividades + "<li>" +
							"<div class='collapsible-header waves-effect' style='border-bottom:1px solid #eeeeee;'><div class='left'>" + icone + "</div><div><strong style='font-size:17px;'><strong class='blue-text'>" + data.atividades[i].nome_categoria + ":</strong> " + data.atividades[i].descricao + "</strong><i class='material-icons right'>expand_more</i> <div style='margin-top:-18px; font-size:14px;'><i class='material-icons' style='font-size:18px; margin:0px; margin-left:-5px;'>schedule</i>" + data.atividades[i].data_inicio + txtHoraAtv + " </div></div></div>" +
							"<div class='collapsible-body' style='font-size:14px;'>" +
								"<div class='row' style='padding:10px 10px 0px 10px;'><div class='col s12 m6 l6'><strong>Resumo:</strong><br/>" + txtResumo + "</div> <div class='col s12 m4 l4'><strong>Inscrições de:</strong><br/>" + data.atividades[i].insc_inicio + " à " + data.atividades[i].insc_final + txtCargaHoraria + txtPalestrante + txtLocal + "</div><div class='col s12 m2 l2'>" + botao_inscricao + "</div></div>" +
							"</div>" +
						"</li>";
				
				}
				
				atividades = atividades + "</ul>";
				
				//Insere conteudo no box de atividades
				$('#box_atividades').append(atividades);
				
				//Inicia Objeto Materialize
				$('.collapsible').collapsible();
				$('.tooltipped').tooltip({delay: 50});
				
			}
			else{
				$('#box_atividades').append("<div class='center' style='margin-top:50px;'>Não existem registros para a categoria selecionada <br/> ou <br/> Nenhuma atividade disponivel para inscrição.</div>");
			}
		
		}
		else{
			$('#box_atividades').append("Não foi possivel obter resultados...");
		}
	
	});
	
}//Fim da função listar atividades por categoria


function apagar_inscritos(id_concurso){
	
	swal({
		title: "Confirmação",
		text: "Tem certeza que deseja Apagar todas as Inscrições do Concurso? \n\n ATENÇÃO: Esse processo é irreversivel.",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#09C',
		confirmButtonText: 'Sim',
		closeOnConfirm: false,
		cancelButtonText: 'Não'
	
	},
	//Se o usuário clicou em sim, executa a função
	function(){
		location.href = "../limpar_inscricoes/" + id_concurso;
	});

}

function cancelar_inscricao(id_vestibular, id_inscricao){
	
	swal({
		title: "Confirmação",
		text: "Tem certeza que deseja Cancelar a Inscrição selecionada?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#09C',
		confirmButtonText: 'Sim',
		closeOnConfirm: false,
		cancelButtonText: 'Não'
	
	},
	//Se o usuário clicou em sim, executa a função
	function(){
		location.href = "../../Inscricao/cancelar_inscricao/" + id_vestibular + "/" + id_inscricao;
	});

}

function excluir_inscricao(id_vestibular, id_inscricao){
	
	swal({
		title: "Confirmação",
		text: "Tem certeza que deseja Excluir a Inscrição selecionada? \n\n ATENÇÃO: Este é processo é irreversivel!!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#09C',
		confirmButtonText: 'Sim',
		closeOnConfirm: false,
		cancelButtonText: 'Não'
	
	},
	//Se o usuário clicou em sim, executa a função
	function(){
		location.href = "../../Inscricao/excluir_inscricao/" + id_vestibular + "/" + id_inscricao;
	});

}

function confirma_inscricao(id_vestibular, id_inscricao){
	
	swal({
		title: "Confirmação",
		text: "Confirma a Inscrição do candidato selecionado?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#09C',
		confirmButtonText: 'Sim',
		closeOnConfirm: false,
		cancelButtonText: 'Não'
	
	},
	//Se o usuário clicou em sim, executa a função
	function(){
		location.href = "../../Inscricao/confirma_inscricao/" + id_vestibular + "/" + id_inscricao;
	});

}

function excluir_usuario(id_usuario){
	
	swal({
		title: "Confirmação",
		text: "Tem certeza que deseja Excluir o Usuário selecionado?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#09C',
		confirmButtonText: 'Sim',
		closeOnConfirm: false,
		cancelButtonText: 'Não'
	
	},
	//Se o usuário clicou em sim, executa a função
	function(){
		location.href = "../Usuario/excluir/" + id_usuario;
	});

}
