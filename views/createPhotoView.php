<!-- Title -->

<section class="row mt-4">
    <div class="col d-flex justify-content-center align-items-center ">
        <h1 class="me-4">Ajouter une photo</h1>
    </div>
</section>

<!-- Photo create form -->

<div class="row d-flex justify-content-center my-4">
    <div class="col-11 col-md-8 col-lg-6">
        <form action="<?= URL ?>galerie/ajouterPhotoValidation" method="post" enctype="multipart/form-data" class="img-form border border-light rounded-3 p-4">
            <div class="mb-3">
                <label for="legend" class="form-label text-light">Légende : </label>
                <input type="text" class="form-control" id="legend" name="legend_photo" placeholder="Ex: Femme enceinte" required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label text-light">Image : </label>
                <input type="file" class="form-control" id="image" name="image_photo" required>
            </div>
            <div class="mb-3">
                <label for="id_category" class="form-label text-light">Catégorie : </label>
                <select class="form-select" id="id_category" name="id_category" required>
                    <option value="">Sélectionner une catégorie</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->getIdCategory(); ?>"><?= $category->getTitleCategory(); ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-custom rounded-3 w-100">Ajouter</button>
            </div>
        </form>


    </div>
</div>


