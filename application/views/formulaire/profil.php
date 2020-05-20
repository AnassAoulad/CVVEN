<?php 
echo ("Mes réservations : ");?><br><br>

<table stylesheet="border=solid 1px black">
    <tr>
        <th>N°</th>
        <th>Date réservation</th>
        <th>Nombre personne</th>
        <th>Type Pension</th>
        <th>menage</th>
        <th>Etat réservation</th>
    </tr>

    
    
    
    <?php foreach($dataReservation as $row){ ?>
    <tr>
        <td> <?php echo $row['idreserv']; ?> </td>
        <td> <?php echo $row['datevacances']; ?> </td>
        <td> <?php echo $row['nbpersonnes']; ?> </td>
        <td> <?php echo $row['typepension']; ?> </td>
        <td>
            <?php
                if($row['menagereservation'] == true){
                    echo("Oui");
                }
                else{
                    echo("Non");
                }
            ?>
        </td>

        <td>
        <?php
            if ($row['etatreserv'] != "valide")
            {
                echo("EN COURS DE VALIDATION");
            }
           
        ?>
        </td>
    </tr>

    <?php }
    foreach($ReservConfirmer as $each){
    ?>
    <tr>
        <td> <?php echo $each['idreserv']; ?> </td>
        <td> <?php echo $each['datevacances']; ?> </td>
        <td> <?php echo $each['nbpersonnes']; ?> </td>
        <td> <?php echo $each['typepension']; ?> </td>
        <?php if ($each['menagereservation'] == true){?>
            <td>Oui</td>
        <?php } 
        else { ?>
            <td>Non</td>
        <?php } ?>
            
        <td> <?php echo $each['etatreserv'] ?></td>
    </tr>
    
    <?php } ?>
</table>

<br><br><a href="/projet_cvven/index.php/formulaire/formulaireReservation">Réserver des vacances</a><br><br>

<a href="/projet_cvven/index.php/formulaire/modifierPassword">Changer le mot de passe</a><br><br>

<a href="/projet_cvven/index.php/formulaire/deconnexion">Se déconnecter</a>






