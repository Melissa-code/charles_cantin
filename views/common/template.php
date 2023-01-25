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
    <link rel="stylesheet" href="public/css/main.css">
    <title><?= $page_title ?></title>
</head>

<body class="">
    <?php require_once("views/common/header.php"); ?>

        <div class="container">
            <main>
                <?php if(!empty($_SESSION['alert'])) : ?>
                    <div class="alert <?= $_SESSION['alert']['type']; ?> alert-dismissible" role="alert">
                        <?= $_SESSION['alert']['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                unset($_SESSION);
                endif;
                ?>

                <?= $page_content; ?>
            </main>
        </div>

    <?php require_once("views/common/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("a[data-delete]").click(function () {
            let link = $(this).attr("data-delete"); // get the attr btn
            $("#delete-btn").attr("href", link); // write the link in the btn
        })
    </script>
</body>
</html>


