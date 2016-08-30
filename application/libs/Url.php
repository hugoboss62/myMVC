<?php

class Url{

	public static function redir($url, $type = 'header', $time = 0) {
		if ($type == 'header') { header("Location: $url"); exit; }
		else if ($type == 'meta') { echo '<META HTTP-EQUIV="Refresh" CONTENT="'.$time.'; URL='.$url.'">'; }
	}

}