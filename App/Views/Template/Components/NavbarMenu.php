<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light row">
        <div class="col-2">
            <a class="navbar-brand" href="<?php echo URLBASE ?>">Baseprojetpoo</a>
        </div>

        <div class="collapse navbar-collapse col-10" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <?php if(empty($_SESSION['Id'])): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo URLBASE ?>">Home</a>
                    </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['Id'])): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo URLBASE ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLBASE.'/soft' ?>">Soft</a>
                    </li>
                <?php endif; ?>

            </ul>
            <ul class="navbar-nav mr-auto">
                <?php if(empty($_SESSION['Id'])): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URLBASE.'/Users/Login' ?>">Connexion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URLBASE.'/Users/Registration' ?>">Inscription</a>
                        </li>
                <?php endif; ?>
                <?php if(!empty($_SESSION['Id'])): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URLBASE.'/Users/Account' ?>">Bonjour <?php echo $_SESSION['FirstName'] ?></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URLBASE.'/Users/Logout' ?>">Déconnexion</a>
                        </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>

