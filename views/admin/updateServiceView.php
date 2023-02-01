<div class="contact w-100">

    <!-- Page title -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <h1 class="me-4">Modifier le tarif et la prestation <?= $service->getTitleService(); ?></h1>
        </div>
    </div>

    <!-- service updating form -->

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">

            <form action="<?= URL ?>tarifs/modifierServiceValidation" method="post" enctype="multipart/form-data" class="border border-secondary rounded p-4">
                <!-- service title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Titre : </label>
                    <input type="text" class="form-control" id="title" name="title_service" value="<?= $service->getTitleService(); ?>" required maxlength="100">
                </div>
                <!-- service price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Prix : </label>
                    <input type="text" class="form-control" id="price" name="price_service" value="<?= $service->getPriceService(); ?>">
                </div>
                <!-- service description -->
                <div class="mb-3">
                    <label for="content" class="form-label">Description : </label>
                    <textarea class="form-control" id="content" name="content_service" required><?= htmlspecialchars($service->getContentService()); ?></textarea>
                </div>

                <div class="mb-3">
                    <!-- old id service -->
                    <input type="hidden" name="oldId_service" value="<?= $service->getIdService(); ?>">
                    <button type="submit" class="btn btn-secondary w-100">Modifier</button>
                </div>
            </form>

        </div>
    </div>
</div>



