<?php

function join_paths(string ...$paths)
{
	$resultPath = $paths[0];
	for ($i = 1; $i < count($paths); $i++)
		$resultPath .= '/' . $paths[$i];
	return str_replace('\\', '/', str_replace('//', '/', $resultPath));
}