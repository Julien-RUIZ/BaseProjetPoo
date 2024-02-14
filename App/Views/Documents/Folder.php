<nav>
    <ul>
        <!--Affichage liste des dossiers // FoldersController.php-->
        <?php if (isset($folders)  && isset($AjoutFolder) && isset($deleteFolder)): ?>
            <?php foreach ($folders as $folder): ?>
                    <li>
                        <div>
                            <a href="<?php echo URLBASE.'/Documents/'.$folder->numfolder ?>">
                                <div>D : <?php echo $folder->Titre ?></div>
                            </a>
                        </div>
                    </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <div class="mt-5">
        <?php echo $AjoutFolder ?>
    </div>
    <div class="mt-5">
        <?php echo $deleteFolder ?>
    </div>
</nav>
</div>
<div class="col-lg-10">
    <?php require_once MESSAGE_SESSION.'/SessionMessage.php' ?>
    <div>
        <?php if (empty($docs) && !isset($docsession)): ?>

            <h2 class="my-5">Merci de sélectionner un document</h2>

        <?php elseif (empty($docs) && isset($docsession)): ?>

            <h2 class="my-5"><?php echo $docsession['TitreDoc'] ?></h2>
            <p><?php echo $docsession['TextDoc'] ?></p>
            <p>Date de réalisation : <?php echo $docsession['DateOfWriting'] ?></p>
            <?php if($docsession['ModifDate'] != Null){
                echo '<p>Date de modification le '.$docsession['ModifDate'].'</p>';
            }?>
            <a  href="<?php echo URLBASE.'/Documents/'.$docsession['id_dossier'].'/'.$docsession['id_sousdossier'].'/'.$docsession['id_document'] ?>">
                <button class="mt-2">Indiquer le chemin sur le menu de gauche</button>
            </a>
        <?php endif; ?>
    </div>
</div>


