<div class="container">
    <?php require_once MESSAGE_SESSION.'/SessionMessage.php' ?>
</div>

<?php var_dump($data); ?>

<button><a href="<?php echo URLBASE.'/Users/Update' ?>">Modifier vos informations personnelles</a></button>
<button><a href="<?php echo URLBASE.'/Users/UpdatePassword' ?>">Changer votre mot de passe</a></button>
<?php foreach ($data as $value):?>
<?php //echo $value->Id; ?>
<?php endforeach; ?>
