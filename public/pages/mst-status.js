$(function () {
    table = $('#mydata').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        lengthMenu: [10, 30, 50, 100],
        order: [],
        language: {
            searchPlaceholder: 'Cari Data..',
            sSearch: '',
            lengthMenu: '_MENU_',
        }
    });
});

function reload_table() {
    table.ajax.reload(null, false);
}

function addItem() {
    $('#modalLabel').text('TAMBAH DATA');
    $('#BtnSave').text('TAMBAH');
    $('[name=idItem]').val('')
    $('#form')[0].reset();
    $('#form').parsley().reset()
    $('#modal').modal('show');
}

function editItem(id) {
    axios.get(route('min.mst.status.edit', id))
        .then(function (response) {
            $('#form')[0].reset();
            $('#form').parsley().reset()
            const dt = response.data;
            $('[name=idItem]').val(dt.id_produk_status);
            $('[name=status]').val(dt.status);
            $('#modalLabel').text('Sunting Data');
            $('#BtnSave').text('SIMPAN');
            $('#modal').modal('show');
        })
        .catch(function (error) {
            alert_error('Ups silakan ulangi lagi');
        });
}


function saveItem() {
    var form = $('#form').parsley();
    if (form.isValid()) {
        const aksi = $('[name=idItem]').val();
        if (aksi == '') {
            axios
                .post(route("min.mst.status.store"), $("#form").serialize())
                .then(function (response) {
                    reload_table();
                    $('#modal').modal('hide');
                    alert_success('Berhasil tambah data');
                })
                .catch(function (error) {
                    alert_error('Ups silakan ulangi lagi');
                });
        } else {
            axios
                .put(route("min.mst.status.update", aksi), $("#form").serialize())
                .then(function (response) {
                    reload_table();
                    $('#modal').modal('hide');
                    alert_success('Berhasil simpan data');
                })
                .catch(function (error) {
                    alert_error('Ups silakan ulangi lagi');
                });

        }
    } else {
        form.validate();
    }
}

function delItem(id) {
    Swal.fire({
        title: 'Anda Yakin?',
        html: 'Ingin menghapus data ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'YA, Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then(result => {
        axios
            .delete(route("min.mst.status.destroy", id))
            .then(function (response) {
                reload_table();
                alert_success('Berhasil hapus data');
                swal.close();
            })
            .catch(function (error) {
                alert_error('Ups silakan ulangi lagi');
            });
    });
}