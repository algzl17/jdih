<x-layout-back title="Master Status">
    @push('scripts')
        <script src="{{ assets('pages/mst-status.js') }}"></script>
    @endpush
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h4 class="mb-0 text-uppercase">Master Event</h4>
                <p class="mb-0 text-muted">Daftar event untuk pengambilan.</p>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div class="pe-1 mb-xl-0">
                    <button onclick="reload_table()" class="btn btn-info label-btn rounded-pill">
                        <i class="fa-solid fa-sync label-btn-icon me-2 rounded-pill"></i>
                        Refresh
                    </button>
                    <button onclick="addItem()" class="btn btn-success label-btn label-end rounded-pill">
                        Tambah
                        <i class="fa-solid fa-add label-btn-icon ms-2 rounded-pill"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card card-body">
            <div class="table-responsive">
                <table class="table" id="mydata">
                    <thead>
                        <tr class="text-end">
                            <th width="5%">No</th>
                            <th>Nama Event/Agenda</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal effect-slide-in-right" id="modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalLabel">Modal title
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" autocomplete="off">
                        <input type="hidden" name="idItem">
                        <div class="form-group">
                            <label class="form-label">Status Hukum</label>
                            <input type="text" class="form-control" name="status" required>
                        </div>
                        <button type="button" id="BtnSave" onclick="saveItem()" class="btn btn-success rounded-pill">
                            BTN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-back>
