<div class="container contact w-100">

    <div class="row">
        <div class="col">
            <h1 class="text-center my-5">Contact</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="list-style-none address d-block">
                <ul class="list-unstyled px-2 pt-4">
                    <li class="fw-bold"><h2>Charles Cantin Photographe</h2></li>
                    <li>Studio : 7 rue Bréa 75006 Paris</li>
                    <li>E-mail : info@monsite.fr</li>
                    <li>Tél : 01 23 45 67 89</li>
                </ul>
                <div>
                    <button type="button" class="btn btn-custom w-100" data-bs-toggle="modal" data-bs-target="#map">
                        Voir le plan
                    </button>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <form class="contact-form">


                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail*: </label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Ex: exemple@email.com" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">Téléphone: </label>
                        <input type="number" class="form-control" id="phone" aria-describedby="phone" placeholder="Ex: 0233445567">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message*: </label>
                    <textarea class="form-control" placeholder="Ecrivez votre message ici" id="message" required></textarea>
                </div>

                <button type="submit" class="btn btn-custom w-100">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="map" tabindex="-1" aria-labelledby="map" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="map">Plan : </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10503.120260133916!2d2.313830007812499!3d48.843333699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671cf0e4b7e75%3A0x275d7879c9ae13cd!2sMonsieur%20le%20Photographe!5e0!3m2!1sfr!2sfr!4v1673989175865!5m2!1sfr!2sfr" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
