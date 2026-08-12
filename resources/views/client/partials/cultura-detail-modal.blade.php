{{-- Modal: detalle de cronograma / actividad de Cultura --}}
<div class="modal fade gam-news-modal gam-cultura-modal" id="culturaDetailModal" tabindex="-1" role="dialog"
    aria-labelledby="culturaModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="gam-news-modal-heading">
                    <span class="gam-news-date" id="culturaModalMeta"></span>
                    <h2 class="modal-title" id="culturaModalTitle"></h2>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <figure class="gam-news-modal-figure" id="culturaModalImageWrap">
                    <img src="" alt="" id="culturaModalPhoto" class="img-fluid">
                </figure>
                <div class="gam-cultura-modal-pdf" id="culturaModalPdfWrap" hidden>
                    <object id="culturaModalPdf" data="" type="application/pdf" class="gam-cultura-modal-pdf-object">
                        <p>No se puede previsualizar el PDF.
                            <a id="culturaModalPdfFallback" href="#" target="_blank" rel="noopener">Abrir archivo</a>.
                        </p>
                    </object>
                </div>
                <div class="gam-news-modal-content" id="culturaModalBody"></div>
            </div>
            <div class="modal-footer">
                <a href="#" id="culturaModalDownload" class="btn btn-success-gradiant btn-rounded btn-md" download
                    target="_blank" rel="noopener">
                    <i class="fa fa-download"></i> Descargar
                </a>
                <button type="button" class="btn btn-outline-success btn-rounded btn-md" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
