<html>
    <?php
        // affichage du menu
        include_once ('entete.php');
    ?>
        <div class="container">
            <br><br>
            <center>
                <form action="" method="get">
                    <label>
                        Selectionner une date:
                        <input type="date" name="date">
                    </label>
                    <p><button>Rechercher</button></p>
                </form>
                <?php
                
                //recuperation du fichier qui contient les fonctions
                include_once('Fonctions.php');
                $fonction = new Fonctions();
                if($_GET['date']==NULL)
                {
                    echo "veuillez selectionner une date";
                }
                else
                {
                    $date="'".$_GET['date']."'";
                    // récupération du tableau des tâches en fonction de la date
                    $tabTaches= $fonction->get_tasks_list($date);
                    unset($fonction);
                    if(count($tabTaches)==0)
                    {
                        echo "aucune tâche à cette date";
                    }
                    else
                    {
                        echo $_GET['date'];
                        ?>
                        <table>
                            <tr>
                                <td>
                                    Nom de la tâche
                                </td>
                                <td>
                                    Durée de la tache
                                </td>
                                <td>
                                    Date de création
                                </td>
                                <td>
                                    Options
                                </td>
                            </tr>
                        <?php
                        for ($i=0; $i < count($tabTaches); $i++)
                        {

                            //affichage des éléments récuperer par la requête
                            echo "<tr><td>".$tabTaches[$i]->getName()."</td>";
                            echo "<td>".$tabTaches[$i]->getDuration()."</td>";
                            echo "<td>".$tabTaches[$i]->getDate()."</td>";
                            echo "<td><a href='edit_task.php?id=".$tabTaches[$i]->getTasks_id()."&name=".$tabTaches[$i]->getName()."&duree=".$tabTaches[$i]->getDuration()."&date=".$tabTaches[$i]->getDate()."'><input id='btn' type='button' value='modifier'></a>";
                            ?>
                            <form action="envoie.php" method="post">
                                <input type="hidden" name="page" value="supp">
                                <input type="hidden" name="task_id" value="<?php echo $tabTaches[$i]->getTasks_id();?>">
                                <button>Supprimer</button>
                            </form>
                            <?php
                            echo "</td></tr>";
                        }
                    }
                    ?>
                    </table>
                <?php
                }
                ?>
            </center>
        </div>
    </body>
</html>