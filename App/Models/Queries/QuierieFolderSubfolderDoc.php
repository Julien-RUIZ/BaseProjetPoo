<?php

const SQLFOLDER = '
        SELECT users.Name, 
               folders.Titre,
               folders.Id
        FROM folders JOIN `users`
        WHERE users.Id=folders.users_id
        AND users.id = :user_id;

    ';
const SQLSUBFOLDER = '
        SELECT 
        folders.Id as idDossier,
        folders.Titre as nomDossier,
        subfolders.Id as idSousdossier,
        subfolders.Titre as nomSousdossier
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id
    ';

const SQLDOCUMENTSSUBFOLDER = '
        SELECT
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        subfolders.Id AS IdSousdossier,
        subfolders.Titre AS NomSousdossier
        FROM documents
        JOIN subfolders ON subfolders.Id = documents.subfolders_id
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND subfolders.Id = :id1
    ';

const SQLDOCUMENTSUBFOLDER = '
        SELECT
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        documents.Text AS TextDoc,
        documents.DateOfWriting,
        documents.ModifDate
        FROM documents
        JOIN subfolders ON subfolders.Id = documents.subfolders_id
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND subfolders.Id = :id1
        AND documents.Id = :id2
    ';

const SQLDOCUMENTFOLDER = '
        SELECT
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        documents.Text AS TextDoc,
        documents.DateOfWriting,
        documents.ModifDate
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND documents.Id = :id2
    ';

const SQLLISTEDOCFOLDER = '
        SELECT
        folders.Id as idDossier,
        folders.Titre as nomDossier, 
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :id
    ';