



<div class="container">
    <h1 class="mb-5">Demande de suppression d'un utilisateur</h1>
    <?php require_once MESSAGE_SESSION.'/SessionMessage.php' ?>
    <div class="row ">
        <div class="validationDelete mb-5"><?php echo $validation ?></div>
        <div class="validationDelete">
            <button type="button" class="btn btn-danger"><a href="<?php echo URLBASE."/Users/Delete" ?>">Oui</a></button>
            <button type="button" class="btn btn-success"><a href="<?php echo URLBASE."/Users/Account" ?>">Non</a></button>
        </div>
    </div>


</div>
