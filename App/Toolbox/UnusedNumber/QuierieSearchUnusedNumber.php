<?php

const SQL_SEARCH_UNUSED_NUMBER_FOLDER= '
        SELECT 
            folders.num_folder
        FROM folders JOIN users
        WHERE users.Id = folders.users_id
        AND users.id = :user_id';

const SQL_SEARCH_UNUSED_NUMBER_SUBFOLDER= '
        SELECT 
        subfolders.num_subfolder
        FROM subfolders
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id0';

const SQL_SEARCH_UNUSED_NUMBER_DOCSUBFOLDER = '
        SELECT
        documents.num_document 
        FROM documents
        JOIN subfolders ON subfolders.Id = documents.subfolders_id
        JOIN folders ON folders.Id = subfolders.folders_id
        JOIN users ON users.Id = folders.users_id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
        AND subfolders.Id = :id1
    ';

const SQL_SEARCH_UNUSED_NUMBER_DOCFOLDER = '
        SELECT
        documents.num_document
        FROM documents
        JOIN folders on documents.folders_id = folders.Id
        JOIN users on folders.users_id = users.Id
        WHERE users.Id = :user_id
        AND folders.Id = :id0
    ';