<?php

function join_paths(string ...$paths)
{
	$resultPath = $paths[0];
	for ($i = 1; $i < count($paths); $i++) {
		$lastChar = substr($resultPath, -1);
		if ($lastChar != '/' && $lastChar != '\\')
			$resultPath .= '/';
		$resultPath .= $paths[$i];
	}
	return str_replace('\\', '/', $resultPath);
}