<h1>Page gestionAdmin</h1>
    
<a href="../formulaire/homeAdmin">Accueil</a><br><br>
<a href="/projet_cvven/index.php/formulaire/deconnexion">Se déconnecter</a><br/><br/>

    <?php 
        echo form_open('formulaire/validerRecupReservation');
        echo "Accepter : selectionner l'id de la reservation <input type='number' min='1' name='idreservAccepter'/><br>";
        echo "<input type='submit' value='Envoyer'/>";
        echo form_close();
        
        echo form_open('formulaire/refuserRecupReservation');
        echo "Refuser : selectionner l'id de la reservation <input type='number' min='1' name='idreservRefuser'/><br>";
        echo "<input type='submit' value='Envoyer'/>";
        echo form_close();
    ?>
    
    <table style="border:solid 1px black">
        <tr>
            <th>idreserv</th>
            <th>Nom</th>
            <th>Date réservation</th>
            <th>Nombre personne</th>
            <th>Type Pension</th>
            <th>menage</th>
            <th>Etat réservation</th>
        </tr>

        <?php foreach($dataGestion as $row){ ?>
        <tr> 
            <?php if ($row['etatreserv'] != "valide" || $row['etatreserv'] != "invalide") {?>
            <td> <?php echo $row['idreserv']; ?> </td>
            <td> <?php echo $row['idclient']; ?></td>
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
            <?php echo("EN COURS DE VALIDATION")?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>