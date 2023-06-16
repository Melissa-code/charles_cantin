<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Ajouter une photo</h1>
            </div>
        </div>
    </div>
</section>

<!-- Photo create form -->

<div class="row d-flex justify-content-center my-4">
    <div class="col-11 col-md-6">
        <form action="<?= URL ?>galerie/ajouterPhotoValidation" method="post" enctype="multipart/form-data" class="img-form border border-light rounded-0 p-4">
            <!-- Legend -->
            <div class="mb-3">
                <label for="legend" class="form-label text-light">Légende : </label>
                <input type="text" class="form-control rounded-1" id="legend" name="legend_photo" placeholder="Ex: Femme enceinte" required maxlength="50">
            </div>
            <!-- Image file -->
            <div class="mb-3">
                <label for="image" class="form-label text-light">Image : </label>
                <input type="file" class="form-control rounded-1" id="image" name="image_photo" required>
            </div>
            <!-- Category -->
            <div class="mb-3">
                <label for="id_category" class="form-label text-light">Catégorie : </label>
                <select class="form-select rounded-1" id="id_category" name="id_category" required>
                    <option value="">Sélectionner une catégorie</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->getIdCategory(); ?>"><?= $category->getTitleCategory(); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- Buttons -->
            <div class="row d-flex justify-content-center align-items-center mx-0">
                    <a href="<?= URL ?>galerie" class="btn btn-back w-50 border border-light rounded-0 mb-2">
                        <i class="fa-solid fa-backward" style="color: #FFFFFF;"></i> Revenir
                    </a>
                    <button type="submit" class="btn btn-custom rounded-0 border border-light w-50 rounded-0 mb-2">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>


