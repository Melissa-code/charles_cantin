<div class="container services w-100">

    <div class="row ">
        <div class="col">
            <h1 class="text-center my-5">Tarifs et prestations</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center d-flex justify-content-center flex-wrap">
        <?php foreach ($services as $service) : ?>
            <div class="col">
                <div class="card mb-4 rounded-3 ">
                    <div class="card-header py-3 ">
                        <h2 class="my-0 fw-normal"><?= $service->getTitleService(); ?></h2>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pricing-card-title fw-bold"><?= $service->getPriceService(); ?> €</h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><?= $service->getContentService(); ?></li>
                        </ul>
                        <a href="contact" class="w-100 btn btn-lg btn-custom">Réserver</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

