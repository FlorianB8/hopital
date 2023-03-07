<?php
require_once(__DIR__ . '/Connect.php');
class Patient
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $phone;
    private string $birthdate;

    /**
     * Méthode magique permettant d'assigner automatiquement les valeurs de la nouvelle instanciation d'un patient 
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $phone
     * @param string $birthdate
     */
    public function __construct()
    {
    }
    /**
     * Méthode magique permettant de gérer l'affichage d'un patient
     * @return [type]
     */
    public function __toString()
    {
        return "Prénom : $this->firstname <br> Nom : $this->lastname <br> Adresse mail : $this->email <br> Numéro de téléphone : $this->phone <br> Date de naissance : $this->birthdate";
    }

    /**
     * Méthode permettant de supprimer les rendez-vous d'un patient puis le patient de la bdd
     * @param int $id
     * 
     * @return array
     */
    public static function deletePatientAndAppointment(int $id):array
    {
        $db = dbConnect();
        $query =
            "DELETE FROM `appointments` WHERE `idPatients` IN (SELECT `id` FROM `patients` WHERE `patients`.`id` = :id);
        DELETE FROM `patients` WHERE `id` = :id;";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return  $sth->fetchAll();
    }
    /**
     * Méthode permettant de récupérer les données des rendez-vous pour un patient
     * @param int $id
     * 
     * @return array
     */
    public static function getAppointment(int $id):array
    {
        $db = dbConnect();
        $query =
            "SELECT `appointments` . `dateHour` 
        FROM `appointments` 
        LEFT JOIN `patients` 
        ON `appointments`.`idPatients` = `patients`.`id`
        WHERE `appointments`.`idPatients` = :id ;";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return  $sth->fetchAll();
    }
    /**
     * Récupère un patient 
     * @return object
     */
    public static function get(int $id):object|bool
    {
        $db = dbConnect();
        $query = "SELECT * FROM `patients` WHERE `id` = :id ;";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    /**
     * Méthode pour vérifier si l'id d'un patient existe
     * @param int $id
     * 
     * @return bool
     */
    public static function isIdExist(int $id):bool
    {
        $db = dbConnect();
        $verifQuery = "SELECT `id` FROM `patients` WHERE `id` = :id ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':id', $id, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetch();
        return !empty($result);

        // if (empty($result)) {
        //     return false;
        // } else {
        //     return true;
        // }

    }
    /**
     * Méthode pour récupérer l'ID
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * Méthode pour récupérer le lastname
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }
    /**
     * Méthode pour changer la valeur du lastname
     * @param mixed $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * Méthode pour récupérer le firstname
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    /**
     * Méthode pour changer la valeur du firstname
     * @param mixed $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * Méthode pour récupérer l'email
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * Méthode pour changer la valeur de l'email
     * @param mixed $email
     * 
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Méthode pour récupérer le numéro de tel
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    /**
     * Méthode pour changer la valeur du numéro de tel
     * @param mixed $phone
     * 
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Méthode pour récupérer la date de naissance
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
    /**
     * Méthode pour changer la valeur de la date de naissance
     * @param string $birthdate
     * 
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * Vérifie si un mail est déjà existant en bdd
     * @param string $mail
     * 
     * @return bool
     */
    public static function isMailExist(string $mail): bool
    {
        $db = dbConnect();
        $verifQuery = "SELECT `id` FROM `patients` WHERE `mail` = :mail ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':mail', $mail, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetchAll();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * Méthode pour créer un nouveau patient
     * @return void
     */
    public function add(): bool
    {
        $db = dbConnect();
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`,`phone`, `mail`) VALUES (:lastname,:firstname,:birthdate,:phone,:mail);';
        $sth = $db->prepare($query);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return !empty($result);
    }
    /**
     * Permet de récupérer tout les patients
     * @return array
     */
    public static function getAll($where = null):array
    {
        $query = 'SELECT * FROM `patients` '.$where.';';
        $db = dbConnect();
        $sth = $db->prepare($query);
        $sth->execute();

        $patients = $sth->fetchAll();

        return $patients;
    }

    /**
     * Modifie un patient dans la bdd
     * @return [type]
     */
    public function update(int $id):bool
    {
        $db = dbConnect();
        $query = "UPDATE `patients` 
        SET `lastname`=:lastname,
            `firstname`=:firstname,
            `birthdate`=:birthdate,
            `phone`=:phone,
            `mail`= :mail 
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result>0 ? true : false;
    }
}
