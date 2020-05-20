<h1> <?php echo "$titre (Client n° $num)"; ?> </h1>

<?php foreach($reservation as $reservation_item);?>

<h3><?php echo $reservation_item['idReserv'];?></h3>
<div class="main">
        <?php echo $reservation_item['dateArrivee'];?>
</div>

<?phpendforeach; ?>
