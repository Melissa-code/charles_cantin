<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Modifier le tarif <br/><?= $service->getTitleService(); ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- Price & Service updating form -->

<section class="row d-flex justify-content-center">
    <div class="col-11 col-md-6">
        <form action="<?= URL ?>tarifs/modifierTarifValidation" method="post" class="border border-light rounded-0 p-4 img-form text-light">
            <!-- service title -->
            <div class="mb-3">
                <label for="title" class="form-label">Titre : </label>
                <input type="text" class="form-control rounded-1" id="title" name="title_service" value="<?= $service->getTitleService(); ?>" required maxlength="100">
            </div>
            <!-- service price -->
            <div class="mb-3">
                <label for="price" class="form-label">Prix : </label>
                <input type="text" class="form-control rounded-1" id="price" name="price_service" value="<?= $service->getPriceService(); ?>">
            </div>
            <!-- service description -->
            <div class="mb-3">
                <label for="content" class="form-label">Description : </label>
                <textarea class="form-control rounded-1" id="content" name="content_service" required><?= htmlspecialchars($service->getContentService()); ?></textarea>
            </div>
            <!-- Back or Submit button -->
            <div class="row d-flex justify-content-center align-items-center mx-0">
                <!-- old id service -->
                <input type="hidden" name="oldId_service" value="<?= $service->getIdService(); ?>">
                <a href="<?= URL ?>tarifs" class="btn btn-back w-50 border border-light rounded-0 mb-2">
                    <i class="fa-solid fa-backward" style="color: #FFFFFF;"></i> Revenir
                </a>
                <button type="submit" class="btn btn-custom rounded-0 border border-light w-50 rounded-0 mb-2">Modifier</button>
            </div>
        </form>
    </div>
</section>




