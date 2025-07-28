 
toggleMontantField();
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
