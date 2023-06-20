<!-- Title -->

<section class="row my-4 category">
    <div class="col-12">
        <h1 class="text-center">Ajouter une catégorie</h1>
    </div>
</section>

<!-- Category create form -->

<section class="row my-4 category">
    <div class="col-12 d-flex justify-content-center">
        <form action="<?= URL ?>categories/ajouterCategorieValidation" method="POST" class="category-form border border-light rounded-0 p-4">
            <div class="mb-3">
                <label for="title_category" class="form-label text-light">Libellé : </label>
                <input type="text" class="form-control rounded-1" id="title_category" name="title_category" placeholder="Ex: Portrait" required maxlength="30">
            </div>
            <div class="row d-flex px-3">
                <!-- back button -->
                <a href="<?= URL ?>categories" class="btn btn-back w-50 rounded-0 border border-light">Revenir</a>
                <!-- submit button -->
                <button type="submit" class="btn btn-custom w-50 rounded-0 border border-light">Ajouter</button>
            </div>
        </form>
    </div>
</section>



