<?php

foreach($categories as $category) {
    foreach($photos as $photo) {
        if($category->getIdCategory() === $photo->getIdCategory() && $category->getTitleCategory() !== "Grossesse"  && $category->getTitleCategory() !== "Mariage"  && $category->getTitleCategory() !== "Bapteme"  && $category->getTitleCategory() !== "Bébé"  && $category->getTitleCategory() !== "Couple"  && $category->getTitleCategory() !== "Famille"  && $category->getTitleCategory() !== "Portrait") {
            include('views/_components/_gallery/_img.php');
        }
    }
}