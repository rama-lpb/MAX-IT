<?php

namespace App\Core;

class DataFetch
{
    private string $cni;
    private string $login;
    private string $password;
    private string $apiUrl;

    public function __construct(string $cni, string $login, string $password)
    {
        $this->cni = $cni;
        $this->login = $login;
        $this->password = $password;
        $this->apiUrl = "https://appdaff-table0-1.onrender.com/api/citoyens/{$cni}";
    }

    public function fetchUserData(): ?array
    {
        $response = @file_get_contents($this->apiUrl);

        if ($response === false) {
            return null; 
        }

        $data = json_decode($response, true);

        if (!isset($data['success']) || $data['success'] !== true) {
            return null;
        }

        $citoyen = $data['data'];

        return [
            'nom'            => $citoyen['nom'] ?? '',
            'prenom'         => $citoyen['prenom'] ?? '',
            'login'          => $this->login,
            'password'       => $this->password,
            'typeuserid'     => 1,
            'adresse'        => $citoyen['lieu_naissance'] ?? '',
            'numero_cni'     => $this->cni,
            'photorecto'     => $citoyen['photorecto'] ?? '',
            'photoverso'     => $citoyen['photoverso'] ?? '',
            'date_naissance' => $citoyen['date_naissance'] ?? '',
            'telephone'      => $citoyen['telephone'] ?? '',
        ];
    }
}
