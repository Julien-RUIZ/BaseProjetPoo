<?php
const SQLFOLDER = '
        SELECT users.Name, 
               folders.Titre,
               folders.Id,
               folders.num_folder as numfolder
        FROM folders JOIN `users`
        WHERE users.Id=folders.users_id
        AND users.id = :user_id';
const SQLLISTEFOLDERNAME = '
        SELECT folders.Titre
        FROM folders JOIN `users`
        WHERE users.Id=folders.users_id
        AND users.id = :user_id';

const SQLADDFOLDER ='
        INSERT INTO folders (folders.Titre,folders.num_folder, folders.users_id)
        VALUES (:nomDossier, :numfolder,  :user_id)';

const SQLIDFOLDER = 'SELECT
               folders.Id
        FROM folders JOIN `users`
        WHERE users.Id=folders.users_id
        AND users.id = :user_id
        AND folders.Titre = :folder_name ';
const SQLIDFOLDERWHITHNUM = '
        SELECT folders.Id
        FROM folders 
        JOIN users on users.Id=folders.users_id
        WHERE users.id = :user_id
        AND folders.num_folder = :idnumFolder ';

const SQLSEARCHSUBFOLDER = 'SELECT 
        subfolders.Titre as nomSousdossier
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id= :folder_id' ;

const SQLSEARCHDOC = '
        SELECT
        documents.Title AS TitreDoc
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id= :folder_id' ;

const SQLDELETEFOLDER = '
                    DELETE FROM folders
                    WHERE folders.Id = :folder_id' ;

const SQLNAMEFOLDERBYUPDATE = '
        SELECT folders.Titre
        FROM folders 
        JOIN `users` on users.Id=folders.users_id
        WHERE users.id = :user_id
        AND folders.Id = :folder_id';

const SQLUPDATEFOLDER = '
        UPDATE folders
        set folders.Titre = :UpdateName
        WHERE id = :id
        AND users_id = :user_id';

