<html>

    <h2><?php echo "formulaire"; ?></h2>
    
    <?php echo validation_errors(); ?>
    
    <?php echo form_open('Formulaire/formulaireReservation'); ?>
        <label> Nombre de personne : </label><input type="number" min="1" name="nbpersonnes"/><br>
        
        
        <label>Vous souhaitez partir :</label><br />
        <select name="datevacances">
            <optgroup label="Vacance Toussaint">
                <option value="19/10-26/10">Du 19 Octobre au 26 Octobre</option>19/06-26/06
                <option value="26/10-02/11">Du 26 Octobre au 02 Novembre</option>
            </optgroup>
            
            <optgroup label="Vacance Noël">
                <option value="21/12-28/12">Du 21 Décembre au 28 Décembre</option>
                <option value="28/12-04/01">Du 28 Décembre au 04 Janvier</option>
            </optgroup>
            
            <optgroup label="Vacance Hiver">
                <option value="08/02-15/02">Du 08 Février au 15 Février</option>
                <option value="15/02-22/02">Du 15 Février au 22 Février</option>
            </optgroup>
            
            <optgroup label="Vacance Printemps">
                <option value="04/04-11/04">Du 04 Avril au 11 Avril</option>
                <option value="11/04-18/04">Du 11 Avril au 18 Avril</option>
            </optgroup>
            
            <optgroup label="Vacance Été">
                <option value="04/07-11/07">Du 04 Juillet au 11 Juillet</option>
                <option value="11/07-18/07">Du 11 Juillet au 18 Juillet</option>
                <option value="18/07-25/07">Du 18 Juillet au 25 Juillet</option>
                <option value="25/07-01/08">Du 25 Juillet au 01 Août</option>
                <option value="01/08-08/08">Du 01 Août au 08 Août</option>
                <option value="15/08-22/08">Du 15 Août au 22 Août</option>
                <option value="22/08-29/08">Du 22 Août au 29 Août</option>
            </optgroup>
        </select>
         
        <br><p>Type de restauration :</p>
        <input type="radio" name="typepension" value="Pension Complete"/><label>Pension Complete</label><br>
        <input type="radio" name="typepension" value="Demi-pension"/><label>Demi-Pension</label><br>
        
        <br><p>Menage fin sejour :</p>
        <input type="radio" name="menagereservation" value="0"/><label>Non</label><br>
        <input type="radio" name="menagereservation" value="1"/><label>Oui</label><br>
        <input type="submit" value="Envoyer"/><br>
        
    <?php echo form_close(); ?>
    
</html>

