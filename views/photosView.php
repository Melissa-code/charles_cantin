<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Galerie photos</h1>
            </div>
        </div>
    </div>
</section>

<!-- Category  -->

<section class="row d-flex justify-content-center align-items-center select-category py-4">
    <!-- Select a category -->
    <div class="col-sm-8 col-md-4 col-lg-4 d-flex justify-content-end">
        <select class="form-select rounded-1">
            <option value="">Sélectionner une catégorie</option>
            <?php foreach($categories as $category) : ?>
                <option value="" name="category"><?= $category->getTitleCategory(); ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            Sélectionnez une catégorie valide.
        </div>
    </div>
    <!-- Categories link -->
    <div class="col-sm-8 col-md-4 col-lg-2 justify-content-start">
        <a class="btn btn-category rounded-1" href="<?= URL ?>categories" class="text-decoration-none text-light fw-semibold m-2">
            Voir les catégories
        </a>
    </div>
</section>

<!-- Add a new photo  -->

<section class="row d-flex justify-content-center pt-4 gallery">
    <div class="col-md-10 d-flex justify-content-center">
        <a href="<?= URL ?>galerie/ajouterPhoto" class="btn btn-sm btn-custom w-100 border border-light rounded-0 mb-2">
            <i class="fa-solid fa-circle-plus"></i>
            Ajouter une photo
        </a>
    </div>
</section>

<!-- Photos gallery -->

<section class="row d-flex justify-content-center py-3 gallery">
    <div class="col-md-11 d-flex justify-content-center">
        <div class="row">
            <?php foreach($categories as $category) : ?>
                <?php foreach($photos as $photo) : ?>
                    <?php if($category->getIdCategory() === $photo->getIdCategory()): ?>
                    <div class="col-md-3 gx-2">
                        <span class="img-bg">
                            <a href="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" data-toggle="lightbox" >
                                <span class="img-legend"><?= $photo->getLegendPhoto(); ?></span>
                                <img src="<?= URL ?>public/assets/images/<?= $photo->getImagePhoto(); ?>" class="img-fluid">
                            </a>
                        </span>
                        <div class="row d-flex align-items-center mx-0">
                            <!-- Update a photo -->
                            <div class="col-md-6 gx-0">
                                <a href="<?= URL ?>galerie/modifierPhoto/<?= $photo->getIdPhoto(); ?>" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </div>
                            <div class="col-md-6 gx-0">
                            <!-- Delete a photo -->
                                <form class="" action="<?= URL ?>galerie/supprimer/<?= $photo->getIdPhoto(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette photo ?')">
                                    <button type="submit" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>







