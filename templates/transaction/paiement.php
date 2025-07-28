<?php /* var_dump($comptes) */ ?>
<div class="container ml-[360px] w-[800px] h-full rounded-lg shadow-lg border border-gray-300 h-[600px] border-box overflow-hidden">
    <div class="  h-auto ">
        <!-- Header avec gradient subtil -->
        <div class="bg-gradient-to-r from-orange-50 to-indigo-50 p-4 text-center flex flex-row h-[80px] justify-center items-center">
            <div class="w-10 h-10 bg-orange-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
           <div class="ml-[-190px] mr-[260px]">
             <h1 class="text-2xl font-bold text-gray-800 mb-2">Paiement Service</h1>
           </div>
         </div>
        
        <!-- Contenu du formulaire -->
        <div class="p-8">
            <!-- Messages de feedback -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['errors']['general'])): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <?= $_SESSION['errors']['general'] ?>
                </div>
            <?php endif; ?>
            
            <!-- Formulaire -->
          <form method="POST" action="wofoyal/paie" class="space-y-6">
    <!-- Select: Service -->
    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
            Service <span class="text-red-500 ml-1">*</span>
        </label>
        <select
            name="service"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
            required
        >
            <option value="">-- Choisir un service --</option>
            <option value="Woyofal">Woyofal</option>
            <option value="Autres">Autres</option>
        </select>
    </div>

    <!-- Select: Type de service -->
    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">
            Type de service <span class="text-red-500 ml-1">*</span>
        </label>
        <select
            name="type_service"
            id="type_service"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
            required
            onchange="toggleMontantField()"
        >
            <option value="">-- Choisir un type --</option>
            <option value="achat_credit">Achat crédit</option>
            <option value="reclamation">Réclamation</option>
            <option value="autres">Autres</option>
        </select>
    </div>

    <div class="space-y-2 hidden" id="compteur_field">
        <label class="block text-sm font-semibold text-gray-700">
            Numero Compteur <span class="text-red-500 ml-1">*</span>
        </label>
        <input
            type="number"
            name="compteur"
            id="compteur_field"
            min="100"
            step="50"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
            placeholder="Ex: 2000"
        >
    </div>

    <!-- Input: Montant (visible uniquement si achat crédit) -->
    <div class="space-y-2 hidden" id="montant_field">
        <label class="block text-sm font-semibold text-gray-700">
            Montant à payer (CFA) <span class="text-red-500 ml-1">*</span>
        </label>
        <input
            type="number"
            name="montant"
            min="100"
            step="50"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
            placeholder="Ex: 2000"
        >
    </div>

    <!-- Boutons d'action (identiques à ton code) -->
    <div class="flex gap-4 pt-6">
        <a href="<?= APP_URL ?>/compte" 
           class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-xl text-center transition-all duration-200 flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            Annuler
        </a>
        <button type="submit"  id="valider"
                class="flex-1 bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white font-medium py-3 px-6 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Valider
        </button>
    </div>

    <input type="hidden" id="solde_disponible" value="<?= $comptes['solde'] ?>">

</form>

<!-- JavaScript pour afficher le champ montant -->
<script>
    function toggleMontantField() {
        const typeService = document.getElementById('type_service').value;
        const montantField = document.getElementById('montant_field');
        const compteur = document.getElementById('compteur_field');
        if (typeService === 'achat_credit') {
            montantField.classList.remove('hidden');
            compteur.classList.remove('hidden');
        } else {
            montantField.classList.add('hidden');
            compteur.classList.add('hidden');
        }
    }
    
/* document.getElementById('valider').addEventListener('click', function (event) {
    event.preventDefault(); 

    const montant = parseInt(document.getElementById('montant').value);
    const solde = parseInt(document.getElementById('solde_disponible').value);
    const compteur = parseInt(document.getElementById('compteur_field').value);

  
    if (isNaN(montant)) {
        alert("Veuillez entrer un montant valide.");
        return;
    }

    if (montant > solde) {
        alert("Solde insuffisant pour effectuer cette opération.");
        return;
    }

    fetch('https://api-tierce.com/achat-credit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            montant: montant,
            compteur: compteur
        })
    })
    .then(resp => {
        if (!resp.ok) throw new Error("Erreur lors de l'achat de crédit");
        return resp.json();
    })
    .then(result => {
        alert("✅ Achat effectué avec succès !");
        console.log(result);
        // Tu peux aussi faire un redirect ici si tu veux.
    })
    .catch(err => {
        alert("❌ Erreur pendant l’achat : " + err.message);
    });
}); */
// Exemple : ce tableau peut venir de ton JS, avec des infos clients ou autres



document.getElementById('valider').addEventListener('click', function (event) {
    event.preventDefault();
    
    const compte =  <?php echo json_encode($comptes); ?> 
    const montant = parseFloat(document.getElementById('montant').value);
    const solde = parseFloat(document.getElementById('solde_disponible').value);
    const compteur = document.getElementById('compteur_field').value.trim();

    if (isNaN(montant) || montant <= 0) {
        alert("Veuillez entrer un montant valide.");
        return;
    }

    if (montant > solde) {
        alert("Solde insuffisant pour effectuer cette opération.");
        return;
    }

    fetch('https://ges-employer-php-fpm-1-0-0-1.onrender.com/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            compteur: compteur,
            solde: solde,
            compte: compte,   // <-- ici on envoie le tableau
            montant: montant
        })
    })
    .then(resp => {
        if (!resp.ok) throw new Error("Erreur lors de l'achat de crédit");
        return resp.json();
    })
    .then(result => {
        if(result.statut === 'success') {
            alert("✅ Achat effectué avec succès !");
            console.log("Facture :", result.data);
        } else {
            alert("❌ Erreur : " + (result.message || "Erreur inconnue"));
        }
    })
    .catch(err => {
        alert("❌ Erreur pendant l’achat : " + err.message);
    });
});

</script>


</script>

        </div>
    </div>
</div>
<!-- document.getElementById('valider').addEventListener('click', function (event) {
    event.preventDefault();
    
    const compte =  <?php echo json_encode($comptes); ?> 
    const montant = parseFloat(document.getElementById('montant').value);
    const solde = parseFloat(document.getElementById('solde_disponible').value);
    const compteur = document.getElementById('compteur_field').value.trim();

    if (isNaN(montant) || montant <= 0) {
        alert("Veuillez entrer un montant valide.");
        return;
    }

    if (montant > solde) {
        alert("Solde insuffisant pour effectuer cette opération.");
        return;
    }

    fetch('https://ges-employer-php-fpm-1-0-0-1.onrender.com/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            compteur: compteur,
            solde: solde,
            compte: compte,   // <-- ici on envoie le tableau
            montant: montant
        })
    })
    .then(resp => {
        if (!resp.ok) throw new Error("Erreur lors de l'achat de crédit");
        return resp.json();
    })
    .then(result => {
        if(result.statut === 'success') {
            alert("✅ Achat effectué avec succès !");
            console.log("Facture :", result.data);
        } else {
            alert("❌ Erreur : " + (result.message || "Erreur inconnue"));
        }
    })
    .catch(err => {
        alert("❌ Erreur pendant l’achat : " + err.message);
    });
}); -->

</script>


</script>

        </div>
    </div>
</div>
