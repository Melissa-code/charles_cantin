<!-- Image -->

<div class="col-md-3 gx-2 mb-2">
    <span class="img-bg">
        <a href="<?= URL ?>public/assets/images/uploads/<?= $photo->getImagePhoto(); ?>" data-toggle="lightbox" >
            <span class="img-legend"><?= $photo->getLegendPhoto(); ?></span>
            <img src="<?= URL ?>public/assets/images/uploads/<?= $photo->getImagePhoto(); ?>" class="img-fluid">
        </a>
    </span>
    <!-- Buttons Update & Delete a photo -->
    <div class="row d-flex mx-0">
        <!-- Update a photo -->
        <div class="col-6 gx-0">
            <a href="<?= URL ?>galerie/modifierPhoto/<?= $photo->getIdPhoto(); ?>" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                <i class="fa-solid fa-pen"></i>
            </a>
        </div>
        <div class="col-6 gx-0">
            <!-- Delete a photo -->
            <form class="" action="<?= URL ?>galerie/supprimer/<?= $photo->getIdPhoto(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette photo ?')">
                <button type="submit" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </div>
    </div>
</div>