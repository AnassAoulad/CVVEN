<html>
    <h1>Page d'accueil Admin</h1>
    
    <a href="/projet_cvven/index.php/formulaire/deconnexion">Se déconnecter</a><br/><br/>
    
    <button><a href="../formulaire/gestionProfil">ajouter/supprimer des reservations</a></button><br/><br/>
    <?php 
        echo form_open('formulaire/modifReservation');
        echo "Selectionner l'id de la reservation à modifier <input type='number' min='1' name='idreservAccepter'/>";
        echo "<input type='submit' value='Envoyer'/>";
        echo form_close();
    ?>
</html>