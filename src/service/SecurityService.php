<?php

namespace App\Service;
use App\Core\App;
use App\Entity\User;
use App\Core\Singleton;
use App\Repository\UsersRepository;
use App\Repository\CompteRepository;
use App\Repository\TelephoneRepository;
use App\Core\DataFetch;


class SecurityService extends Singleton{
    private UsersRepository $userRepository;
    private TelephoneRepository $telephoneRepository;
    private CompteRepository $compteRepository;
    


    public function __construct(
        UsersRepository $usersRepository,
        CompteRepository $compteRepository,
        TelephoneRepository $telephoneRepository,
    ){
        $this->userRepository = $usersRepository;
        $this->telephoneRepository = $telephoneRepository;
        $this->compteRepository = $compteRepository;
        // $this->userRepository = App::getDependency('usersRepo');
        // $this->compteRepository = App::getDependency('compteRepo');
        // $this->telephoneRepository = App::getDependency('telephoneRepo');
    }

    public function seConnecter(string $login, string $password): ?User {
    $user = $this->userRepository->selectByLogin($login);
    if ($user && password_verify($password, $user->getPassword())) {
        return $user;
    }
    return null;
}

   public function creerComptePrincipal(array $data ){
   
        $cni = $_POST['numeroCNI'];
        $login = $_POST['login'];
        $password = $_POST['password'];
       
        $fetcher = new DataFetch($cni, $login, $password);

        $userData = $fetcher->fetchUserData();
     /*  echo "<pre>";
     var_dump($userData);
     echo "</pre>"; 
     die ; */

        $existingNumero = $this->telephoneRepository->findByNumero( $userData['data']['telephone'] );
        if ($existingNumero) {
            return "Ce numéro de téléphone est déjà associé à un compte.";
        }
/*         var_dump($data);
 */        return $this->telephoneRepository->insertPrincipale($data);     

}

}