<div class="gallery w-100">

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <!-- Page title -->

            <h1 class="me-4">Galerie photos</h1>

            <!-- Category Select -->

            <div class="col-md-4">
                <select class="form-select" id="country" required="">
                    <option value="">Rechercher par catégorie</option>
                    <?php foreach($categories as $category) : ?>
                        <option value="" name="category"><?= $category->getTitleCategory(); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Sélectionnez une catégorie valide.
                </div>
            </div>
        </div>
    </div>

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center mb-4">
            <a href="<?= URL ?>galerie/ajouterPhoto" class="btn btn-sm btn-outline-secondary ">
                <i class="fa-solid fa-circle-plus"> </i>
                Ajouter une photo
            </a>
        </div>
    </div>

    <!-- Photos gallery -->

    <div class="row d-flex flex-wrap justify-content-center">
        <?php foreach($photos as $photo) : ?>
            <div class="col-md-3">
                <div class="card shadow-sm m-1">
                    <img src="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" alt="" class="rounded-top">
                    <?= $photo->getLegendPhoto(); ?>
                    <div class="card-body d-flex justify-content-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group ">
                                <!-- Update button -->
                                <button type="button" class="btn btn-sm btn-outline-warning">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <!-- Delete button -->
                                <form action="<?= URL ?>galerie/supprimer-photo/<?= $photo->getIdPhoto(); ?>" method="post">
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmDeletePhoto">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal : confirm photo -->

            <div class="modal fade" id="modalConfirmDeletePhoto" tabindex="-1" aria-labelledby="modalConfirmDeletePhoto" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-block mx-auto">
                            <p>Etes-vous sûr de vouloir supprimer cette photo ?</p>
                            <ul class="list-unstyled d-flex justify-content-center align-items-center">
                                <li class="m-1"><img src="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" alt="<?= $photo->getLegendPhoto(); ?>" class="rounded text-center" width="100"></li>
                                <li class="m-1"><?= $photo->getLegendPhoto(); ?></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-custom">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

