<div class="home w-100">
    <div class="row h-100">
        <div class="col d-flex justify-content-center align-items-center">

            <div class="title-frame rounded p-3">
                <h1 class="fw-bold home-title ">
                    <?php foreach($data as $line) :?>
                        <?php echo $line['firstname_admin'].' '.$line['name_admin'].' - '.$line['job_admin']; ?>
                    <?php endforeach; ?>
                </h1>
            </div>

        </div>
    </div>



</div>


