<?php
    // affichage du menu
    include_once ('entete.php');
    
    if(htmlspecialchars($_POST['page']=="creation"))
    {
        include_once('Fonctions.php');
        $fonction = new Fonctions();
        $fonction->create_task(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['duree']), htmlspecialchars($_POST['date']));
        unset($fonction);
        echo "<center>vous venez de créer une tâche</center>";
        header('Refresh: 5; index.php');
    }
    if(htmlspecialchars($_POST['page']=='modifier'))
    {
        include_once('Fonctions.php');
        $fonction = new Fonctions();
        $fonction->edit_task(htmlspecialchars($_POST['task_id']),htmlspecialchars($_POST['name']), htmlspecialchars($_POST['duree']), htmlspecialchars($_POST['date']));
        unset($fonction);
        echo "<center>vous venez de modifier une tâche</center>";
        header('Refresh: 5; index.php');
    }
    if(htmlspecialchars($_POST['page']=='supp'))
    {
        include_once('Fonctions.php');
        $fonction = new Fonctions();
        $fonction->delete_task(htmlspecialchars($_POST['task_id']));
        unset($fonction);
        echo "<center>vous venez de supprimer une tâche</center>";
        header('Refresh: 5; index.php');
    }

