
<div class="row">
    <?php if($ownProfil) { ?>
        <h2>C'est moi !</h2>
    <?php } else { ?>
        <h2>C'est <?php echo $profilUser->getName(); ?> !</h2>
    <?php } ?>
</div>