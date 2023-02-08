<div class="container categories w-100">

    <div class="row">

        <!-- Page title -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="text-center">Liste des catégories</h1>
                <a href="<?= URL ?>galerie/ajouterCategorie" class="btn btn-sm btn-outline-secondary m-2 pt-2">
                    <i class="fa-solid fa-circle-plus"> </i>
                    Ajouter une catégorie
                </a>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center flex-wrap text-center">
            <?php foreach($categories as $category): ?>
                <div class="card m-2" style="width:15rem; ">
                    <div class="card-body">
                        <h4 class="card-body"><?= $category->getTitleCategory(); ?></h4>

                        <div class="btn-group">
                            <form action="" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette photo ?')">

                                <!-- Update a photo -->
                                <a href="" class="btn btn-sm btn-outline-warning">
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

            <?php endforeach; ?>
        </div>

    </div>
</div>



</div>



