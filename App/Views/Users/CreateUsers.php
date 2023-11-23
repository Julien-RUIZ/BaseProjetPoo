

<h1>Formulaire d'inscription</h1>
<div class="container">
    <?php if(!empty($_SESSION['erreur'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
        </div>
    <?php endif; ?>
    <?php echo $form ?>
</div>