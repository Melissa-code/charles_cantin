<?php

foreach($categories as $category) {
    foreach($photos as $photo) {
        if($category->getIdCategory() === $photo->getIdCategory() && $category->getTitleCategory() === "Portrait") {
            include('views/_components/_gallery/_img.php');
        }
    }
}