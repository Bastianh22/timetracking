<html>
    <?php
        // affichage du menu
        include_once ('entete.php');
    ?>
        <div class="container">
            <center>
                <br>
                <br>
                <span id="titrebleu">
                    Modifier les informations de la tâche
                </span>
                
                <br><br>
                <form action="envoie.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" pattern="^\D[A-z-]*$" placeholder="<?php echo htmlspecialchars($_GET['name']);?>" required>
                            <div class="invalid-feedback">
                                Completer le champs
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="appt-time" type="time" name="duree" step="600" value="<?php echo htmlspecialchars($_GET['duree']);?>">
                            <div class="invalid-feedback">
                                Completer le champs
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="page" value="modifier">
                    <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($_GET['id']);?>">
                    <br>
                    <label>
                        Selectionner une date:
                        <input type="date" name="date" value="<?php echo htmlspecialchars($_GET['date']); ?>" required>
                    </label>
                    <p><button>Modifier</button></p>
                </form>
            </center>
        </div>
    </body>
</html>