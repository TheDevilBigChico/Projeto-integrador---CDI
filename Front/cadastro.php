
<?php
// Este é um arquivo PHP básico que contém o mesmo conteúdo HTML
// Para adicionar funcionalidades dinâmicas, você precisaria implementar lógica PHP adicional
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f5f0e5; /* Fundo creme */
            color: #333;
        }
        
        .calendar-day {
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .calendar-day:hover {
            background-color: #1d9bf0;
            color: white;
        }
        
        .calendar-day.selected {
            background-color: #1d9bf0;
            color: white;
            font-weight: bold;
        }
        
        .post {
            transition: all 0.3s ease;
        }
        
        .post-enter {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .post-enter-active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .post-exit {
            opacity: 1;
        }
        
        .post-exit-active {
            opacity: 0;
            transform: translateY(-20px);
        }
        
        .sidebar-item {
            transition: background-color 0.2s;
        }
        
        .sidebar-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        /* Barra de rolagem personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f5f0e5;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #d6cdb7;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #c2b89f;
        }
        
        /* Estilos para o seletor de mês/ano */
        .month-year-selector {
            position: absolute;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 16px;
            z-index: 10;
            width: 280px;
            display: none;
        }
        
        .month-grid, .year-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }
        
        .month-item, .year-item {
            padding: 8px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .month-item:hover, .year-item:hover {
            background-color: #e6f7ff;
        }
        
        .month-item.selected, .year-item.selected {
            background-color: #1d9bf0;
            color: white;
        }
        
        .selector-tabs {
            display: flex;
            margin-bottom: 12px;
            border-bottom: 1px solid #eee;
        }
        
        .selector-tab {
            flex: 1;
            text-align: center;
            padding: 8px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .selector-tab.active {
            border-bottom: 2px solid #1d9bf0;
            color: #1d9bf0;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex">
        <!-- Barra Lateral Esquerda -->
        <div class="w-64 border-r border-gray-300 flex flex-col h-screen sticky top-0">
            <!-- Perfil do Usuário -->
            <div class="p-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center overflow-hidden">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-bold text-lg">Nome de Usuário</p>
                    </div>
                </div>
            </div>
            
            <!-- Navegação -->
            <nav class="mb-4">
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">
                    <i class="fas fa-home mr-4"></i>
                    <span>Início</span>
                </a>
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">
                   
                    <span>Atividade Convencional</span>
                </a>
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">
                 
                    <span>Atividade Enfermagem</span>
                </a>
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">
                   
                    <span>Frequência</span>
                </a>
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">

                    <span>Encaminhamentos</span>
                </a>
                <a href="#" class="flex items-center p-3 text-xl sidebar-item rounded-full mx-2 mb-1">
                    
                    <span>Configurações</span>
                </a>
				    <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </button>
            </nav>
            
            
        </div>
        
        <!-- Conteúdo Principal -->
        <div class="flex-1 min-w-0">
            <!-- Cabeçalho -->
            <header class="sticky top-0 bg-cream/80 backdrop-blur-md z-10 border-b border-gray-300 bg-opacity-90" style="background-color: rgba(245, 240, 229, 0.9);">
                <div class="p-4">
                    <h1 class="text-xl font-bold">Cadastro</h1>
                </div>
                
 <form id="cadastroForm">
            <!-- Seção 1: Dados Gerais -->
            <div class="form-section bg-white border border-gray-200">
                <div class="form-header bg-blue-600 text-white">
                    <h2 class="text-base font-semibold">Dados Gerais</h2> 
                </div><br>
				
                <div class="form-grid">
                    <table style="width:95%" >
						<tr> 
							
							<td> <label for="matricula" class="block text-xs font-medium text-gray-700">Nº Matrícula </label>	</td>
										
							<td> <input type="text" id="matricula" name="matricula" class="w-full border border-gray-300 rounded-md focus:outline-none">	</td>
															
							<td> <label for="nome" class="block text-xs font-medium text-gray-700">Nome do Usuário</label>		</td>
										
							<td> <input type="text" id="nome" name="nome" class="w-full border border-gray-300 rounded-md focus:outline-none">		</td>
															
							<td> <label for="sexo" class="block text-xs font-medium text-gray-700">Sexo</label>	</td>
										
							<td> <select id="sexo" name="sexo" class="w-full border border-gray-300 rounded-md focus:outline-none">		
									<option value="">Selecione</option>		
									<option value="masculino">Masculino</option>		
									<option value="feminino">Feminino</option>		
									<option value="outro">Outro</option>		
								</select>		
							</td> 

	
						<tr> 
							<td> <label for="cor_raca" class="block text-xs font-medium text-gray-700">Cor/Raça</label>	</td> 
			
							<td> <select id="cor_raca" name="cor_raca" class="w-full border border-gray-300 rounded-md focus:outline-none">		
									<option value="">Selecione</option>		
									<option value="branca">Branca</option>		
									<option value="preta">Preta</option>		
									<option value="parda">Parda</option>		
									<option value="amarela">Amarela</option>		
									<option value="indigena">Indígena</option>		
								</select>	
								
							</td>
	                    		
								<td> <label for="nis" class="block text-xs font-medium text-gray-700">NIS</label> </td>
				
								<td> <input type="text" id="nis" name="nis" class="w-full border border-gray-300 rounded-md focus:outline-none"> </td>
									
								<td> <label for="data_nascimento" class="block text-xs font-medium text-gray-700">Data de Nascimento</label> </td>
				
								<td> <input type="date" id="data_nascimento" name="data_nascimento" class="w-full border border-gray-300 rounded-md focus:outline-none" onchange="calcularIdade()">		</td>
							</tr>	                    		

	
						<td> 
						
							<tr>
							
								<td> <label for="faixa_etaria" class="block text-xs font-medium text-gray-700">Faixa Etária</label></td>
							
								<td><select id="faixa_etaria" name="faixa_etaria" class="w-full border border-gray-300 rounded-md focus:outline-none">
									<option value="">Selecione</option>
									<option value="bebe">Bebê (0-2 anos)</option>
									<option value="crianca">Criança (3-11 anos)</option>
									<option value="adolescente">Adolescente (12-17 anos)</option>
									<option value="adulto">Adulto (18-59 anos)</option>
									<option value="idoso_60_64">Idoso (60 a 64 anos)</option>
									<option value="idoso_65_69">Idoso (65 a 69 anos)</option>
									<option value="idoso_70_74">Idoso (70 a 74 anos)</option>
									<option value="idoso_75_mais">Idoso (75 anos ou mais)</option>
									</select>
								</td>
								
								<td> <label for="idade" class="block text-xs font-medium text-gray-700">Idade</label></td>
	
								<td> <input type="text" id="idade" name="idade" class="w-full border border-gray-300 rounded-md focus:outline-none bg-gray-100" readonly></td>
       
								<td> <label for="data_matricula" class="block text-xs font-medium text-gray-700">Data da Matrícula no CDI</label> </td>
								
								<td> <input type="date" id="data_matricula" name="data_matricula" class="w-full border border-gray-300 rounded-md focus:outline-none"> </td>
	
								
							
							</tr>
							
							<tr>
							
								<td> <label for="status" class="block text-xs font-medium text-gray-700">Status</label> </td>
							
								<td> <select id="status" name="status" class="w-full border border-gray-300 rounded-md focus:outline-none">
										<option value="ativo">Ativo</option>
										<option value="desligado">Desligado</option>
									 </select>

								</td>
						
											
							   
							 <td>
								<div id="data_desligamento_container" class="hidden fade-in">
							  
									 <label for="data_desligamento" class="block text-xs font-medium text-gray-700">Data de Desligamento</label> </td>
								</div>
							</td>
							
							<td> 
								
								<div id="data_desligamento_container" class="hidden fade-in">
								
								<input type="date" id="data_desligamento" name="data_desligamento" class="w-full border border-gray-300 rounded-md focus:outline-none">
								</div>
									
							<td>
							
								<div id="motivo_desligamento_container" class="hidden fade-in col-span-2">
								
									<label for="motivo_desligamento" class="block text-xs font-medium text-gray-700">Motivo do Desligamento</label> 
								
									<td><textarea id="motivo_desligamento" name="motivo_desligamento" rows="1" class="w-full border border-gray-300 rounded-md focus:outline-none"></textarea></td>
								
								</div>
							</td>	
							   
							</tr>
					</table>
                    
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <!-- Seção 2: Dieta -->
                <div class="form-section bg-white border border-gray-200">
                    <div class="form-header bg-green-600 text-white">
                        <h2 class="text-base font-semibold">Dieta</h2>
                    </div>
                    <div class="compact-section">
                        <div class="grid grid-cols-1 gap-2">
                            <div>
                                <label for="lanche" class="block text-xs font-medium text-gray-700">LANCHE TIPO 2</label>
                                <select id="lanche" name="lanche" class="w-full border border-gray-300 rounded-md focus:outline-none">
                                    <option value="">Selecione</option>
                                    <option value="sim">Sim</option>
                                    <option value="nao">Não</option>
                                </select>
                            </div>
                          
                            
                            <div>
                                <label for="dieta_especial" class="block text-xs font-medium text-gray-700">DIETA ESPECIAL</label>
                                <select id="dieta_especial" name="dieta_especial" class="w-full border border-gray-300 rounded-md focus:outline-none">
                                    <option value="">Selecione</option>
                                    <option value="sim">Sim</option>
                                    <option value="nao">Não</option>
                                </select>
                            </div>
                            
                            <div id="dieta_especial_detalhes" class="hidden">
                                <label for="detalhes_dieta" class="block text-xs font-medium text-gray-700">Detalhes da Dieta</label>
                                <textarea id="detalhes_dieta" name="detalhes_dieta" rows="2" class="w-full border border-gray-300 rounded-md focus:outline-none"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Seção 3: Benefícios -->
                <div class="form-section bg-white border border-gray-200">
                    <div class="form-header bg-purple-600 text-white">
                        <h2 class="text-base font-semibold">Benefícios</h2>
                    </div>
                    <div class="compact-section">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="checkbox-item">
                                <input type="checkbox" id="nao_recebe" name="beneficios" value="nao_recebe" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="nao_recebe" class="text-xs text-gray-700">Não recebe</label>
                            </div>
                            
                            <div class="checkbox-item">
                                <input type="checkbox" id="renda_cidadao" name="beneficios" value="renda_cidadao" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="renda_cidadao" class="text-xs text-gray-700">RENDA CIDADÃO</label>
                            </div>
                            
                            <div class="checkbox-item">
                                <input type="checkbox" id="renda_minima" name="beneficios" value="renda_minima" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="renda_minima" class="text-xs text-gray-700">RENDA MÍNIMA</label>
                            </div>
                            
                            <div class="checkbox-item">
                                <input type="checkbox" id="bpc_idoso" name="beneficios" value="bpc_idoso" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="bpc_idoso" class="text-xs text-gray-700">BPC - IDOSO</label>
                            </div>
                            
                            <div class="checkbox-item">
                                <input type="checkbox" id="bolsa_familia" name="beneficios" value="bolsa_familia" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="bolsa_familia" class="text-xs text-gray-700">BOLSA FAMÍLIA</label>
                            </div>
                            
                            <div class="checkbox-item">
                                <input type="checkbox" id="aposentado" name="beneficios" value="aposentado" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="aposentado" class="text-xs text-gray-700">Aposentado/pensionista</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Seção 4: Formas de Acesso -->
            <div class="form-section bg-white border border-gray-200">
                <div class="form-header bg-amber-600 text-white">
                    <h2 class="text-base font-semibold">Formas de Acesso</h2>
                </div>
                <div class="compact-section">
                    <div class="form-grid-3 mb-2">
                        <div class="checkbox-item">
                            <input type="radio" id="encaminhado_cras" name="forma_acesso" value="encaminhado_cras" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="encaminhado_cras" class="text-xs text-gray-700">Encaminhado CRAS</label>
                        </div>
                        
                        <div class="checkbox-item">
                            <input type="radio" id="encaminhado_creas" name="forma_acesso" value="encaminhado_creas" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="encaminhado_creas" class="text-xs text-gray-700">Encaminhado CREAS</label>
                        </div>
                        
                        <div class="checkbox-item">
                            <input type="radio" id="demanda_espontanea" name="forma_acesso" value="demanda_espontanea" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="demanda_espontanea" class="text-xs text-gray-700">Demanda espontânea</label>
                        </div>
                        
                        <div class="checkbox-item col-span-3">
                            <input type="radio" id="encaminhado_outros" name="forma_acesso" value="encaminhado_outros" class="h-3 w-3 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="encaminhado_outros" class="text-xs text-gray-700">Encaminhado Outros</label>
                        </div>
                    </div>
                    
                    <div>
                        <label for="observacoes" class="block text-xs font-medium text-gray-700">Observações</label>
                        <textarea id="observacoes" name="observacoes" rows="1" class="w-full border border-gray-300 rounded-md focus:outline-none"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center mt-3 space-x-4">
                <button type="submit" class="px-4 py-1 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                    Salvar
                </button>
                <button type="reset" class="px-4 py-1 bg-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm">
                    Limpar
                </button>
            </div>
        </form>
    </div>

    <script>
        // Função para calcular idade com precisão de dias
        function calcularIdade() {
            const dataNascimento = document.getElementById('data_nascimento').value;
            
            if (dataNascimento) {
                const hoje = new Date();
                const nascimento = new Date(dataNascimento);
                
                // Cálculo preciso da idade
                let idade = hoje.getFullYear() - nascimento.getFullYear();
                
                // Verificar se ainda não chegou o aniversário este ano
                const mesAtual = hoje.getMonth();
                const diaAtual = hoje.getDate();
                const mesNascimento = nascimento.getMonth();
                const diaNascimento = nascimento.getDate();
                
                // Se o mês atual for menor que o mês de nascimento, ainda não fez aniversário este ano
                // Ou se estiver no mesmo mês, mas o dia atual for menor que o dia de nascimento
                if (mesAtual < mesNascimento || (mesAtual === mesNascimento && diaAtual < diaNascimento)) {
                    idade--;
                }
                
                document.getElementById('idade').value = idade;
                
                // Definir faixa etária com base na idade calculada
                let faixaEtariaValue = "";
                
                if (idade < 3) {
                    faixaEtariaValue = "bebe";
                } else if (idade < 12) {
                    faixaEtariaValue = "crianca";
                } else if (idade < 18) {
                    faixaEtariaValue = "adolescente";
                } else if (idade < 60) {
                    faixaEtariaValue = "adulto";
                } else if (idade >= 60 && idade <= 64) {
                    faixaEtariaValue = "idoso_60_64";
                } else if (idade >= 65 && idade <= 69) {
                    faixaEtariaValue = "idoso_65_69";
                } else if (idade >= 70 && idade <= 74) {
                    faixaEtariaValue = "idoso_70_74";
                } else if (idade >= 75) {
                    faixaEtariaValue = "idoso_75_mais";
                }
                
                // Selecionar a opção correta no dropdown de faixa etária
                document.getElementById('faixa_etaria').value = faixaEtariaValue;
            }
        }
        
        // Mostrar/ocultar detalhes da dieta especial
        document.getElementById('dieta_especial').addEventListener('change', function() {
            const detalhesDiv = document.getElementById('dieta_especial_detalhes');
            if (this.value === 'sim') {
                detalhesDiv.classList.remove('hidden');
            } else {
                detalhesDiv.classList.add('hidden');
            }
        });
        
        // Mostrar/ocultar campos de desligamento
        document.getElementById('status').addEventListener('change', function() {
            const dataDesligamentoContainer = document.getElementById('data_desligamento_container');
            const motivoDesligamentoContainer = document.getElementById('motivo_desligamento_container');
            
            if (this.value === 'desligado') {
                dataDesligamentoContainer.classList.remove('hidden');
                motivoDesligamentoContainer.classList.remove('hidden');
            } else {
                dataDesligamentoContainer.classList.add('hidden');
                motivoDesligamentoContainer.classList.add('hidden');
                // Limpar os campos quando o status não for "desligado"
                document.getElementById('data_desligamento').value = '';
                document.getElementById('motivo_desligamento').value = '';
            }
        });
        
        // Gerenciar os checkboxes de benefícios
        document.getElementById('nao_recebe').addEventListener('change', function() {
            const beneficiosCheckboxes = document.querySelectorAll('input[name="beneficios"]:not(#nao_recebe)');
            
            if (this.checked) {
                // Se "Não recebe" for selecionado, desabilite e desmarque os outros
                beneficiosCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                    checkbox.disabled = true;
                });
            } else {
                // Se "Não recebe" for desmarcado, habilite os outros
                beneficiosCheckboxes.forEach(function(checkbox) {
                    checkbox.disabled = false;
                });
            }
        });
        
        // Se qualquer outro benefício for marcado, desmarque "Não recebe"
        document.querySelectorAll('input[name="beneficios"]:not(#nao_recebe)').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('nao_recebe').checked = false;
                }
                
                // Verifique se pelo menos um benefício está marcado
                const algumBeneficioMarcado = Array.from(
                    document.querySelectorAll('input[name="beneficios"]:not(#nao_recebe)')
                ).some(cb => cb.checked);
                
                // Se nenhum benefício estiver marcado, habilite "Não recebe"
                document.getElementById('nao_recebe').disabled = algumBeneficioMarcado;
            });
        });
        
        // Manipulação do formulário
        document.getElementById('cadastroForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Formulário enviado com sucesso!');
            // Aqui você pode adicionar código para enviar os dados para um servidor
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'93baad4da4fca47f',t:'MTc0NjU1NzU3MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>