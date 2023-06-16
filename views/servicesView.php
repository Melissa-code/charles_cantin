<!-- Title -->

<section class="row d-flex justify-content-center my-4">
     <div class="col-12">
         <div class="row d-flex justify-content-center">
             <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                 <h1 class="text-center">Tarifs et prestations</h1>
             </div>
         </div>
     </div>
</section>

<!-- Add a new service & price -->

<section class="row d-flex justify-content-center">
    <div class="col-md-9 d-flex justify-content-center">
        <a href="<?= URL?>tarifs/ajouterTarif" class="btn btn-sm btn-custom w-100 border border-light rounded-0 mb-2">
            <i class="fa-solid fa-circle-plus"></i>
            Ajouter un tarif
        </a>
    </div>
</section>

<!-- Cards of prices -->

<section class="row m-2 d-flex justify-content-center flex-wrap">
    <?php foreach ($services as $service): ?>
        <article class="col-md-3 card border border-light m-3 rounded-0 price-card text-light">
            <div class="card-body">
                <h2 class="card-title"><?= $service->getTitleService() ?></h2>
                <hr>
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
                <div class="col-md-6 gx-0">
                    <a href="<?= URL ?>tarifs/modifier/<?= $service->getIdService(); ?>" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </div>
                <div class="col-md-6 gx-0">
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
</section>
