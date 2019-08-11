<?php namespace Config;

/***
*
* This file contains example values to alter default library behavior.
* Recommended usage:
*	1. Copy the file to app/Config/Files.php
*	2. Change any values
*	3. Remove any lines to fallback to defaults
*
***/

class Files extends \Tatter\Files\Config\Files
{
	// Whether to continue instead of throwing exceptions
	public $silent = true;

	// The session variable to check for a logged-in user ID
	public $userSource = 'logged_in';

	// Directory to store files (with trailing slash)
	public $storagePath = ROOTPATH . 'writable/files/';

	// Views to display for each function
	public $views = [
		'header'    => 'Tatter\Files\Views\templates\header',
		'footer'    => 'Tatter\Files\Views\templates\footer',
		'dropzone'  => 'Tatter\Files\Views\dropzone\config',
	];

	// Default display format; built in are 'cards', 'list', 'select'
	public $defaultFormat = 'cards';
}
