<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction de Dépôt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-4 ">
    <div class="container w-[1000px]  ml-[300px]">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header avec gradient -->
            <div class="bg-gradient-to-r from-orange-50 to-indigo-50  text-center  h-[105px]  flex flex-row justify-center items-center ">
                <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mr-[30px] mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                </div>
               <div>
                 <h1 class="text-2xl font-bold text-gray-800 mb-2">Transaction de Dépôt</h1>
                <p class="text-gray-600 text-sm">Effectuez un transfert entre vos comptes</p>
               </div>
            </div>

            <!-- Contenu du formulaire -->
            <div class="p-8">
                <!-- Messages de feedback -->
                <div id="successMessage" class="hidden mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center">
                    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span id="successText">Transaction enregistrée avec succès !</span>
                </div>

                <div id="loadingIndicator" class="hidden mb-6 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl">
                    <div class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Traitement en cours...
                    </div>
                </div>

                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center">
                        <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <?= htmlspecialchars($_SESSION['error_message']); ?>
                        <?php unset($_SESSION['error_message']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center">
                        <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <?= htmlspecialchars($_SESSION['success_message']); ?>
                        <?php unset($_SESSION['success_message']); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulaire -->
                <form id="transactionForm" class="space-y-6" method="POST" action="createTransaction">
                    <!-- Récapitulatif des frais -->
                    <div id="frais-info" class="hidden p-4 bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-xl">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-amber-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-amber-800 mb-2">Récapitulatif du transfert</h4>
                                <div class="text-sm text-amber-700 space-y-1">
                                    <div class="flex justify-between">
                                        <span>Montant à transférer :</span>
                                        <span class="font-medium"><span id="montant-display">0</span> FCFA</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Frais de transfert :</span>
                                        <span class="font-medium"><span id="frais-display">0</span> FCFA</span>
                                    </div>
                                    <div class="border-t border-amber-200 pt-2 mt-2">
                                        <div class="flex justify-between font-bold">
                                            <span>Total à débiter :</span>
                                            <span class="text-amber-800"><span id="total-display">0</span> FCFA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Type de transaction -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Type de transaction
                            </span>
                        </label>
                        <div class="w-full px-4 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl text-blue-800 font-medium flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Dépôt entre comptes
                        </div>
                        <input type="hidden" name="typeTransaction" value="depot">
                    </div>

                    <!-- Compte expéditeur -->
                    <div class="space-y-2">
                        <label for="compte_expediteur_id" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Compte expéditeur
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <select
                                id="compte_expediteur_id"
                                name="compte_expediteur_id"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 appearance-none"
                            >
                                <option value="">Sélectionnez le compte expéditeur</option>
                                <?php if (isset($comptesClient)) : ?>
                                    <?php foreach ($comptesClient as $compte) : ?>
                                        <option value="<?= htmlspecialchars($compte['compte_id']) ?>" 
                                                data-type="<?= htmlspecialchars($compte['typecompte']) ?>"
                                                data-solde="<?= htmlspecialchars($compte['solde']) ?>"
                                                <?= (isset($_SESSION['form_data']['compte_expediteur_id']) && $_SESSION['form_data']['compte_expediteur_id'] == $compte['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($compte['numerocompte']) ?> - 
                                            <?= htmlspecialchars($compte['typecompte']) ?> 
                                            (<?= number_format($compte['solde'], 0, ',', ' ') ?> FCFA)
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Compte destinataire -->
                    <div class="space-y-2">
                        <label for="compte_destinataire_id" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Compte destinataire
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <select
                                id="compte_destinataire_id"
                                name="compte_destinataire_id"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 appearance-none"
                            >
                                <option value="">Sélectionnez le compte destinataire</option>
                                <?php if (isset($allComptes)) : ?>
                                    <?php foreach ($allComptes as $compte) : ?>
                                        <option value="<?= htmlspecialchars($compte['compte_id']) ?>"
                                                data-type="<?= htmlspecialchars($compte['typecompte']) ?>"
                                                data-solde="<?= htmlspecialchars($compte['solde']) ?>"
                                                <?= (isset($_SESSION['form_data']['compte_destinataire_id']) && $_SESSION['form_data']['compte_destinataire_id'] == $compte['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($compte['numerocompte']) ?> - 
                                            <?= htmlspecialchars($compte['typecompte']) ?>
                                            (<?= number_format($compte['solde'], 0, ',', ' ') ?> FCFA)
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Montant -->
                    <div class="space-y-2">
                        <label for="montant" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Montant
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <input
                                type="number"
                                id="montant"
                                name="montant"
                                placeholder="0"
                                min="1"
                                step="1"
                                value="<?= isset($_SESSION['form_data']['montant']) ? htmlspecialchars($_SESSION['form_data']['montant']) : '' ?>"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm font-medium">FCFA</span>
                            </div>
                        </div>
                    </div>

                    <!-- Libellé -->
                    <div class="space-y-2">
                        <label for="libelle" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                Libellé
                                <span class="text-gray-400 text-xs ml-2">(optionnel)</span>
                            </span>
                        </label>
                        <input
                            type="text"
                            id="libelle"
                            name="libelle"
                            placeholder="Description de la transaction"
                            maxlength="255"
                            value="<?= isset($_SESSION['form_data']['libelle']) ? htmlspecialchars($_SESSION['form_data']['libelle']) : 'Dépôt entre comptes' ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 placeholder-gray-400"
                        >
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex gap-4 pt-6">
                        <button
                            type="button"
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-xl text-center transition-all duration-200 flex items-center justify-center"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Annuler
                        </button>
                        <button
                            type="submit"
                            id="submitButton"
                            class="flex-1 bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white font-medium py-3 px-6 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center disabled:bg-gray-400 disabled:cursor-not-allowed"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Effectuer le dépôt
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculerEtAfficherFrais() {
            const compteExp = document.getElementById('compte_expediteur_id').value;
            const compteDest = document.getElementById('compte_destinataire_id').value;
            const montant = parseFloat(document.getElementById('montant').value) || 0;
            
            if (compteExp && compteDest && montant > 0) {
                fetch('/calculer-frais', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `compte_expediteur_id=${compteExp}&compte_destinataire_id=${compteDest}&montant=${montant}`
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.error) {
                        document.getElementById('montant-display').textContent = new Intl.NumberFormat('fr-FR').format(data.montant);
                        document.getElementById('frais-display').textContent = new Intl.NumberFormat('fr-FR').format(data.frais);
                        document.getElementById('total-display').textContent = new Intl.NumberFormat('fr-FR').format(data.total);
                        document.getElementById('frais-info').classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
            } else {
                document.getElementById('frais-info').classList.add('hidden');
            }
        }

        function resetForm() {
            document.getElementById('transactionForm').reset();
            document.getElementById('frais-info').classList.add('hidden');
        }

        // Event listeners
        document.getElementById('compte_expediteur_id').addEventListener('change', calculerEtAfficherFrais);
        document.getElementById('compte_destinataire_id').addEventListener('change', calculerEtAfficherFrais);
        document.getElementById('montant').addEventListener('input', calculerEtAfficherFrais);
    </script>
</body>
</html>