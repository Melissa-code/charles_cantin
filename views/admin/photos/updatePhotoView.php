<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Modifier la photo <?= $photo->getLegendPhoto(); ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- Photo updating form -->

<section class="row d-flex justify-content-center">
    <div class="col-11 col-md-6">
        <form action="<?= URL ?>galerie/modifierPhotoValidation" method="post" enctype="multipart/form-data" class="border border-light rounded-0 p-4 img-form text-light">
            <!-- Legend photo -->
            <div class="mb-3">
                <label for="legend" class="form-label">Légende : </label>
                <input type="text" class="form-control rounded-1" id="legend" name="legend_photo" value="<?= $photo->getLegendPhoto(); ?>">
            </div>
            <!-- Image photo -->
            <div class="mb-3">
                <label for="image" class="form-label">Image : </label>
                <div class="">
                    <img src="<?= URL ?>public/assets/images/uploads/<?= $photo->getImagePhoto(); ?>" alt="<?= $photo->getLegendPhoto(); ?>" width="75" class="rounded mb-2">
                    <input type="file" class="form-control rounded-1" id="image" name="image_photo">
                </div>
            </div>
            <!-- Category photo -->
            <div class="mb-3">
                <input type="hidden" class="form-control" id="oldIdCategory" name="oldIdCategory" value="<?= $photo->getIdCategory(); ?>">
                <label for="id_category" class="form-label">Catégorie : </label>
                <select class="form-select rounded-1" id="id_category" name="id_category">
                    <?php foreach ($categories as $category) : ?>
                        <?php if($photo->getIdCategory() ===  $category->getIdCategory()) :?>
                            <option value="<?= $photo->getIdCategory(); ?>" selected><?= $category->getTitleCategory(); ?></option>
                        <?php else : ?>
                            <option value="<?= $category->getIdCategory(); ?>"><?= $category->getTitleCategory(); ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- Submit photo -->
            <div class="row d-flex justify-content-center align-items-center mx-0">
                <input type="hidden" name="oldId_photo" value="<?= $photo->getIdPhoto(); ?>">
                <a href="<?= URL ?>galerie" class="btn btn-back w-50 border border-light rounded-0 mb-2">
                    <i class="fa-solid fa-backward" style="color: #FFFFFF;"></i> Revenir
                </a>
                <button type="submit" class="btn btn-custom rounded-0 border border-light w-50 rounded-0 mb-2">Modifier</button>
            </div>
        </form>

    </div>
</section>



