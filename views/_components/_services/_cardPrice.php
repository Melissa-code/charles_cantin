<?php

foreach ($services as $service): ?>
    <article class="col-md-3 card border border-light m-2 rounded-0 text-light">
        <div class="card-body">
            <h2 class="card-title border-bottom"><?= $service->getTitleService() ?></h2>
            <h3 class="price-title"><?php if($service->getPriceService()) {
                    echo $service->getPriceService(). "€";
                } else {
                    echo "Sur devis";
                } ?>
            </h3>
            <p class="card-text"><?= $service->getContentService(); ?></p>
        </div>
        <!-- Buttons -->
        <div class="row d-flex align-items-center">
            <!-- Update a service -->
            <div class="col-6 gx-0">
                <a href="<?= URL ?>tarifs/modifier/<?= $service->getIdService(); ?>" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            <div class="col-6 gx-0">
                <!-- Delete a service -->
                <form class="" action="<?= URL ?>tarifs/supprimer/<?= $service->getIdService(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette photo ?')">
                    <button type="submit" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
    </article>
<?php endforeach; ?>