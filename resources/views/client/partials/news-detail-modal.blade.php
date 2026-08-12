{{-- Modal compartido: noticia completa sin salir de la página --}}
<div class="modal fade gam-news-modal" id="newsDetailModal" tabindex="-1" role="dialog"
    aria-labelledby="newsModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="gam-news-modal-heading">
                    <span class="gam-news-date" id="newsModalDate"></span>
                    <h2 class="modal-title" id="newsModalTitle"></h2>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <figure class="gam-news-modal-figure">
                    <img src="" alt="" id="newsModalPhoto" class="img-fluid">
                </figure>
                <div class="gam-news-modal-content" id="newsModalBody"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success btn-rounded btn-md" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
