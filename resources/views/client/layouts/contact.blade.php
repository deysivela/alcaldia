<section class="gam-contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="gam-contact-panel" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="title font-light">Contáctanos</h2>
                    <p class="gam-contact-lead">Envíanos tu consulta.</p>
                    <form class="m-t-30" action="/contacts" method="POST" data-aos="fade-left" data-aos-duration="1000">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="contact-nombre">Nombre</label>
                            <input id="contact-nombre" class="form-control" type="text" name="nombre"
                                placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="contact-email">Correo electrónico</label>
                            <input id="contact-email" class="form-control" type="email" name="email"
                                placeholder="Correo Electronico" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="contact-asunto">Asunto</label>
                            <input id="contact-asunto" class="form-control" type="text" name="asunto"
                                placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="contact-mensaje">Mensaje</label>
                            <textarea id="contact-mensaje" class="form-control" rows="4" name="mensaje"
                                placeholder="Mensaje" required></textarea>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gam-contact-actions">
                            <button type="submit" class="btn bg-white text-inverse btn-arrow">
                                <span>Enviar <i class="ti-arrow-right"></i></span>
                            </button>
                            <a class="gam-contact-phone" href="tel:+59125822728">
                                <i class="fa fa-phone"></i> (02) 5822728
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gam-contact-map" data-aos="fade-left" data-aos-duration="1200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7625476.100467938!2d-70.97831458018615!3d-18.38802236603293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93fce07616e24cfb%3A0x1ad2d3117c642cca!2sGobierno+Aut%C3%B3nomo+Municipal+de+Llallagua!5e0!3m2!1ses-419!2sbo!4v1543942205761"
                        width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""
                        title="Ubicación del Gobierno Autónomo Municipal de Llallagua"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
