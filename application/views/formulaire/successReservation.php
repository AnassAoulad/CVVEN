
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
                    echo("OUI");
                }
                else{
                    echo("NON");
                }
            ?>
        </td>

        <td>
        <?php
            if ($row['etatreserv'] == NULL)
            {
                echo("EN COURS DE VALIDATION");
            }
           
        ?>
        </td>
    </tr>

    <?php } ?>
</table>

<br><br><a href="/projet_cvven/index.php/formulaire/monProfil">Retour à mon profil</a>


