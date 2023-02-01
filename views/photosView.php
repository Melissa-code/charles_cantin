<div class="gallery w-100">

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">

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

    <!-- Add a new photo  -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center mb-4">
                <a href="<?= URL ?>galerie/ajouterPhoto" class="btn btn-sm btn-outline-secondary m-2 pt-2">
                    <i class="fa-solid fa-circle-plus"> </i>
                    Ajouter une photo
                </a>
                <a href="<?= URL ?>galerie/categories" class="text-decoration-none m-2">
                    Voir les catégories
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
                                <form action="<?= URL ?>galerie/supprimer/<?= $photo->getIdPhoto(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette photo ?')">

                                    <!-- Update a photo -->
                                    <a href="<?= URL ?>galerie/modifierPhoto/<?= $photo->getIdPhoto(); ?>" class="btn btn-sm btn-outline-warning">
                                        <div class="d-flex justify-content-between align-items-center p-1">
                                            <i class="fa-solid fa-pen"></i>
                                        </div>
                                    </a>

                                    <!-- Delete a photo -->
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <div class="d-flex justify-content-between align-items-center p-1">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

