
<nav>
    <ul>

        <!--Affichage liste des dossiers, des sous-dossiers avec leurs contenus // DocumentsController.php-->
        <?php if (isset($id_dossier) && isset($subfolders) && isset($id_sousdossier) && isset($documents) && isset($folders)): ?>
            <?php foreach ($folders as $folder): ?>
                <a href="<?php echo URLBASE.'/Documents/'.$folder->numfolder ?>">
                    <li>
                        <?php if ($id_dossier != $folder->Id): ?> <!-- condition si l'id dans l'url est différent de l'id du dossier -->
                            <div>D : <?php echo $folder->Titre ?></div>
                        <?php else: ?> <!--S'il est identique retourne les sous dossier (subfolders) provenant du même controller-->
                            <div>
                                <a href="<?php echo URLBASE.'/Documents/' ?>">
                                    <div class="validFolder">D : <?php echo $folder->Titre ?></div> <!--lien du dossier pour le retour a la racine-->
                                </a>
                            </div>
                            <ul>
                                <?php foreach ($subfolders as $subfolder): ?>
                                    <a href="<?php echo URLBASE.'/Documents/'.$subfolder->numfolder.'/'.$subfolder->numSubfolder ?>">
                                        <li>
                                            <!-- condition si l'id dans l'url renvoyé par SubFoldersController/ChoiceOfSubfolders($id) est différent de l'id du dossier -->
                                            <?php if ($id_sousdossier != $subfolder->idSousdossier): ?>
                                                <div> D : <?php echo $subfolder->nomSousdossier ?></div>
                                            <?php else: ?>
                                                <a href="<?php echo URLBASE.'/Documents/'.$subfolder->idDossier ?>">
                                                    <div class="validSubfolder">D : <?php echo $subfolder->nomSousdossier ?></div><!--lien du sous-dossier pour le retour aau niveau du dossier-->
                                                </a>
                                                <ul>
                                                    <!--lister les documents à récupérer en bdd // ReadDocumentController.php -> 'Documents/id0/id1/id2' car document dans le sous-dossier-->
                                                    <?php foreach ($documents as $document): ?>
                                                        <a href="<?php echo URLBASE.'/Documents/'.$subfolder->numfolder.'/'.$subfolder->numSubfolder.'/'.$document->numdocfolder ?>">
                                                            <li>
                                                                <div><?php echo $document->TitreDoc ?><div>
                                                            </li>
                                                        </a>
                                                    <?php endforeach; ?>
                                                    <!--lister les documents à récupérer en bdd // ReadDocumentController.php-->
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>
                            <?php if (isset($documentsroot)): ?>
                                <!--lister les documents à récupérer en bdd-->
                                <ul>
                                    <?php foreach ($documentsroot as $documentroot): ?>
                                        <?php $id1 = 0 ?>
                                        <a href="<?php echo URLBASE.'/Documents/'.$documentroot->numfolder.'/'.$id1.'/'.$documentroot->numdocfolder  ?>">
                                            <li>
                                                <div><?php echo $documentroot->TitreDoc ?></div>
                                            </li>
                                        </a>
                                    <?php endforeach; ?>
                                </ul>
                                <!--lister les documents à récupérer en bdd-->
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                </a>
            <?php endforeach; ?>
        <?php endif;?>
        <!--Affichage liste des dossiers, des sous-dossiers avec leurs contenus-->
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


