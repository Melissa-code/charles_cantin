<div class="container d-block h-100">
    <div class="row ">
        <!-- Page title -->
        <div class="col-12">
            <h1 class="text-center">Ajouter une catégorie</h1>
        </div>

        <!-- Category create form -->
        <div class="col-12 d-flex justify-content-center ">

            <form action="<?= URL ?>categorie/ajouterCategorieValidation" method="POST" class="border border-light rounded-3 p-4 ">
                <div class="mb-3">
                    <label for="title_category" class="form-label">Libellé : </label>
                    <input type="text" class="form-control" id="title_category" name="title_category" placeholder="Ex: Portrait" required maxlength="50">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                </div>
            </form>


        </div>

    </div>
</div>


