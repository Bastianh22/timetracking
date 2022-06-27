<html>
    <?php
        // affichage du menu
        include_once ('entete.php');
    ?>
        <div class="container">
            <center>
                <br>
                <br>
                <form action="envoie.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" pattern="^\D[A-z-]*$" placeholder="Nom*" required>
                            <div class="invalid-feedback">
                                Completer le champs
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="time" name="duree" step="600" required> <!-- 10 min step -->
                            <div class="invalid-feedback">
                                Completer le champs
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="page" value="creation">
                    <br>
                    <label>
                        Selectionner une date:
                        <input type="date" name="date" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                    </label>
                    <p><button>Créer</button></p>
                </form>
            </center>
        </div>
    </body>
</html>