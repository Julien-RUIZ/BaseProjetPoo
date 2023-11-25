<?php if(!empty($_SESSION['validation'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['validation']; unset($_SESSION['validation']); ?>
    </div>
<?php endif; ?>

<?php if(!empty($_SESSION['erreur'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
    </div>
<?php endif; ?>

<?php if(!empty($_SESSION['info'])): ?>
    <div class="alert alert-info" role="alert">
        <?php echo $_SESSION['info']; unset($_SESSION['info']); ?>
    </div>
<?php endif; ?>


