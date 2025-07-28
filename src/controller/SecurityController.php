<?php

namespace App\Controller;
use App\Core\App;
use App\Core\Session;
use App\Core\DataFetch;



use App\Core\Validator;
use App\Service\TwilioService;
use App\Service\SecurityService;
use App\Core\Abstract\AbstractController;




class SecurityController extends AbstractController{

    private SecurityService $securityService;
    private Validator $validator;


    public function __construct(
        Session $session,
        SecurityService $securityService,
        Validator $validator
    ){
        parent::__construct(
            $this->session = $session
        );
        $this->layout = 'security';
        $this->securityService =   $securityService;
        $this->validator = $validator;
    }
    public function index(){
        $this->unset('errors');
        $this->render("login/connexion.php");
    }
    public function show(){}
    public function create(){
    }

   public function store(){
    }

    public function edit(){
    }


    public function login(){
      require_once "../app/config/rules.php";

        $loginData = $_POST;

        if($this->validator->validate($loginData,  $rules)){
        $user = $this->securityService->seConnecter($loginData['login'], $loginData['password']);  
         if($user){
             $this->session->set("user", $user->toArray());
            header("Location: /compte");
            exit();
         }else{
            $this->validator->addError('password', "Identifiant incorrect");
            $this->session->set('errors', $this->validator->getErrors());
            echo  ("i m here");
            $this->render("login/login.php");
         }
        }else{
            echo ('mauvaise donne');
            $this->session->set('errors', $this->validator->getErrors());
            $this->render("login/login.php");
        }
    }

    public function logout(){
        session_destroy();
        header("Location: /");
    }

      private function validateForm(array &$data): array {
      require_once "../app/config/rules.php";
      $this->validator->validate($data, $rules);
      return $this->validator->getErrors();
}





public function createComptePrincipal() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cni = $_POST['numeroCNI'];
        $login = $_POST['login'];
        $password = $_POST['password'];
       
        $fetcher = new DataFetch($cni, $login, $password);

        $userData = $fetcher->fetchUserData();
     /*    echo "<pre>";
    var_dump($userData);
    echo "</pre>"; */
    
        
        if (!$userData || isset($data['error'])) {
            $this->session->set('errors', ['cni' => 'CNI introuvable ou invalide']);
            $this->layout = 'security';
            $this->render("compte/form.principal.php");
            return;
        }

      
        $result = $this->securityService->creerComptePrincipal($userData , $cni);
/*   var_dump($result);
 */        if ($result === true) {


            header("Location: /");
            exit;
        } else {
           $err = $this->session->set('errors', ['compte' => $result]);
      }
    }

    $this->layout = 'security';
    $this->render("compte/form.principal.php" , ['compte' => $this->securityService->creerComptePrincipal($userData , $cni)]);
}




            

    

   
    
}