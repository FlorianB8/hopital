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

    public function getSingle()
    {
        $db = dbConnect();
        $id = $_GET['id'];
        $query = "SELECT * FROM `patients` WHERE `id` = $id ;";
        $sth = $db->query($query);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $this->lastname = $result[0]->lastname;
        $this->firstname = $result[0]->firstname;
        $this->email = $result[0]->mail;
        $this->birthdate = $result[0]->birthdate;
        $this->phone = $result[0]->phone;
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

    public static function isMailExist(string $mail): bool
    {
        $db = dbConnect();
        $verifQuery = "SELECT `id` FROM `patients` WHERE `mail` = :mail ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':mail', $mail, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetchAll(PDO::FETCH_OBJ);
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
        if ($this->isMailExist($this->email) == false) {
            $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`,`phone`, `mail`) VALUES (:lastname,:firstname,:birthdate,:phone,:mail);';
            $sth = $db->prepare($query);
            $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->email, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
            return $sth->execute();
        } else {
            return false;
        }
    }
    public static function getAll()
    {
        $query = 'SELECT * FROM `patients`;';
        $db = dbConnect();
        $sth = $db->query($query);
        $patients = $sth->fetchAll(PDO::FETCH_OBJ);

        return $patients;
    }

    public function modify()
    {
        $id = $_GET['id'];
        $mail = $_GET['mail'];
        $db = dbConnect();
        $verifQuery = "SELECT `mail` FROM `patients` WHERE `mail` = '$this->email' ;";

        $verifEmail = $db->query($verifQuery);
        $resultEmail = $verifEmail->fetch(PDO::FETCH_ASSOC);
        if ($mail != $resultEmail['mail'] && $resultEmail['mail'] <> "") {
            $query = "UPDATE `patients` SET `lastname`='$this->lastname',`firstname`='$this->firstname',`birthdate`='$this->birthdate',`phone`='$this->phone',`mail`='$this->email' WHERE `id` = $id";
            $sth = $db->prepare($query);
            return $sth->execute();
        } else {
            return false;
        }
    }
}
