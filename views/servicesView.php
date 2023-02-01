<div class="container services w-100">

    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <h1 class="text-center my-5 me-3">Tarifs et prestations</h1>
            <!-- Button to add a new service & price -->

            <a href="<?= URL?>tarifs/ajouterTarif" class="btn btn-sm btn-dark" >
                <div class="d-flex justify-content-between align-items-center p-1">
                    <span><i class="fa-solid fa-circle-plus"></i> Ajouter</span>
                </div>
            </a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center d-flex justify-content-center flex-wrap">
        <?php foreach ($services as $service) : ?>
            <div class="col">
                <div class="card mb-4 rounded-3" >
                    <div class="card-header py-3 ">
                        <h2 class="my-0 fw-normal"><?= $service->getTitleService(); ?></h2>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pricing-card-title fw-bold">
                            <?php if($service->getPriceService()) {
                                 echo $service->getPriceService(). "€";
                            } else {
                                echo "Sur devis";
                            } ?>
                        </h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><?= $service->getContentService(); ?></li>
                        </ul>
                        <a href="contact" class="w-100 btn btn-lg btn-custom">Réserver</a>

                        <div class="mt-2">
                            <form action="<?= URL ?>tarifs/supprimer/<?= $service->getIdService(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce tarif ?')">

                                <!-- Button to update a service -->
                                <a href="<?= URL ?>tarifs/modifier/<?= $service->getIdService(); ?>" class="btn btn-sm btn-warning">
                                    <div class="d-flex justify-content-between align-items-center p-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                </a>

                                <!-- Button to delete a service -->
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <div class="d-flex justify-content-between align-items-center p-1">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

