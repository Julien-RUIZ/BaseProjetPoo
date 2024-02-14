<nav>
    <ul>
        <!--Affichage liste des dossiers avec leurs contenus // SubfolderController.php-->
        <?php if (isset($folders) && isset($subfolders) && isset($documentsroot) && isset($id_dossier)): ?>
            <?php foreach ($folders as $folder): ?>
                <a href="<?php echo URLBASE.'/Documents/'.$folder->numfolder ?>">
                    <li>
                        <?php if ($id_dossier != $folder->Id): ?> <!-- condition si l'id dans l'url renvoyé par SubFoldersController/ChoiceOfSubfolders($id) est différent de l'id du dossier -->
                            <div>D : <?php echo $folder->Titre ?></div>
                        <?php else: ?> <!--S'il est identique retourne les sous dossier (subfolders) provenant du même controller-->
                            <div>
                                <a href="<?php echo URLBASE.'/Documents/' ?>">
                                    <div class="validFolder">D : <?php echo $folder->Titre ?></div><!--lien du dossier pour le retour a la racine-->
                                </a>
                            </div>
                            <!--lister les sous dossiers à récupérer en bdd-->
                            <ul>
                                <?php foreach ($subfolders as $subfolder): ?>
                                    <a href="<?php echo URLBASE.'/Documents/'.$subfolder->numfolder.'/'.$subfolder->numSubfolder ?>">
                                        <li>D : <?php echo $subfolder->nomSousdossier ?></li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>
                            <!--lister les sous dossiers à récupérer en bdd-->

                            <!--lister les documents à récupérer en bdd // ReadDocumentController.php -> 'Documents/id0/id1/id2' avec id1=0 car document dans dossier-->
                            <ul>
                                <?php foreach ($documentsroot as $documentroot): ?>

                                    <?php $id1 = 0 ?>
                                    <a href="<?php echo URLBASE.'/Documents/'.$documentroot->numfolder.'/'.$id1.'/'.$documentroot->numdocfolder ?>">
                                        <li>
                                            <div><?php echo $documentroot->TitreDoc ?></div>
                                        </li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>

                        <?php endif; ?>
                    </li>
                </a>
            <?php endforeach; ?>
        <?php endif;?>
        <!--Affichage liste des dossiers avec leurs contenus-->
    </ul>
</nav>
<p class="mt-5">Merci d'enregistrer le document avant utilisation des liens ci-dessus. Dans le cas contraire, toutes les données seront perdues.</p>
</div>

<div class="col-lg-10">
    <?php require_once MESSAGE_SESSION.'/SessionMessage.php' ?>
    <h1>Formulaire d'ajout de document</h1>
    <div>
        <?php echo $formAddDoc ?>
    </div>

</div>






