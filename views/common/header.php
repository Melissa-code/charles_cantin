<?php
//print_r(basename($_SERVER['REDIRECT_URL']));
//if(!empty(basename($_SERVER['REDIRECT_URL']))) {
//    $currentPage = basename($_SERVER['REDIRECT_URL']);
//    echo $currentPage;
//}
?>
<div class="row">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom nav-custom">
            <a href="<?= URL ?>accueil" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="<?= URL ?>public/assets/images/logo-menu.png" alt="logo de Charles Cantin" width="150" class="rounded">
            </a>

            <ul class="nav nav-navbar col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item">
                    <a href="<?= URL ?>galerie" class="nav-link link-dark px-2 <?php if($currentPage === "galerie") {echo "active";} ?>">
                        Galerie
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= URL ?>tarifs" class="nav-link link-dark px-2 <?php if($currentPage === "tarifs") {echo "active";} ?>"">
                        Tarifs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= URL ?>contact" class="nav-link link-dark px-2 <?php if($currentPage === "contact") {echo "active";} ?>"">
                        Contact
                    </a>
                </li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="connexion" class="btn btn-outline-dark me-2 <?php if($currentPage === "connexion") {echo "active";} ?>"">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </header>
    </div>
</div>
