<?php /* var_dump($errors)  */?>
<div class="container px-4 py-8 flex flex-col justify-center ml-[150px]">
    <div class="  bg-white rounded-2xl shadow-custom overflow-hidden">
        <div class="flex flex-col lg:flex-row">
            <!-- Partie gauche : Présentation -->
          
            <div class="lg:w-1/2 p-8 flex items-center">
                <div class="w-full max-w-md mx-auto">
                    <form class="space-y-6" action="principalCreated" method="post" enctype="multipart/form-data" autocomplete="off">
                        <!-- Numéro CNI -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Numéro CNI</label>
                            <div class="relative">
                                <input type="text" 
                                    name="numeroCNI" 
                                    id="numeroCNI"
                                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-2 focus:ring-orange-200 focus:border-orange-500 focus:outline-none transition-colors"
                                    placeholder="Entrez le numéro CNI et appuyez sur Entrée">
                                <div id="loading" class="absolute right-3 top-1/2 transform -translate-y-1/2 hidden mt-[50px]">
                                    <svg class="animate-spin h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                               
                            </div>
                            <button type="button" 
                                id="searchBtn"
                                class="mt-2 w-full  bg-orange-400 text-white py-1 px-4 rounded-lg hover:bg-orange-500 transition-colors flex items-center justify-center gap-2">
                                Rechercher CNI
                            </button>
                             </div>
                            <div id="cni-error" class="flex items-center mt-2 bg-red-400 justify-center px-4 py-2 rounded-md hidden">
                                <p class="text-sm text-white">Ce CNI n'existe pas ! Veuillez recommencer </p>
                            </div>
                            <div id="cni-success" class="flex items-center mt-2 bg-green-400 justify-center px-4 py-2 rounded-md hidden">
                                <p class="text-sm text-white">Citoyen trouvé ! Informations pré-remplies.</p>
                            </div>
                            <?php if(!empty($_SESSION['errors']['numeroCNI'])): ?>
                                <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                    <p class="text-sm text-white"><?= $_SESSION['errors']['numeroCNI']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Prénom & Nom -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-orange-200 focus:border-orange-500 transition-colors bg-gray-100 focus:outline-none" readonly>
                                <?php if(!empty($_SESSION['errors']['prenom'])): ?>
                                    <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                        <p class="text-sm text-white"><?= $_SESSION['errors']['prenom']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                                <input type="text" name="nom" id="nom" class="w-full px-4 py-3  rounded-lg focus:ring-2 focus:ring-orange-200 focus:outline-none focus:border-orange-500 transition-colors bg-gray-100" readonly>
                                <?php if(!empty($_SESSION['errors']['nom'])): ?>
                                    <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                        <p class="text-sm text-white"><?= $_SESSION['errors']['nom']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Login -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Login</label>
                            <input type="text" name="login" id="login" class="w-full px-4 py-3 focus:outline-none rounded-lg focus:ring-2 focus:ring-orange-200 border  border-gray-400 focus:border-orange-500 transition-colors">
                            <?php if(!empty($_SESSION['errors']['login'])): ?>
                                <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                    <p class="text-sm text-white"><?= $_SESSION['errors']['login']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" name="password" class="w-full px-4 py-3 focus:outline-none rounded-lg focus:ring-2 focus:ring-orange-200 border  border-gray-400 focus:border-orange-500 transition-colors">
                            <?php if(!empty($_SESSION['errors']['password'])): ?>
                                <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                    <p class="text-sm text-white"><?= $_SESSION['errors']['password']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Adresse -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="w-full px-4 py-3 focus:outline-none rounded-lg focus:ring-2 focus:ring-orange-200 focus:border-orange-500 transition-colors bg-gray-100" readonly>
                            <?php if(!empty($_SESSION['errors']['adresse'])): ?>
                                <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                    <p class="text-sm text-white"><?= $_SESSION['errors']['adresse']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Téléphone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                            <input type="text" name="telephone" id="telephone" class="w-full px-4 py-3  rounded-lg focus:ring-2  focus:ring-orange-500 focus:border-orange-200 transition-colors bg-gray-100" readonly>
                            <?php if(!empty($_SESSION['errors']['telephone'])): ?>
                                <div class="flex items-center mt-1 bg-red-400 justify-center px-4 py-2 rounded-md">
                                    <p class="text-sm text-white"><?= $_SESSION['errors']['telephone']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Bouton Enregistrer -->
                        <button type="submit" class="w-full bg-gradient-orange text-white font-bold py-4 px-6 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            Enregistrer
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <a href="/" class="text-orange-500 hover:text-orange-600 transition-colors font-semibold">
                            J'ai déjà un compte
                        </a>
                    </div>
                </div>
            </div>


         <!-- Partie droite : Formulaire -->
              <div class="lg:w-1/2  relative flex flex-col justify-center">
            <img src="images/design/otp.gif" alt="">

            </div>
                        
            
        </div>
    </div>
</div>

<script>
document.getElementById('searchBtn').addEventListener('click', function () {
    const cni = document.getElementById('numeroCNI').value.trim();
    const loading = document.getElementById('loading');
    const btn = document.getElementById('searchBtn');
    document.getElementById('cni-error').classList.add('hidden');
    document.getElementById('cni-success').classList.add('hidden');

    if (cni !== '') {
        loading.classList.remove('hidden');
        btn.disabled = true;
        fetch(`https://appdaff-table0-1.onrender.com/api/citoyens/${cni}`)
            .then(response => {
                if (!response.ok) throw new Error("CNI non trouvée");
                return response.json();
            })
            .then(data => {
                if (data && data.data) {
                    const citoyen = data.data;
                    document.getElementById('prenom').value = citoyen.prenom || '';
                    document.getElementById('nom').value = citoyen.nom || '';
                    document.getElementById('adresse').value = citoyen.lieu_naissance || '';
                  document.getElementById('telephone').value = citoyen.telephone || '';
                   document.getElementById('cni-success').classList.remove('hidden');
                } else {
                    document.getElementById('cni-error').classList.remove('hidden');
                }
            })
            .catch(error => {
                document.getElementById('cni-error').classList.remove('hidden');
            })
            .finally(() => {
                loading.classList.add('hidden');
                btn.disabled = false;
            });
    }
});
</script>

