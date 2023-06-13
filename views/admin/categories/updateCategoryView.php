<!-- Title -->

<section class="row my-4 category">
    <div class="col-12">
        <h1 class="text-center">Modifier la catégorie <?= $category->getTitleCategory(); ?></h1>
    </div>
</section>

<!-- Category update form -->

<section class="row my-4 category">
    <div class="col-12 d-flex justify-content-center">
        <form action="<?= URL ?>categories/modifierCategorieValidation" method="POST" class="category-form border border-light rounded-3 p-4">
            <div class="mb-3">
                <label for="title_category" class="form-label text-light">Libellé : </label>
                <input type="text" class="form-control" id="title_category" name="title_category" value="<?= $category->getTitleCategory(); ?>" required maxlength="30">
            </div>
            <div class="row d-flex">
                <!-- back button -->
                <div class="col mb-3 ">
                    <a href="<?= URL ?>categories" class="btn btn-dark">Revenir</a>
                </div>
                <div class="col mb-3">
                    <!-- old id category -->
                    <input type="hidden" name="oldId_category" value="<?= $category->getIdCategory(); ?>">
                    <!-- submit button -->
                    <button type="submit" class="btn btn-custom">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</section>



