<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Galerie photos</h1>
            </div>
        </div>
    </div>
</section>

<!-- Category  -->

<section class="row d-flex justify-content-center align-items-center select-category py-4">
    <!-- Select a category -->
    <div class="col-sm-8 col-md-4 col-lg-4 d-flex justify-content-end">
        <select class="form-select rounded-1">
            <option value="">Sélectionner une catégorie</option>
            <?php foreach($categories as $category) : ?>
                <option value="" name="category"><?= $category->getTitleCategory(); ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            Sélectionnez une catégorie valide.
        </div>
    </div>
    <!-- Categories link -->
    <div class="col-sm-8 col-md-4 col-lg-2 justify-content-start">
        <a class="btn btn-category rounded-1" href="<?= URL ?>categories" class="text-decoration-none text-light fw-semibold m-2">
            Voir les catégories
        </a>
    </div>
</section>

<!-- Add a new photo  -->

<section class="row d-flex justify-content-center pt-4 gallery">
    <div class="col-md-10 d-flex justify-content-center">
        <a href="<?= URL ?>galerie/ajouterPhoto" class="btn btn-sm btn-custom w-100 border border-light rounded-0 mb-2">
            <i class="fa-solid fa-circle-plus"></i>
            Ajouter une photo
        </a>
    </div>
</section>

<!-- Photos gallery -->

<section class="row d-flex justify-content-center py-3 gallery">
    <div class="col-md-11 d-flex justify-content-center">
        <div class="row">
            <!-- wedding -->
            <?php include_once('views/_components/_gallery/_weddingGrid.php'); ?>
            <!-- pregnant -->
            <?php include_once('views/_components/_gallery/_pregnantGrid.php'); ?>
            <!-- baptism -->
            <?php include_once('views/_components/_gallery/_baptismGrid.php'); ?>
            <!-- couple -->
            <?php include_once('views/_components/_gallery/_coupleGrid.php'); ?>
            <!-- baby -->
            <?php include_once('views/_components/_gallery/_babyGrid.php'); ?>
            <!-- family -->
            <?php include_once('views/_components/_gallery/_familyGrid.php'); ?>
            <!-- portrait -->
            <?php include_once('views/_components/_gallery/_portraitGrid.php'); ?>
            <!-- other -->
            <?php include_once('views/_components/_gallery/_otherGrid.php'); ?>

        </div>
    </div>
</section>







