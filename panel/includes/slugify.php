<?php

function slugify($string){
    $slug = preg_replace('/\s+/', '-', $string);
    return $slug;
}

?>
