<!-- Title -->

<section class="row d-flex justify-content-center my-4">
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex justify-content-center title-frame p-2">
                <h1 class="text-center">Contact</h1>
            </div>
        </div>
    </div>
</section>

<!-- Address of the studio -->

<section class="row d-flex justify-content-around py-4 mt-md-5">
    <article class="col-md-4 my-2 my-md-0">
        <div class="list-style-none address d-block">
            <ul class="list-unstyled p-2">
                <li class="fw-bold"><h2>Studio <br/> Charles Cantin Photographe</h2></li>
                <li>10 rue Réaumur</li>
                <li>Bâtiment A - 6e étage</li>
                <li class="mb-2">75003 Paris</li>
                <li>
                    <i class="fa-solid fa-mobile-screen-button fa-lg" style="color: #47555E;"></i>
                    <span>06.44.34.65.78</span>
                </li>
                <li>
                    <i class="fa-solid fa-envelope" style="color: #47555E;"></i>
                    <span>cantinphotographe@gmail.com</span>
                </li>
            </ul>
            <!-- Map modal -->
            <div>
                <button type="button" class="btn btn-client rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#map">
                    Voir sur la carte
                </button>
            </div>
        </div>
    </article>

    <!-- Contact form -->

    <article class="col-md-4 my-2 my-md-0">
        <form class="contact-form p-4">
            <div class="row gx-2">
                <div class="mb-3 col-md-6">
                    <label for="firstname" class="form-label">Prénom: </label>
                    <input type="text" class="form-control" id="firstname" aria-describedby="firstname*" placeholder="Ex: Romain" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Nom: </label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Ex: Dupont">
                </div>
            </div>
            <div class="mb-3 col-12>
                <label for="email" class="form-label">Adresse email*: </label>
                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Ex: exemple@email.com" required>
            </div>
            <!-- Message -->
            <div class="mb-3">
                <label for="message" class="form-label">Message*: </label>
                <textarea class="form-control" placeholder="Ecrivez votre message ici" id="message" required></textarea>
            </div>
            <!-- Button -->
            <button type="submit" class="btn btn-client rounded-0 w-100">Envoyer</button>
        </form>
    </article>
</section>

<!-- Modal for the map -->

<div class="modal fade" id="map" tabindex="-1" aria-labelledby="map" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="map">Plan : </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.643877740468!2d2.356902615452135!3d48.865000908195725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0575cbf20b%3A0x47e023677504331a!2s10%20Rue%20R%C3%A9aumur%2C%2075003%20Paris!5e0!3m2!1sfr!2sfr!4v1680263025509!5m2!1sfr!2sfr" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

