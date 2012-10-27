<?php

authorize();

if ($UserID != $LoggedUser['ID'] || !can_bookmark('torrent')) error(403);

if ($_POST['type'] === 'torrents') {
	// require_once SERVER_ROOT.'/classes/class_mass_user_bookmarks_editor.php'; //Bookmark Updater Class
	$BU = new MASS_USER_BOOKMARKS_EDITOR;
	if ($_POST['delete'])
		$BU->mass_remove();
	else if ($_POST['update'])
		$BU->mass_update();
}

header('Location: bookmarks.php?type=torrents');