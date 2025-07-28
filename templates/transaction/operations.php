<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir le Type de Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Éviter le scroll en optimisant l'espace */
        body, html {
            height: 100vh;
            overflow: hidden;
        }
        
        .container-custom {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-gray-50 overflow-hidden">
    <div class="container-custom h-[200px] mt-[-170px]  w-[1600px] h-[100px] overflow-hidden">
        <div class="content-area">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100  border-box  mt-[-10kk0px] border border-black">
                <!-- Header compact -->
                <div class="bg-gradient-to-r from-orange-50 to-indigo-50 text-center flex flex-row items-center justify-center">
                    <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-centermb-3 flex flex-row items-center justify-center mr-10">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                   <div>
                     <h1 class="text-2xl font-bold text-gray-800 mb-1">Nouvelle Transaction</h1>
                    <p class="text-gray-600 text-sm">Choisissez le type de transaction que vous souhaitez effectuer</p>
              
                   </div>
                </div>

                <!-- Contenu principal optimisé -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <!-- Carte Dépôt -->
                        <div class="group relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer"
                             onclick="redirectToTransaction('depot')">
                            <div class="p-6 text-center">
                                <!-- Icône -->
                                <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </div>
                                
                                <!-- Titre -->
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Dépôt</h3>
                                <p class="text-gray-600 text-xs mb-4 leading-relaxed">Effectuez un transfert d'argent entre vos comptes ou vers d'autres comptes</p>
                                
                                <!-- Features compactes -->
                                <div class="space-y-1 mb-4">
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Transfert instantané
                                    </div>
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Sécurisé
                                    </div>
                                </div>
                                
                                <!-- Bouton -->
                                <div class="bg-blue-500 group-hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-300 inline-flex items-center text-sm">
                                    <span>Faire un dépôt</span>
                                    <svg class="w-3 h-3 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Effet de fond -->
                            <div class="absolute top-0 right-0 w-20 h-20 bg-blue-300 rounded-full opacity-10 -translate-y-10 translate-x-10"></div>
                        </div>

                        <!-- Carte Retrait -->
                        <div class="group relative overflow-hidden bg-gradient-to-br from-red-50 to-red-100 rounded-xl border-2 border-red-200 hover:border-red-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer"
                             onclick="redirectToTransaction('retrait')">
                            <div class="p-6 text-center">
                                <!-- Icône -->
                                <div class="w-16 h-16 bg-red-500 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                
                                <!-- Titre -->
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Retrait</h3>
                                <p class="text-gray-600 text-xs mb-4 leading-relaxed">Retirez de l'argent de vos comptes vers votre portefeuille mobile ou en espèces</p>
                                
                                <!-- Features compactes -->
                                <div class="space-y-1 mb-4">
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Retrait immédiat
                                    </div>
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Code de confirmation
                                    </div>
                                </div>
                                
                                <!-- Bouton -->
                                <div class="bg-red-500 group-hover:bg-red-600 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-300 inline-flex items-center text-sm">
                                    <span>Faire un retrait</span>
                                    <svg class="w-3 h-3 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Effet de fond -->
                            <div class="absolute top-0 right-0 w-20 h-20 bg-red-300 rounded-full opacity-10 -translate-y-10 translate-x-10"></div>
                        </div>

                        <!-- Carte Paiement Services -->
                        <div class="group relative overflow-hidden bg-gradient-to-br from-green-50 to-green-100 rounded-xl border-2 border-green-200 hover:border-green-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer"
                             onclick="redirectToTransaction('paiement')">
                            <div class="p-6 text-center">
                                <!-- Icône -->
                                <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                
                                <!-- Titre -->
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Paiement Services</h3>
                                <p class="text-gray-600 text-xs mb-4 leading-relaxed">Payez vos factures et services comme Woyofal, électricité, eau, internet</p>
                                
                                <!-- Features compactes -->
                                <div class="space-y-1 mb-4">
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Woyofal, SENELEC
                                    </div>
                                    <div class="flex items-center justify-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Reçu instantané
                                    </div>
                                </div>
                                
                                <!-- Bouton -->
                                <div class="bg-green-500 group-hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-300 inline-flex items-center text-sm">
                                    <span>Payer un service</span>
                                    <svg class="w-3 h-3 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Effet de fond -->
                            <div class="absolute top-0 right-0 w-20 h-20 bg-green-300 rounded-full opacity-10 -translate-y-10 translate-x-10"></div>
                        </div>
                    </div>

                    <!-- Section d'aide compacte -->
                    <div class="mt-6 bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-base font-semibold text-gray-800 mb-1">Besoin d'aide ?</h4>
                                <p class="text-gray-600 text-xs mb-2">Questions sur les transactions ou frais ?</p>
                                <button class="text-orange-600 hover:text-orange-700 font-medium text-xs flex items-center">
                                    Voir l'aide
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirectToTransaction(type) {
            // Animation avant redirection
            const cards = document.querySelectorAll('.group');
            cards.forEach(card => {
                if (!card.onclick.toString().includes(type)) {
                    card.style.opacity = '0.5';
                    card.style.transform = 'scale(0.95)';
                }
            });

            // Redirection selon le type
            setTimeout(() => {
                switch(type) {
                    case 'depot':
                        window.location.href = '/transaction/depot';
                        break;
                    case 'retrait':
                        window.location.href = '/transaction/retrait';
                        break;
                    case 'paiement':
                        window.location.href = '/transaction/paiement';
                        break;
                    default:
                        console.error('Type de transaction non reconnu');
                }
            }, 300);
        }

        // Animation au survol pour améliorer l'UX
        document.querySelectorAll('.group').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.01)';
            });
            
            card.addEventListener('mouseleave', function() {
                if (this.style.opacity !== '0.5') {
                    this.style.transform = 'translateY(0) scale(1)';
                }
            });
        });
    </script>
</body>
</html>