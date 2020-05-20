<h2>Page d'inscription</h2>
<?php //echo validation_errors();?>   
<?php echo form_open('formulaire/create');?>

Nom
<input type='text' name='nom' value="" size="50" /><br>

Prénom 
<input type='text' name='prenom' value ="" size="50"/><br>

Adresse
<input type='text' name='adresse' value ="" size="50"/><br>

Numéro de téléphone
<input type='number' name='tel' value ="" size="50"/><br>

Email
<input type='email' name='mail' value ="" size="50"/><br>

Mot de passe
<input type='password' name='mdp' value ="" size="50"/><br><br>

Confirm Mot de passe
<input type='password' name='confirmMdp' value ="" size="50"/><br><br>

<input type="submit" value="Confirmer"/>





