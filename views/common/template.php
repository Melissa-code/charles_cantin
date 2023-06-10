<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $page_description; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Guntur:wght@400;600;700&family=Overpass:ital,wght@0,400;0,700;1,400&family=Questrial&family=Raleway+Dots&family=Raleway:ital,wght@0,400;0,600;0,700;1,400&family=Work+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/main.css">
    <?php if(!empty($page_css)) : ?>
        <link type="text/css" href="<?= URL ?>public/css/<?=$page_css?>" rel="stylesheet">
    <?php endif; ?>
    <title><?= $page_title ?></title>
</head>

<body class="d-flex flex-column justify-content-between min-vh-100">

    <!-- Header -->
    <?php require_once("views/common/header.php"); ?>

    <!-- Main -->
    <div class="container-fluid">
        <main class="main-content">
            <!-- Alert message -->
            <?php if(!empty($_SESSION['alert'])) : ?>
                <div class="alert <?= $_SESSION['alert']['type']; ?> alert-dismissible" role="alert">
                    <?= $_SESSION['alert']['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION);
                endif;
            ?>
            <!-- Page content -->
            <?= $page_content; ?>
        </main>
    </div>

    <!-- Footer -->
    <?php require_once("views/common/footer.php"); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <?php if(!empty($page_javascript)): ?>
        <?php foreach($page_javascript as $fileJavascript):?>
            <script src="<?= URL ?>public/js/<?= $fileJavascript ?>"></script>
        <?php endforeach ?>
    <?php endif ?>

</body>
</html>


