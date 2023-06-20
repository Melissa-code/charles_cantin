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

<section class="row d-flex justify-content-center mt-4">
    <div class="col-md-9 d-flex justify-content-center">
        <a href="<?= URL?>tarifs/ajouterTarif" class="btn btn-sm btn-custom w-100 border border-light rounded-0">
            <i class="fa-solid fa-circle-plus"></i>
            Ajouter un tarif
        </a>
    </div>
</section>

<!-- Cards of prices -->

<section class="row d-flex justify-content-center flex-wrap">
    <?php include_once("_components/_services/_cardPrice.php"); ?>
</section>
