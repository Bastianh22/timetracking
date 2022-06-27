<?php

// liste des méthodes :

// __construct() : le constructeur crée la connexion $cnx à la base de données
// __destruct() : le destructeur ferme la connexion $cnx à la base de données
// getTache() : retourne toutes les tâches à la date indiquée

// inclusion des paramètres de l'application et de la classe Course
include_once ('config.php');
include_once ('Tache.php');

// début de la classe DAO (Data Access Object)
class Fonctions
{
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Membres privés de la classe ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    private $cnx;				// la connexion à la base de données
    
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Constructeur et destructeur ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    function __construct()
    {
        global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
        try
        {	$this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD,
            $PARAM_USER,
            $PARAM_PWD);
        return true;
        }
        catch (Exception $ex)
        {
            echo ("Echec de la connexion a la base de donnees <br>");
            echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
            echo ("PARAM_HOTE = " . $PARAM_HOTE);
            return false;
        }
    }
    
    function __destruct()
    {
        // ferme la connexion à MySQL :
        unset($this->cnx);
    }
   
    // retourne le calendrier des courses sous forme de tableau d'objets
    function get_tasks_list($date)
    {
        // Tableau des Tâches
        $lesTaches = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "SELECT task_id, name, duration, date FROM tasks where date =" .$date;

        $req = $this->cnx->prepare($txt_req);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
        
            // création d'un objet Course (encodage pour la sécurité)
            $task_id = utf8_encode($uneLigne->task_id);
            $unNom = utf8_encode($uneLigne->name);
            $uneDuree = utf8_encode($uneLigne->duration);
            $uneDate = utf8_encode($uneLigne->date);
             
            $uneTache = new Tache($task_id,$unNom, $uneDuree, $uneDate);
            $lesTaches[$i] = $uneTache;
            $i++;
        }
        return $lesTaches;
    }
    
    function create_task($name, $duration, $date): void 
    {
        $txt_req = "insert into tasks (name, duration, date) values ('".$name."', '".$duration."', '".$date."')";
        $req = $this->cnx->prepare($txt_req);
        $req -> execute();
    }
    
    
    function edit_task($task_id, $name, $duration, $date): void 
    {
        $txt_req = "UPDATE tasks SET name=?, duration=?, date=? WHERE task_id=?";
        $stmt= $this->cnx->prepare($txt_req);
        $stmt->execute([$name, $duration, $date, $task_id]);
    }
    
    function delete_task($id)
    {
        $txt_req = "DELETE FROM tasks WHERE task_id=?";
        $stmt= $this->cnx->prepare($txt_req);
        $stmt->execute([$id]);
    }
}