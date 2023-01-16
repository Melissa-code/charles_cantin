<div class="gallery w-100">

    <div class="row h-100">
        <div class="col d-flex justify-content-center">
            <h1>Galerie photos</h1>
            <div class="col-md-4">
                <select class="form-select" id="country" required="">
                    <option value="">Recherche par catégorie</option>
                    <option>United States</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex flex-wrap justify-content-center">
        <div class="col-md-4 ">
            <div class="card shadow-sm">
                <img src="<?= URL ?>public/assets/images/bg-4.png" alt="" class="rounded-top">
                <figcaption class="text-center">legend</figcaption>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-warning">Modifier</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card shadow-sm">
                <img src="<?= URL ?>public/assets/images/bg-4.png" alt="" class="rounded-top">
                <figcaption class="text-center">legend</figcaption>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-warning">Modifier</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

