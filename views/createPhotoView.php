<div class="create-admin w-100">

    <!-- Page title -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <h1 class="me-4">Ajouter une photo</h1>
        </div>
    </div>

    <!-- Photo create form -->

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">

            <form action="<?= URL ?>galerie/ajouterPhotoValidation" method="post" enctype="multipart/form-data" class="border border-secondary rounded p-4">
                <div class="mb-3">
                    <label for="legend" class="form-label">Légende : </label>
                    <input type="text" class="form-control" id="legend" name="legend_photo" placeholder="Ex: Femme enceinte">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image : </label>
                    <input type="file" class="form-control" id="image" name="image_photo" >
                </div>
                <div class="mb-3">
                    <label for="id_category" class="form-label">Catégorie : </label>
                    <select class="form-select" id="id_category" name="id_category">
                        <option selected>Choisir une catégorie</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->getIdCategory(); ?>"><?= $category->getTitleCategory(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                </div>
            </form>


        </div>

    </div>
</div>

