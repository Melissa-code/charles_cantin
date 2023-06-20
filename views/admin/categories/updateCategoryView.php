<!-- Title -->

<section class="row my-4 category">
    <div class="col-12">
        <h1 class="text-center">Modifier la catégorie <?= $category->getTitleCategory(); ?></h1>
    </div>
</section>

<!-- Category update form -->

<section class="row my-4 category">
    <div class="col-12 d-flex justify-content-center">
        <form action="<?= URL ?>categories/modifierCategorieValidation" method="POST" class="category-form border border-light rounded-0 p-4">
            <div class="mb-3">
                <label for="title_category" class="form-label text-light">Libellé : </label>
                <input type="text" class="form-control rounded-1" id="title_category" name="title_category" value="<?= $category->getTitleCategory(); ?>" required maxlength="30">
            </div>
            <div class="row d-flex mx-2">
                <!-- back button -->
                <a href="<?= URL ?>categories" class="btn btn-back w-50 border border-light rounded-0">Revenir</a>
                <!-- old id category -->
                <input type="hidden" name="oldId_category" value="<?= $category->getIdCategory(); ?>">
                <!-- submit button -->
                <button type="submit" class="btn btn-custom w-50 border border-light rounded-0">Modifier</button>
            </div>
        </form>
    </div>
</section>



