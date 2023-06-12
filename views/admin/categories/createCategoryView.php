<!-- Title -->

<section class="row my-4 category">
    <div class="col-12">
        <h1 class="text-center">Ajouter une catégorie</h1>
    </div>
</section>

<!-- Category create form -->

<section class="row my-4 category">
    <div class="col-12 d-flex justify-content-center">
        <form action="<?= URL ?>categories/ajouterCategorieValidation" method="POST" class="category-form border border-light rounded-3 p-4">
            <div class="mb-3">
                <label for="title_category" class="form-label text-light">Libellé : </label>
                <input type="text" class="form-control" id="title_category" name="title_category" placeholder="Ex: Portrait" required maxlength="30">
            </div>
            <div class="row d-flex">
                <!-- back button -->
                <div class="col mb-3 ">
                    <a href="<?= URL ?>categories" class="btn btn-dark">Revenir</a>
                </div>
                <!-- submit button -->
                <div class="col mb-3">
                    <button type="submit" class="btn btn-custom">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</section>



