
            <nav>
                <ul>
                    <!--Affichage liste des dossiers // FoldersController.php-->
                    <?php if (isset($folders)  && isset($AjoutFolder) && isset($deleteFolder)): ?>

                            <?php foreach ($folders as $folder): ?>
                                <a href="<?php echo URLBASE.'/Documents/'.$folder->Id ?>">
                                    <li>
                                        <div>
                                            <a href="<?php echo URLBASE.'/Documents/'.$folder->Id ?>">
                                                <div>D : <?php echo $folder->Titre ?></div>
                                            </a>
                                        </div>
                                    </li>
                                </a>
                            <?php endforeach; ?>

                                <div class="mt-5">
                                    <?php echo $AjoutFolder ?>
                                </div>
                                <div class="mt-5">
                                    <?php echo $deleteFolder ?>
                                </div>

                    <!--Affichage liste des dossiers-->


                    <!--Affichage liste des dossiers avec leurs contenus // SubfolderController.php-->
                    <?php elseif (isset($folders) && isset($subfolders) && isset($documentsroot) && isset($id_dossier) && empty($id_sousdossier) && empty($documents) && empty($AjoutFolder) ): ?>

                            <?php foreach ($folders as $folder): ?>
                                <a href="<?php echo URLBASE.'/Documents/'.$folder->Id ?>">
                                    <li>
                                        <?php if ($id_dossier != $folder->Id): ?> <!-- condition si l'id dans l'url renvoyé par SubFoldersController/ChoiceOfSubfolders($id) est différent de l'id du dossier -->
                                            <div>D : <?php echo $folder->Titre ?></div>
                                        <?php else: ?> <!--S'il est identique retourne les sous dossier (subfolders) provenant du même controller-->
                                            <div>
                                                <a href="<?php echo URLBASE.'/Documents/' ?>">
                                                    <div>D : <?php echo $folder->Titre ?></div><!--lien du dossier pour le retour a la racine-->
                                                </a>
                                            </div>

                                            <!--lister les sous dossiers à récupérer en bdd-->
                                            <ul>
                                                <?php foreach ($subfolders as $subfolder): ?>
                                                    <a href="<?php echo URLBASE.'/Documents/'.$subfolder->idDossier.'/'.$subfolder->idSousdossier ?>">
                                                        <li>D : <?php echo $subfolder->nomSousdossier ?></li>
                                                    </a>
                                                <?php endforeach; ?>
                                            </ul>
                                            <!--lister les sous dossiers à récupérer en bdd-->

                                            <!--lister les documents à récupérer en bdd // ReadDocumentController.php -> 'Documents/id0/id1/id2' avec id1=0 car document dans dossier-->
                                            <ul>
                                                <?php foreach ($documentsroot as $documentroot): ?>

                                                <?php $id1 = 0 ?>
                                                    <a href="<?php echo URLBASE.'/Documents/'.$documentroot->idDossier.'/'.$id1.'/'.$documentroot->IdDoc ?>">
                                                        <li>
                                                            <div><?php echo $documentroot->TitreDoc ?></div>
                                                        </li>
                                                    </a>
                                                <?php endforeach; ?>
                                            </ul>
                                            <!--lister les documents à récupérer en bdd-->

                                            <div class="my-3">
                                                <form action="<?php echo URLBASE.'/Documents/'.$folder->Id ?>" method="post">
                                                    <label for="sousdossier">Ajouter un sous-dossier</label>
                                                    <input type="text" id="sousdossier" name="sousdossier" class='form-control'>
                                                    <input type="submit" value="Ok">
                                                </form>
                                            </div>

                                        <?php endif; ?>
                                    </li>
                                </a>
                            <?php endforeach; ?>

                    <?php endif;?>
                    <!--Affichage liste des dossiers avec leurs contenus-->


                    <!--Affichage liste des dossiers, des sous-dossiers avec leurs contenus // DocumentsController.php-->
                    <?php if (isset($id_dossier) && isset($subfolders) && isset($id_sousdossier) && isset($documents) && isset($folders) && empty($AjoutFolder)): ?>
                            <?php foreach ($folders as $folder): ?>
                                <a href="<?php echo URLBASE.'/Documents/'.$folder->Id ?>">
                                    <li>
                                        <?php if ($id_dossier != $folder->Id): ?> <!-- condition si l'id dans l'url est différent de l'id du dossier -->
                                            <div>D : <?php echo $folder->Titre ?></div>
                                        <?php else: ?> <!--S'il est identique retourne les sous dossier (subfolders) provenant du même controller-->
                                            <div>
                                                <a href="<?php echo URLBASE.'/Documents/' ?>">
                                                    <div>D : <?php echo $folder->Titre ?></div> <!--lien du dossier pour le retour a la racine-->
                                                </a>
                                            </div>
                                            <ul>
                                                <?php foreach ($subfolders as $subfolder): ?>
                                                    <a href="<?php echo URLBASE.'/Documents/'.$subfolder->idDossier.'/'.$subfolder->idSousdossier ?>">
                                                        <li>
                                                            <!-- condition si l'id dans l'url renvoyé par SubFoldersController/ChoiceOfSubfolders($id) est différent de l'id du dossier -->
                                                            <?php if ($id_sousdossier != $subfolder->idSousdossier): ?>
                                                                <div> D : <?php echo $subfolder->nomSousdossier ?></div>
                                                            <?php else: ?>
                                                                <div><a href="<?php echo URLBASE.'/Documents/'.$subfolder->idDossier ?>">
                                                                        D : <?php echo $subfolder->nomSousdossier ?><!--lien du sous-dossier pour le retour aau niveau du dossier-->
                                                                    </a></div>
                                                                <ul>
                                                                    <!--lister les documents à récupérer en bdd // ReadDocumentController.php -> 'Documents/id0/id1/id2' car document dans le sous-dossier-->
                                                                    <?php foreach ($documents as $document): ?>
                                                                        <a href="<?php echo URLBASE.'/Documents/'.$subfolder->idDossier.'/'.$subfolder->idSousdossier.'/'.$document->IdDoc ?>">
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
                                                        <a href="<?php echo URLBASE.'/Documents/'.$documentroot->idDossier.'/'.$id1.'/'.$documentroot->IdDoc ?>">
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

                    <?php else: ?>

                            <?php foreach ($docs as $doc): ?>
                                <h2 class="my-5"><?php echo $doc->TitreDoc ?></h2>
                                <p><?php echo $doc->TextDoc ?></p>
                                <p>Date de réalisation : <?php echo $doc->DateOfWriting ?></p>
                                <?php if($doc->ModifDate != Null){
                                    echo '<p>Date de modification le '.$doc->ModifDate.'</p>';
                                }?>
                            <a  href="<?php echo URLBASE.'/Documents/'?>">
                                <button class="mt-2">Modifier le document</button>
                            </a>
                            <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>

