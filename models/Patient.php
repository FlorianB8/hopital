<?php
require_once(__DIR__.'/Connect.php');
class Patient
{
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $phonenumber;
    private string $birthdate;

    /**
     * Méthode magique permettant d'assigner automatiquement les valeurs de la nouvelle instanciation d'un patient 
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $phonenumber
     * @param string $birthdate
     */
    public function __construct(string $lastname, string $firstname, string $email, string $phonenumber, string $birthdate)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->birthdate = $birthdate;
    }
    /**
     * Méthode magique permettant de gérer l'affichage d'un patient
     * @return [type]
     */
    public function __toString()
    {
        return "Prénom : $this->firstname <br> Nom : $this->lastname <br> Adresse mail : $this->email <br> Numéro de téléphone : $this->phonenumber <br> Date de naissance : $this->birthdate";
    }

    public function addPatient(){
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `mail`, `phone`, `birthdate` ) VALUES (\':lastname\',\':firstname\',\':mail\',\':phone\',\':birthdate\');';
        $db = dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->phonenumber, PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $sth->execute();
    }

    /**
     * Méthode pour récupérer le lastname
     * @return string
     */
    public function getLastname():string
    {
        return $this->lastname;
    }
    /**
     * Méthode pour changer la valeur du lastname
     * @param mixed $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname):void
    {
        $this->lastname = $lastname;
    }

    /**
     * Méthode pour récupérer le firstname
     * @return string
     */
    public function getFirstname():string
    {
        return $this->firstname;
    }
    /**
     * Méthode pour changer la valeur du firstname
     * @param mixed $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname):void
    {
        $this->lastname = $firstname;
    }

    /**
     * Méthode pour récupérer l'email
     * @return string
     */
    public function getEmail():string
    {
        return $this->email;
    }
    /**
     * Méthode pour changer la valeur de l'email
     * @param mixed $email
     * 
     * @return void
     */
    public function setEmail(string $email):void
    {
        $this->email = $email;
    }

    /**
     * Méthode pour récupérer le numéro de tel
     * @return string
     */
    public function getPhonenumber():string
    {
        return $this->phonenumber;
    }
    /**
     * Méthode pour changer la valeur du numéro de tel
     * @param mixed $phonenumber
     * 
     * @return void
     */
    public function setPhonenumber(string $phonenumber):void
    {
        $this->phonenumber = $phonenumber;
    }
    
    /**
     * Méthode pour récupérer la date de naissance
     * @return string
     */
    public function getBirthdate():string
    {
        return $this->birthdate;
    }
    /**
     * Méthode pour changer la valeur de la date de naissance
     * @param string $birthdate
     * 
     * @return void
     */
    public function setBirthdate(string $birthdate):void
    {
        $this->birthdate = $birthdate;
    }
}
