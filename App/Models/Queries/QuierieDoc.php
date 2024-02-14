<?php
const SQLDOCUMENTSSUBFOLDER = '
        SELECT
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        documents.num_document as numdocfolder,
        subfolders.Id AS IdSousdossier,
        subfolders.Titre AS NomSousdossier,
        subfolders.num_subfolder as numsubfolder
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
        documents.ModifDate,
        folders.Id As IdFolder,
        subfolders.Id As IdSubfolder
        FROM documents
        JOIN subfolders ON subfolders.Id = documents.subfolders_id
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND subfolders.Id = :id1
        AND documents.Id = :id2
    ';

const SQLIDDOCSUBFOLDERWHITHNUM = '
        SELECT
        documents.Id 
        FROM documents
        JOIN subfolders ON subfolders.Id = documents.subfolders_id
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :idPrimFolder
        AND subfolders.Id = :idPrimSubfolder
        AND documents.num_document = :numDocSubfolder
    ';

const SQLIDDOCFOLDERWHITHNUM = '
        SELECT
        documents.Id
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :idPrimFolder
        AND documents.num_document = :numDocfolder
    ';

const SQLLISTEDOCFOLDER = '
        SELECT
        folders.Id as idDossier,
        folders.Titre as nomDossier,
        folders.num_folder as numfolder,
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        documents.num_document as numdocfolder
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :id
    ';

const SQLDOCUMENTFOLDER = '
        SELECT
        documents.Id AS IdDoc,
        documents.Title AS TitreDoc,
        documents.Text AS TextDoc,
        documents.DateOfWriting,
        documents.ModifDate,
        folders.Id As IdFolder 
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND documents.Id = :id2
    ';

const SQLADDDOCUMENTFOLDER = 'INSERT INTO documents
    (documents.Title, documents.Text, documents.DateOfWriting,documents.num_document, documents.ModifDate , documents.subfolders_id, documents.folders_id)
    VALUES 
    (:title,:text,:date, :numdocfolder ,Null,Null,:idFolder)';

const SQLADDDOCUMENTSUBFOLDER = 'INSERT INTO documents
    (documents.Title, documents.Text, documents.DateOfWriting, documents.num_document, documents.ModifDate , documents.subfolders_id, documents.folders_id)
    VALUES 
    (:title,:text,:date, :numdocfolder, Null,:idsubfolder,Null)';

const SQLDELETEDOCSUBFOLDER ='DELETE 
FROM `documents` 
WHERE documents.subfolders_id = :idsubfolder
AND documents.Id = :iddoc';

const SQLDELETEDOCFOLDER ='DELETE 
FROM `documents` 
WHERE documents.folders_id = :idfolder
AND documents.Id = :iddoc';