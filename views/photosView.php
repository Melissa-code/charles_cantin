<div class="gallery w-100">

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <!-- Page title -->

            <h1 class="me-4">Galerie photos</h1>

            <!-- Category Select -->

            <div class="col-md-4">
                <select class="form-select" id="country" required="">
                    <option value="">Rechercher par catégorie</option>
                    <?php foreach($categories as $category) : ?>
                    <option value="" name="category"><?= $category->getTitleCategory(); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Sélectionnez une catégorie valide.
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center align-items-center mb-4">
            <a href=""  class="btn btn-sm btn-outline-secondary">Ajouter une photo</a>
        </div>
    </div>

    <!-- Photos gallery -->

    <div class="row d-flex flex-wrap justify-content-center">
        <?php foreach($photos as $photo) : ?>
        <div class="col-md-3">
            <div class="card shadow-sm m-1">
                <img src="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" alt="" class="rounded-top">
                <?= $photo->getLegendPhoto(); ?>
                <div class="card-body d-flex justify-content-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group ">
                            <button type="button" class="btn btn-sm btn-outline-warning">Modifier</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

    </div>
</div>

