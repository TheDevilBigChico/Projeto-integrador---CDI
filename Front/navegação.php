
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Opções</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f5f0e5; /* Fundo creme */
            color: #333;
        }
        
        .option-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }
        
        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.12);
            background-color: #f0f9ff;
            border: 2px solid #1d9bf0;
        }
        
        .option-card.selected {
            background-color: #e6f7ff;
            border: 2px solid #1d9bf0;
        }
        
        .option-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            color: #1d9bf0;
            transition: all 0.3s ease;
        }
        
        .option-card:hover .option-icon {
            transform: scale(1.1);
        }
        
        .logout-btn {
            background-color: #f3f4f6;
            color: #4b5563;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background-color: #fee2e2;
            color: #dc2626;
            border-color: #fecaca;
        }
        
        /* Barra de rolagem personalizada */
        ::-webkit-scrollbar {
            width: 8px;
            height: 6px;
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
        
        /* Animação de entrada */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <!-- Cabeçalho com boas-vindas e botão de logout -->
        <header class="sticky top-0 z-10 bg-opacity-90 shadow-sm" style="background-color: rgba(245, 240, 229, 0.95);">
            <div class="p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <h2 class="text-lg font-medium">Bem Vindo <span class="font-bold">Username</span></h2>
                </div>
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </button>
            </div>
        </header>
        
        <!-- Conteúdo Principal -->
        <main class="flex-1 p-4 md:p-6 lg:p-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-2xl font-bold mb-6">Início</h1>
                
                <!-- Matriz de Opções -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- 1. Cadastro -->
                    <div class="opacity-0 animate-fade-in">
                        <div class="option-card" data-option="cadastro">
                            <i class="fas fa-user-plus option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Cadastro</h3>
                            <p class="text-gray-600">Gerenciar cadastros de pacientes e profissionais</p>
                        </div>
                    </div>
                    
                    <!-- 2. Atividade Convencional -->
                    <div class="opacity-0 animate-fade-in delay-100">
                        <div class="option-card" data-option="atividade-convencional">
                            <i class="fas fa-clipboard-list option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Atividade Convencional</h3>
                            <p class="text-gray-600">Registrar e gerenciar atividades padrão</p>
                        </div>
                    </div>
                    
                    <!-- 3. Atividade Enfermagem -->
                    <div class="opacity-0 animate-fade-in delay-200">
                        <div class="option-card" data-option="atividade-enfermagem">
                            <i class="fas fa-heartbeat option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Atividade Enfermagem</h3>
                            <p class="text-gray-600">Registrar procedimentos e cuidados de enfermagem</p>
                        </div>
                    </div>
                    
                    <!-- 4. Frequência -->
                    <div class="opacity-0 animate-fade-in delay-300">
                        <div class="option-card" data-option="frequencia">
                            <i class="fas fa-calendar-check option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Frequência</h3>
                            <p class="text-gray-600">Controle de presença e frequência</p>
                        </div>
                    </div>
                    
                    <!-- 5. Encaminhamentos -->
                    <div class="opacity-0 animate-fade-in delay-400">
                        <div class="option-card" data-option="encaminhamentos">
                            <i class="fas fa-share-square option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Encaminhamentos</h3>
                            <p class="text-gray-600">Gerenciar encaminhamentos para especialidades</p>
                        </div>
                    </div>
                    
                    <!-- 6. Configurações -->
                    <div class="opacity-0 animate-fade-in delay-500">
                        <div class="option-card" data-option="configuracoes">
                            <i class="fas fa-cog option-icon"></i>
                            <h3 class="text-lg font-bold mb-2">Configurações</h3>
                            <p class="text-gray-600">Ajustar preferências e configurações do sistema</p>
                        </div>
                    </div>
                </div>
                
                <!-- Botão de Confirmação -->
                <div class="mt-8 text-center opacity-0 animate-fade-in delay-600">
                    <button id="confirmButton" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-full transition disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        Acessar
                    </button>
                </div>
            </div>
        </main>
        
        <!-- Rodapé vazio -->
        <footer class="bg-white border-t border-gray-300 p-4 text-center text-gray-500 text-sm">
            <!-- Texto de copyright removido -->
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const optionCards = document.querySelectorAll('.option-card');
            const confirmButton = document.getElementById('confirmButton');
            const logoutButton = document.querySelector('.logout-btn');
            let selectedOption = null;
            
            // Adicionar evento de clique a cada opção
            optionCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remover seleção anterior
                    optionCards.forEach(c => c.classList.remove('selected'));
                    
                    // Selecionar esta opção
                    this.classList.add('selected');
                    selectedOption = this.dataset.option;
                    
                    // Habilitar botão de confirmação
                    confirmButton.disabled = false;
                });
            });
            
            // Evento de clique no botão de confirmação
            confirmButton.addEventListener('click', function() {
                if (selectedOption) {
                    alert(`Você selecionou: ${selectedOption}`);
                    // Aqui você pode redirecionar para a página correspondente
                    // window.location.href = `${selectedOption}.php`;
                }
            });
            
            // Evento de clique no botão de logout
            logoutButton.addEventListener('click', function() {
                if (confirm('Deseja realmente sair do sistema?')) {
                    alert('Logout realizado com sucesso!');
                    // Aqui você pode redirecionar para a página de login
                    // window.location.href = 'login.php';
                }
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'93b9bec4b40e1433',t:'MTc0NjU0Nzc5OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>