<?php
namespace User;

class UserRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * UserRepository constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll()
    {
        $rows = $this->connection->query('SELECT * FROM "users";')->fetchAll(\PDO::FETCH_OBJ);
        $users = [];
        foreach ($rows as $row) {
            $user = new User();
            $user
            ->setId($row->id)
            ->setPseudo($row->pseudo)
            ->setPassword($row->password)  
            ->setCityId($row->city_id);

            $users[] = $user;
        }

        return $users;
    }

    public function getPassword($pseudo){
        $rows = $this->connection->query('SELECT * FROM "users";')->fetchAll(\PDO::FETCH_OBJ);
        foreach ($rows as $row){
            if($row->pseudo == $pseudo)
                return $row->password;
        }
    }

    public function insert($psd, $mdp, $city_id){
        return $rows = $this->connection->query('INSERT INTO "users"(pseudo, password,city_id) VALUES(\'".$psd."\', \'".$mdp."\', \'".$city_id."\');');
    }

    public function getUser($psd){
       $rows = $this->connection->query('SELECT * FROM "users" WHERE pseudo = \'".$psd."\';')->fetchAll(\PDO::FETCH_OBJ);
       $users = [];
       foreach ($rows as $row){
           $user = new User();
           $user
           ->setId($row->id)
           ->setPseudo($row->pseudo)
           ->setPassword($row->password)  
           ->setCityId($row->city_id);

           $users[] = $user;
       }
       return $users;
   }
 }




