<div class="container">
    <?php require_once MESSAGE_SESSION.'/SessionMessage.php' ?>
    <h1>Mon compte : Informations personnelles</h1>
        <div class="container-fluid GroupeInfoPerso">
            <div class="row justify-content-md-center">
                <div class="col-6"><strong>Nom : </strong></div><div class="col-6"><?php echo $data->Name; ?></div>
                <div class="col-6"><strong>Prénom : </strong></div><div class="col-6"><?php echo $data->FirstName; ?></div>
                <div class="col-6"><strong>E-mail : </strong></div><div class="col-6"><?php echo $data->Email; ?></div>
                <div class="col-6"><strong>Mot de passe : </strong></div><div class="col-6">*****</div>
                <div class="col-6"><strong>Date de naissance : </strong></div><div class="col-6"><?php echo $data->Birthday; ?></div>
                <div class="col-6"><strong>Adresse : </strong></div><div class="col-6"><?php echo $data->Address; ?></div>
                <div class="col-6"><strong>Code postal : </strong></div><div class="col-6"><?php echo $data->PostalCode; ?></div>
                <div class="col-6"><strong>Ville : </strong></div><div class="col-6"><?php echo $data->City; ?></div>
                <div class="col-6"><strong>Téléphone mobile : </strong></div><div class="col-6"><?php echo $data->Mobile; ?></div>
            </div>
            <div class="row my-5">
                <div class="col-6"><button><a href="<?php echo URLBASE.'/Users/Update' ?>">Modifier vos informations personnelles</a></button></div>
                <div class="col-6"><button><a href="<?php echo URLBASE.'/Users/UpdatePassword' ?>">Changer votre mot de passe</a></button></div>
            </div>
            <div>
                <div class="col-12 "><button><a href="<?php echo URLBASE.'/Users/ValidationDelete' ?>">Supprimer utilisateur</a></button></div>
            </div>
        </div>
</div>


