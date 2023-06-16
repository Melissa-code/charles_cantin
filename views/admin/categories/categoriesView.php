<!-- Title -->

<section class="row mt-4">
    <div class="col-12 d-flex justify-content-center">
        <h1 class="text-center">Liste des catégories</h1>
    </div>
</section>

<!-- Back or Add a category -->

<section class="row d-flex justify-content-center pt-4">
    <div class="col-md-10 d-flex justify-content-center">
        <a href="<?= URL ?>galerie" class="btn btn-sm btn-back w-100 border border-light rounded-0 mb-2">
            <i class="fa-solid fa-backward" style="color: #000000;"></i>
            Revenir
        </a>
        <a href="<?= URL ?>categories/ajouterCategorie" class="btn btn-sm btn-custom w-100 border border-light rounded-0 mb-2">
            <i class="fa-solid fa-circle-plus"></i>
            Ajouter une catégorie
        </a>
    </div>
</section>

<!-- Categories cards -->

<section class="row d-flex justify-content-center pb-4">
    <div class="col-md-11">
        <div class="row d-flex justify-content-center">
            <?php foreach($categories as $category): ?>
                <div class="card card-custom border border-light rounded-0 text-light m-2" style="width:15rem; ">
                    <div class="card-body">
                        <!-- Card title -->
                        <h4 class="card-body text-center"><?= $category->getTitleCategory(); ?></h4>
                        <div class="row d-flex align-items-center mx-0">
                            <!-- Update a category -->
                            <div class="col-md-6 gx-0">
                                <a href="<?= URL ?>categories/modifier/<?= $category->getIdCategory(); ?>" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </div>
                            <div class="col-md-6 gx-0">
                                <!-- Delete a category -->
                                <form action="<?= URL ?>categories/supprimer/<?= $category->getIdCategory(); ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette categorie ?')">
                                    <button type="submit" class="btn btn-sm w-100 btn-custom border border-light rounded-0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>








