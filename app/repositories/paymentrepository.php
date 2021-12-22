<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../model/user.php';

class PaymentRepository extends Repository
{

    public function getUser($userEmail)
    {
        try {
            
            $sqlquery = 'SELECT * FROM users WHERE email=:email';
            $stmt = $this->connection->prepare($sqlquery);

            // bind params to stmt
            $stmt->bindParam(':email', $userEmail);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

            $stmt->execute();
            $user = $stmt->fetch();
            
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
