
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo URLBASE ?>">Baseprojetpoo</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URLBASE ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLBASE.'/soft' ?>">Soft</a>
                </li>
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


