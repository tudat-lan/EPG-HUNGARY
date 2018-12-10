<?php

foreach(glob("*/") as $folder){
	$fi = new FilesystemIterator($folder);
	echo $folder.' => '.iterator_count($fi).' files<br>';
}

?>