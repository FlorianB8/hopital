<?php
require_once(__DIR__ . '/Connect.php');
require_once(__DIR__ . '/../models/Patient.php');

class Appointment
{
    private string $idPatients;
    private string $dateHour;

    /**
     * Méthode pour récupérer un rendez-vous de la table appointments
     * @return [type]
     */
    public static function get(int $id):object
    {
        $db = dbConnect();
        $query = 'SELECT * 
        FROM `appointments` 
        LEFT JOIN `patients` 
        ON `appointments`.`idPatients` = `patients`.`id`
        WHERE `appointments`.`idPatients` = :id ;';
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
    /**
     * Méthode pour récupérer tout les rendez-vous de la table appointments
     * @return [type]
     */
    public static function getAll():array
    {
        $query =
            'SELECT `appointments`.`idPatients`,`appointments`.`dateHour`, `appointments`.`id`, `patients`.`firstname`, `patients`.`lastname`, `patients`.`birthdate`, `patients`.`mail`, `patients`.`phone` 
        FROM `appointments` 
        LEFT JOIN `patients` 
        ON `appointments`.`idPatients` = `patients`.`id`;';
        $db = dbConnect();
        $sth = $db->query($query);
        $appointments = $sth->fetchAll();

        return $appointments;
    }
    /**
     * Méthode pour vérifier si la date est similaire dans la base de données
     * @param string $dateHour
     * 
     * @return [type]
     */
    public static function isDatehourExist(string $dateHour):bool
    {
        $db = dbConnect();
        $verifQuery = "SELECT `dateHour` FROM `appointments` WHERE `dateHour` = :dateHour ;";
        $verifDatehour = $db->prepare($verifQuery);
        $verifDatehour->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $verifDatehour->execute();
        $result = $verifDatehour->fetchAll();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public static function delete(int $idPatient, int $idAppointment):array
    {
        $query =
            'DELETE FROM `appointments` WHERE `appointments`.`idPatients` = :idPatient AND `appointments`.`id` = :idAppointment ;';
        $db = dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
        $sth->bindValue(':idAppointment', $idAppointment, PDO::PARAM_INT);
        $sth->execute();
        $appointments = $sth->fetchAll();

        return $appointments;
    }
    /**
     * Méthode pour ajouter un nouveau rendez vous dans la base de données
     * @return [type]
     */
    public function add():bool
    {
        $db = dbConnect();
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour,:idPatients);';
        $sth = $db->prepare($query);
        $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        return $sth->execute();
    }

    public function  update(int $id){
        $db = dbConnect();
        $query = "UPDATE `appointments` 
        SET `dateHour`=:dateHour,
            `idPatients`=:idPatients
        WHERE `idPatients` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result>0 ? true : false;
    }
    /**
     * Méthode pour définir une valeur à dateHour d'un rendez vous
     * @param string $dateHour
     * 
     * @return void
     */
    public function setDateHour(string $dateHour): void
    {
        $this->dateHour = $dateHour;
    }
    /**
     * Méthode pour récupérer la dateHour d'un rendez vous
     * @return string
     */
    public function getDateHour(): string
    {
        return $this->dateHour;
    }

    /**
     * Méthode pour récupérer l'ID du patient d'un rendez vous 
     * @param string $idPatient
     * 
     * @return void
     */
    public function setidPatient(string $idPatient): void
    {
        $this->idPatients = $idPatient;
    }
    /**
     * Méthode pour définir l'ID du patient d'un rendez vous 
     * @return string
     */
    public function getidPatient(): string
    {
        return $this->idPatients;
    }
}
