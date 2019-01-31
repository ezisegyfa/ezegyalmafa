<?php

function getRequestFiles()
{
	return glob(join_paths(app_path(), 'Http', 'Requests', '*.php'));
}

function deleteFilesFromFolder(string $folderUrl, string $fileExtension = '.php')
{
    $fileUrls = glob($folderUrl . '\\*' . $fileExtension);
    foreach ($fileUrls as $url) {
        chmod($url, 0775);
        unlink($url);
    }
}