<div class="flex justify-between gap-6 mb-[80px]">
    <div class=" w-[45%] rounded-xl p-5 border border-gray-200 shadow-sm bg-gray-700 h-[140px]">
        <div class="flex items-center justify-between ">
            <div class="flex items-center ">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mr-4 ">
                    <img src="./assets/icons/solde.svg" alt="solde icon" class="h-8 w-8">
                </div>
                <div>
                    <div class="text-2xl font-bold text-white"><?= $this->session->get('comptes','solde') ?> CFA</div>
                    <div class="text-white text-sm font-medium">Solde principal</div>
                </div>
            </div>
            <!-- QR Code plus petit -->
            <div class="w-20 h-20 bg-gray-900 rounded-xl flex items-center justify-center border border-gray-200">
                <img src="./assets/images/qrcode.png" alt="QR Code" class="w-16 h-16">
            </div>
        </div>
    </div>
    
    <!-- Actions rapides regroupées -->
    <div class="flex-1 grid grid-cols-1 gap-3">
        <!-- Barre de recherche -->
        <div>
            <input type="text" 
                   class="w-full rounded-xl p-3 border border-gray-200  focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-white shadow-lg" 
                   placeholder="Numéro de compte">
        </div>
        
        <!-- Boutons d'action -->
        <div class="flex gap-3">
            <a href="/compteSecondaire" class="flex-1">
                <button class="w-full p-3 bg-gray-200 hover:bg-gray-100 rounded-xl shadow-lg flex items-center justify-center gap-2 transition-colors">
                    <img src="./assets/icons/addacount.svg" alt="add icon" class="w-5 h-5">
                    <span class="text-sm font-medium">Créer compte</span>
                </button>
            </a>
            
            <a href="/listComptes" class="flex-1">
                <button class="w-full p-3 bg-gray-200 hover:bg-gray-100 rounded-xl shadow-lg flex items-center justify-center gap-2 transition-colors">
                    <img src="./assets/icons/changer.svg" alt="changer icon" class="w-5 h-5">
                    <span class="text-sm font-medium">Changer compte</span>
                </button>
            </a>
        </div>
    </div>
</div>

<!-- Section des transactions -->
<div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Dernières transactions</h2>
        <a href="/listTransactions">
            <button class="text-blue-600 hover:text-blue-700 font-medium transition-colors">
                Voir plus →
            </button>
        </a>
    </div>
    
    <!-- Grille des transactions - plus responsive -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <?php foreach($transactions as $transaction): ?>
        <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-4 text-center transition-colors cursor-pointer">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm">
                <img src="./images/design/transfert.png" alt="transaction" class="w-6 h-6">
            </div>
            <div class="font-medium text-sm text-gray-800 mb-1"><?= $transaction['typetransaction'] ?></div>
            <div class="text-blue-600 font-bold text-sm"><?= $transaction['montant'] ?> CFA</div>
            <div class="text-xs text-gray-500 mt-1"><?= date('d/m', strtotime($transaction['datetransaction'])) ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>