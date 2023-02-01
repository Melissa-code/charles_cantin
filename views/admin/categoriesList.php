<div class="categories w-100">

    <!-- Page title -->

    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center my-5">
            <h1 class="me-4">Liste des catégories</h1>
        </div>
    </div>
</div>

<div class="row"></div>
    <div class="col d-flex align-items-start">
        <?php foreach($categories as $category) : ?>

        <div>
            <h3 class="fs-2"><?= $category->getTitleCategory(); ?></h3>
            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
            <a href="#" class="btn btn-primary">
                Primary button
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>



</div>



