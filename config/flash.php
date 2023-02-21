<?php 

class Flash {
    private string $message;
    private string $type;

    /**
     * Méthode magique qui défini directement les paramètres à la nouvelle instanciation d'un message flash; 
     * @param mixed $message
     * @param mixed $type
     */
    public function __construct($message, $type)
    {
        session_start();
        $this->message = $message;
        $this->type = $type;

        $_SESSION['flash'] = $this->message;
    }

    /**
     * Méthode pour définir un message au flash 
     * @param string $message
     * 
     * @return [type]
     */
    public function setMessage(string $message){
        $this->message = $message;
    }

    /**
     * Méthode pour récupérer la valeur d'un message pour un flash
     * @return string
     */
    public function getMessage():string {
        return $this->message;
    }

    /**
     * Méthode pour définir un type pour un flash
     * @param string $type
     * 
     * @return [type]
     */
    public function setType(string $type) {
        $this->type = $type;
    }

    /**
     * Méthode pour récupérer le type d'un flash
     * @return string
     */
    public function getType():string {
        return $this->type;
    }


}