<div class="contact w-100">

    <!-- Page title -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <h1 class="me-4">Modifier la photo <?= $photo->getLegendPhoto(); ?></h1>
        </div>
    </div>

    <!-- Photo updating form -->

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">

            <form action="<?= URL ?>galerie/modifierPhotoValidation" method="post" enctype="multipart/form-data" class="border border-secondary rounded p-4">
                <!-- Legend photo -->
                <div class="mb-3">
                    <label for="legend" class="form-label fw-bold">Légende : </label>
                    <input type="text" class="form-control" id="legend" name="legend_photo" value="<?= $photo->getLegendPhoto(); ?>">
                </div>
                <!-- Image photo -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Image : </label>
                    <div class="">
                        <img src="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" alt="<?= $photo->getLegendPhoto(); ?>" width="75" class="rounded mb-2">
                        <input type="file" class="form-control" id="image" name="image_photo">
                    </div>
                </div>
                <!-- Category photo -->
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="oldIdCategory" name="oldIdCategory" value="<?= $photo->getIdCategory(); ?>">
                    <label for="id_category" class="form-label fw-bold">Catégorie : </label>
                    <select class="form-select" id="id_category" name="id_category">
                        <?php foreach ($categories as $category) : ?>
                            <?php if($photo->getIdCategory() ===  $category->getIdCategory()) :?>
                                <option value="<?= $photo->getIdCategory(); ?>" selected><?= $category->getTitleCategory(); ?></option>
                            <?php else : ?>
                                <option value="<?= $category->getIdCategory(); ?>"><?= $category->getTitleCategory(); ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="oldId_photo" value="<?= $photo->getIdPhoto(); ?>">
                    <button type="submit" class="btn btn-primary w-100">Modifier</button>
                </div>
            </form>

        </div>
    </div>
</div>



