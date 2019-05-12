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
        $rows = $this->connection->query('SELECT * FROM "user"')->fetchAll(\PDO::FETCH_OBJ);
        $users = [];
        foreach ($rows as $row) {
            $user = new User();
            $user
                ->setId($row->id)
                ->setPseudo($row->pseudo)
                ->setPassword($row->password)  
                ->setAddress($row->address)
                ->setCityId($row->city_id)
                ->setDescription($row->description);
                
            $users[] = $user;
        }

        return $users;
    }

    public function getPassword($pseudo){
        $rows = $this->connection->query('SELECT * FROM "user"')->fetchAll(\PDO::FETCH_OBJ);
        foreach ($rows as $row){
            if($row->pseudo == $pseudo)
            return $row->password;
        }
    }

    public insert($psd, $mdp, $city_id){
        return $rows = $this->connection->query('INSERT INTO users VALUES(default,$psd, $mdp, $city_id)');
    }

}
