<?php

function return_output($file){
    ob_start();
    include $file;
    return ob_get_clean();
}
$content = return_output('path/to/file.php');

