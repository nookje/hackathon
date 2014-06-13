<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function custom_redirect($url)
{
    header("Location: /{$url}");
    exit;
}

function linkize($string) 
{
	return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $string), "-"));
}

function keywordize($string) 
{
	return strtolower(preg_replace('/[^a-z0-9\ ,]+/i', ' ', $string));
}

function titleize($string) 
{
	return trim(preg_replace('/[^a-z0-9]+/i', '-', $string), "-");
}

function meta_keywordize($string) 
{
	return strtolower(trim(preg_replace('/[^a-z0-9]+/i', ',', $string), ","));
}
