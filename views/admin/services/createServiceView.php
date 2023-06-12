<div class="create-admin w-100">

    <!-- Page title -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <h1 class="me-4">Ajouter un tarif</h1>
        </div>
    </div>

    <!-- Service create form -->

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">

            <form action="<?= URL ?>tarifs/ajouterTarifValidation" method="post" enctype="multipart/form-data" class="border border-secondary rounded p-4">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre : </label>
                    <input type="text" class="form-control" id="title" name="title_service" placeholder="Ex: Pour deux" required maxlength="100">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix : </label>
                    <input type="text" class="form-control" id="price" name="price_service" placeholder="Ex: 100 €">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Description : </label>
                    <textarea class="form-control" placeholder="Ex: Séance pour 2 personnes" id="content" name="content_service" required></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary w-100">Ajouter</button>
                </div>
            </form>

        </div>
    </div>
</div>

