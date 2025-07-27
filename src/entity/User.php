<?php

namespace App\Entity;

use App\Core\Abstract\AbstractEntity;

class User extends AbstractEntity {
    private int $id;
    private string $nom;
    private string $prenom;
    private string $login;
    private string $password;
    private string $adresse;
    private string $numeroCNI;
    private string $photorecto;
    private string $photoverso;
    private string $dateNaissance;
    private string $telephone;

    private ?TypeUser $typeUser = null;

    public function __construct(
        int $id = 0,
        string $nom = '',
        string $prenom = '',
        string $login = '',
        string $password = '',
        string $adresse = '',
        string $numeroCNI = '',
        string $photorecto = '',
        string $photoverso = '',
        string $dateNaissance = '',
        string $telephone = ''
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->password = $password;
        $this->adresse = $adresse;
        $this->numeroCNI = $numeroCNI;
        $this->photorecto = $photorecto;
        $this->photoverso = $photoverso;
        $this->dateNaissance = $dateNaissance;
        $this->telephone = $telephone;
    }

    // --- Getters & Setters ---
    public function getId() { return $this->id; }
    public function setId($id): self { $this->id = $id; return $this; }

    public function getNom() { return $this->nom; }
    public function setNom($nom): self { $this->nom = $nom; return $this; }

    public function getPrenom() { return $this->prenom; }
    public function setPrenom($prenom): self { $this->prenom = $prenom; return $this; }

    public function getLogin() { return $this->login; }
    public function setLogin($login): self { $this->login = $login; return $this; }

    public function getPassword() { return $this->password; }
    public function setPassword($password): self { $this->password = $password; return $this; }

    public function getAdresse() { return $this->adresse; }
    public function setAdresse($adresse): self { $this->adresse = $adresse; return $this; }

    public function getNumeroCNI() { return $this->numeroCNI; }
    public function setNumeroCNI($numeroCNI): self { $this->numeroCNI = $numeroCNI; return $this; }

    public function getPhotorecto() { return $this->photorecto; }
    public function setPhotorecto($photorecto): self { $this->photorecto = $photorecto; return $this; }

    public function getPhotoverso() { return $this->photoverso; }
    public function setPhotoverso($photoverso): self { $this->photoverso = $photoverso; return $this; }

    public function getDateNaissance() { return $this->dateNaissance; }
    public function setDateNaissance($dateNaissance): self { $this->dateNaissance = $dateNaissance; return $this; }

    public function getTelephone() { return $this->telephone; }
    public function setTelephone($telephone): self { $this->telephone = $telephone; return $this; }

    public function getTypeUser() { return $this->typeUser; }
    public function setTypeUser($typeUser): self { $this->typeUser = $typeUser; return $this; }

    // --- Hydratation depuis array ---
    public static function toObject(array $data): static {
        $user = new static(
            $data['id'] ?? 0,
            $data['nom'] ?? '',
            $data['prenom'] ?? '',
            $data['login'] ?? '',
            $data['password'] ?? '',
            $data['adresse'] ?? '',
            $data['numero_cni'] ?? '',
            $data['photorecto'] ?? '',
            $data['photoverso'] ?? '',
            $data['date_naissance'] ?? '',
            $data['telephone'] ?? ''
        );

        if (isset($data['typeuserid'])) {
            $typeUser = new TypeUser();
            $typeUser->setId($data['typeuserid']);
            $user->setTypeUser($typeUser);
        }

        return $user;
    }

    // --- Conversion vers array (pour insertion SQL ou autre) ---
    public function toArray(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'login' => $this->login,
            'password' => $this->password,
            'adresse' => $this->adresse,
            'numero_cni' => $this->numeroCNI,
            'photorecto' => $this->photorecto,
            'photoverso' => $this->photoverso,
            'date_naissance' => $this->dateNaissance,
            'telephone' => $this->telephone,
            'typeuserid' => $this->typeUser ? $this->typeUser->getId() : null,
        ];
    }
}
