<?php
const SQLSUBFOLDER = '
        SELECT 
        folders.Id as idDossier,
        folders.Titre as nomDossier,
        folders.num_folder as numfolder,
        subfolders.Id as idSousdossier,
        subfolders.Titre as nomSousdossier,
        subfolders.num_subfolder as numSubfolder
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id
    ';

const SQLIDSUBFOLDERWHITHNUM = '
        SELECT 
        subfolders.Id
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :PrimaryIdfolder
        AND subfolders.num_subfolder = :numSubFolder
    ';

const SQLLISTENAMESUBFOLDER = '
        SELECT 
        subfolders.Titre as nomSousdossier
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id
    ';
const SQLIDNAMESUBFOLDER = '
        SELECT 
         subfolders.Id
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id
        AND subfolders.Titre = :namesub
    ';
const SQLADDSUBFOLDER='
        INSERT INTO subfolders (subfolders.Titre,subfolders.num_subfolder, subfolders.folders_id)
        VALUES (:subfolderName,:numunused,  :id)' ;

const SQLDELETESUBFOLDER = 'DELETE FROM subfolders WHERE subfolders.Id = :id';

