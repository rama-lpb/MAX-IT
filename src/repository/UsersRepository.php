<?php

namespace App\Repository;
use App\Entity\User;
use App\Core\Abstract\AbstractRepository;

use PDO;

class UsersRepository extends AbstractRepository{
    private static UsersRepository|null $instance = null;

    public static function getInstance():UsersRepository{
        if(self::$instance == null){
            self::$instance = new UsersRepository();
        }
        return self::$instance;
    }

    public function __construct(){
        parent::__construct();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    private string $table = 'users';

    public function selectAll(){}


    public function insert(array $data) {
      echo "<pre>";
        print_r($data);
        echo "</pre>";
    
    try {
        $sql = "INSERT INTO $this->table 
            (nom, prenom, login, password, typeuserid, adresse, numerocni, photorecto, photoverso, date_naissance) 
            VALUES (:nom, :prenom, :login, :password, :typeuserid, :adresse, :numerocni, :photorecto, :photoverso, :date_naissance)";

        $stmt = $this->pdo->prepare($sql);

        $result = $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'login' => $data['login'],
            'password' => $data['password'],
            'typeuserid' => 1,
            'adresse' => $data['lieu_naissance'] ?? null,
            'numerocni' => $data['cni'] ?? null,
            'photorecto' => $data['photorecto'],
            'photoverso' => $data['photoverso'],
            'date_naissance' => $data['date_naissance'],
        ]);

        var_dump($result);

        if ($result) {
            return $this->pdo->lastInsertId();
        } else {
            echo 'you learn';
            return false;
        }
    } catch (\PDOException $e) {
        // 🔥 Erreur SQL ici
        echo 'Erreur SQL : ' . $e->getMessage();
        return false;
    } catch (\Exception $e) {
        // 🔥 Autre type d’erreur
        echo 'Erreur Générale : ' . $e->getMessage();
        return false;
    }
}


     /* public function insert(array $data){
        
        $sql = "INSERT INTO $this->table (nom, prenom,login, password, typeuserid, adresse, numerocni, photorecto , photoverso , date_naissance) values (:nom, :prenom, :login, :password, :typeuserid, :adresse, :numero_cni, :photorecto , :photoverso  , :date_naissance)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute( [
            'nom' => $data['data']['nom'],
            'prenom' => $data['data']['prenom'],
            'login' => $data['data']['login'],
            'password' => $data['data']['password'],
            'typeuserid' => 1,
            'adresse' => $data['data']['lieu_naissance'],
            'numero_cni' => $data['data']['cni'],
            'photorecto' => $data['data']['photorecto'],
            'photoverso' => $data['data']['photoverso'],
            'date_naissance' => $data['data']['date_naissance'],
            ] 
           );
        var_dump($result);
        if($result){
            $echo ='you win';
                       var_dump($echo);
            return $this->pdo->lastInsertId();
        }else{
            $echo = 'you learn';
                        var_dump($echo);

            return false;
        }
     }
 */
     public function selectByLoginAndPassword(string $login, string $passwors): null|User{
        $query = "SELECT * FROM $this->table WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'login' => $login,
            'password' => $passwors
        ]);
        $result = $stmt->fetch();
        if($result){
            return User::toObject($result);
        }
        return null;
        
    }

    public function selectByLogin(string $login): ?User {
    $query = "SELECT * FROM $this->table WHERE login = :login";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(['login' => $login]);
    $result = $stmt->fetch();
    // var_dump(User::toObject($result));  
    return $result ? User::toObject($result) : null;
}



     public function update(){}
     public function delete(){}
     public function selectById($id){
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
     }
     public function selectBy(array $filter){}

}