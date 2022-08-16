{{-- Referensi file fVendor folder Esaku --}}
<link rel="stylesheet" href="{{ asset('master.css?version=_') . time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />

<x-list-data judul="Data Jurusan" tambah="true" :thead="['Kode Jurusan', 'Nama Jurusan', 'Action']" :thwidth="[15, 15, 15, 15, 15]" :thclass="['', '', '', '', 'text-center']" />
<!-- END LIST DATA -->

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="submit" class="btn btn-primary btn-save float-right"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <div class="form-group row " id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="jurusan">Kode Jurusan</label>
                            <input class="form-control" type="text" placeholder="jurusan" id="jurusan"
                                name="kode_jur" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama"
                                required>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</form>
<!-- END FORM INPUT -->

<!-- MODAL CBBL -->
<div class="modal" tabindex="-1" role="dialog" id="modal-search">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content">
            <div style="display: block;" class="modal-header">
                <h5 class="modal-title" style="position: absolute;margin-bottom:10px"></h5><button type="button"
                    class="close" data-dismiss="modal" aria-label="Close"
                    style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">

            </div>
        </div>
    </div>
</div>
<!-- END MODAL CBBL -->

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="/helper.js"></script>
<script>
    $('#saku-form').addClass('mx-auto col-lg-6')
    let action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    let dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('dev-master/jurusan') }}",
            'async': false,
            'type': 'GET',
            'dataSrc': function(json) {
                if (json.status) {
                    return json.daftar;
                } else {
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [{
            'targets': 2,
            data: null,
            'defaultContent': action_html,
            'className': 'text-center'
        }, ],
        'columns': [{
                data: 'kode_jur'
            },
            {
                data: 'nama'
            }
        ],
        drawCallback: function() {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            // lengthMenu: "Items Per Page _MENU_"
            "lengthMenu": 'Menampilkan <select>' +
                '<option value="10">10 per halaman</option>' +
                '<option value="25">25 per halaman</option>' +
                '<option value="50">50 per halaman</option>' +
                '<option value="100">100 per halaman</option>' +
                '</select>',

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }

    })



    $('#btn-tambah').click(function() {
        $('#saku-datatable').hide();
        $('#saku-form').show();
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#form-tambah').validate({
        ignore: [],
        rules: {
            jurusan: {
                required: true,
                maxlength: 15
            },
            nama: {
                required: true,
                maxlength: 50
            },

        },
        errorElement: "label",
        submitHandler: function(form, e) {
            e.preventDefault()
            var jurusan = $('#jurusan').val();
            var nama = $('#nama').val();


            var parameter = $('#id_edit').val();
            if (parameter == "edit") {
                var url = "{{ url('dev-master/jurusan') }}";
                var pesan = "updated";
                var text = "Perubahan data " + jurusan + " telah tersimpan";


            } else {
                var url = "{{ url('dev-master/jurusan') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode " + jurusan;

               

            }

           var formData = new FormData(form);
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }







            $.ajax({

                type: 'POST',
                url: url,
                dataType: 'json',
                data: formData,
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (!data.data.status) {
                        msgDialog({
                            id: jurusan,
                            type: data.data.jenis,
                            text: data.data.message
                        })
                    } else {
                        dataTable.ajax.reload();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm()
                        msgDialog({
                            id: jurusan,
                            type: 'simpan'
                        });
                        last_add("kode", jurusan);

                    }

                }
            })


        },
        errorPlacement: function(
            error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });


    $('#saku-form').on('click', '#btn-kembali', function() {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
    });


    $('#saku-datatable').on('click', '#btn-delete', function(e) {
        var kode = $(this).closest('tr').find('td').eq(0).html();
        $('#modal-preview').modal('hide');
        msgDialog({
            id: kode,
            type: 'hapus'
        });
    });


    function hapusData(id, kode) {
        $.ajax({

            url: "{{ url('dev-master/jurusan') }}",
            type: 'DELETE',
            data: {
                kode_jur: id
            },
            dataType: 'json',
            success: function(data) {
                if (data.data.status) {
                    dataTable.ajax.reload()
                    showNotification("top", "center", "success", "Hapus Data", "Data Jurusan (" + id + ")");
                }
            }
        })
    }

    $('#btn-edit').click(function() {
        let id = $(this).closest('tr').find('td').eq(0).html();

        $('#form-tambah')[0].reset()
        $('#form-tambah').validate().resetForm()
        $('.btn-save').attr('id', 'btn-update')
        $('.btn-save').attr('type', 'button')

        $.ajax({
            url: "{{ url('dev-master/jurusan-detail') }}",
            type: 'GET',
            data: {
                kode_jur: id
            },
            dataType: 'json',
            success: function(data) {
                $('#judul-form').html('Update Jurusan')
                $('#saku-datatable').hide();
                $('#saku-form').show();
                $('#jurusan').attr('value', data.daftar[0].kode_jur)
                $('#jurusan').attr('readonly', true);
                $('#nama').attr('value', data.daftar[0].nama)
                $('#id_edit').attr('value', 'edit')
                $('#method').val('put')

            }
        })





    })


    $('#saku-form').on('click', '#btn-update', function() {
        let kode = $('#jurusan').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });
</script>
