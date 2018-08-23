<?php

function removeGetSuffix(string $text)
{
	if (substr($text, 0, 3) == 'get')
		return substr($text, 3);
	else
		return $text;
}

function removeSuffix(string $text)
{
    return str_replace(getSuffix($text), '', $text);
}

function getSuffix(string $text)
{
	$suffixCharaterPosition = strpos($text, '_');
	if ($suffixCharaterPosition)
    	return substr($text, 0, $suffixCharaterPosition + 1);
    else
    	return '';
}