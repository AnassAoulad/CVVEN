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
                echo form_open('formulaire/updateReservation'); 
                foreach($affichageInfo as $row) {
            ?>
                <th><?php echo "<input type='text' name='idclient' value='".$row['idclient']."' readonly />"; ?></th>
                <th><?php echo "<input type='text' name='idreserv' value='".$row['idreserv']."' readonly />"; ?></th>
                <th><?php echo "<input type='text' name='datereservation' value='".$row['datereservation']."' />";?></th>
                <th><?php echo "<input type='text' name='datevacances' value='".$row['datevacances']."' />"; ?></th>
                <th><?php echo "<input type='text' name='nbpersonnes' value='".$row['nbpersonnes']."' />";?></th>
                <th><?php echo "<input type='text' name='typepension' value='".$row['typepension']."' />"; ?></th>
                <?php if ($row['menagereservation']==true){ ?>
                    <th><?php echo "<input type='text' name=menagereservation'' value='true' />"; ?></th>
                <?php }
                    elseif ($row['menagereservation']==false){ ?>
                    <th><?php echo "<input type='text' name=menagereservation'' value='false' />"; ?></th>
                    <?php } ?>
                <th><?php echo "<input type='text' name='etatreserv' value='".$row['etatreserv']."' />"; ?></th>
                <th><?php echo "<input type='submit' value='Envoyer' />"; ?></th>
            
                <?php }
                    echo form_close(); 
                ?>
                    
        </tr>
    </table>