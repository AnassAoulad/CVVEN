<?php
    echo ("Réservations à validé : ");?><br><br>
    <h1>Page gestionAdmin</h1>
   
    
    <table style="border:solid 1px black">
        <tr>
            <th>idclient</th>
            <th>idreserv</th>
            <th>date reservation</th>
            <th>date vacances</th>
            <th>Nombre personne</th>
            <th>Type Pension</th>
            <th>menage</th>
            <th>Etat réservation</th>
            <th> </th>
        </tr>
        <tr>
            <?php 
                echo form_open('formulaire/enregistrement'); 
                foreach($affichageInfo as $row) {
            ?>
                <th><?php echo "<input type='text' name='idclient' value='".$row['idclient']."' readonly />"; ?></th>
                <th><?php echo "<input type='text' name='idreserv' value='".$row['idreserv']."' readonly />"; ?></th>
                <th><?php echo "<input type='text' name='datereservation' value='".$row['datereservation']."' readonly />";?></th>
                <th><?php echo "<input type='text' name='datevacances' value='".$row['datevacances']."' readonly />"; ?></th>
                <th><?php echo "<input type='text' name='nbpersonnes' value='".$row['nbpersonnes']."' readonly />";?></th>
                <th><?php echo "<input type='text' name='typepension' value='".$row['typepension']."' readonly />"; ?></th>
                <?php if ($row['menagereservation']==true){ ?>
                    <th><?php echo "<input type='text' name=menagereservation'' value='true' readonly />"; ?></th>
                <?php }
                    elseif ($row['menagereservation']==false){ ?>
                    <th><?php echo "<input type='text' name=menagereservation'' value='false' readonly />"; ?></th>
                    <?php } ?>
                <th><?php echo "<input type='text' name='etatreserv' value='".$row['etatreserv']."' readonly />"; ?></th>
                <th><?php echo "<input type='submit' value='Envoyer' />"; ?></th>
            
                <?php }
                    echo form_close(); 
                ?>
                    
        </tr>
    </table>