<link rel="stylesheet" href="{{ asset('trans.css?version=_') . time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Siswa" tambah="true" :thead="['NIM', 'Nama', 'Jenis Kelamin', 'Jurusan', 'Aksi']" :thwidth="[10, 20, 10, 10, 10]" :thclass="['', '', '', '', 'text-center']" />
{{-- END LIST DATA --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                    <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i>Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;width:100px;margin-right:5px"><i class="fa fa-undo"></i> Keluar</button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-kedinasan"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Siswa</span></a></li>
                        {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-unit" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Unit</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-posisi" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Posisi</span></a></li> --}}
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                        <div class="tab-pane active row tab-scroll" id="data-kedinasan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;height:39.2px">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                    class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-kedinasan"></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-mahasiswa"
                                    style="width:1227px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:25px">No</th>
                                            <th style="width:30px">NIM</th>
                                            <th style="width:50px">Nama</th>
                                            <th style="width:80px">Jenis Kelamin</th>
                                            <th style="width:50px;">Kode Jurusan</th>
                                            <th style="width:50px;">Upload File</th>
                                            <th style="width:50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" id="add-row" href="#" data-id="0" title="add-row"
                                    class="add-row btn btn-light2 btn-block btn-sm">
                                    {{-- <i class="saicon icon-tambah mr-1"></i> --}}
                                    Tambah Baris
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END FORM --}}
<button id="trigger-bottom-sheet" style="display:none">&nbsp;</button>


<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
{{-- <script src="{{ asset('main.js') }}"></script> --}}

<script type="text/javascript">
    // CONFIG FORM
    $('#saku-form > .col-12').addClass('mx-auto col-lg-12');
    $('#modal-preview > .modal-dialog').css({
        'max-width': '600px'
    });

// SET UP FORM
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scroll = document.querySelector('#content-preview');
    new PerfectScrollbar(scroll);

    var scrollForm = document.querySelector('#form-body');
    new PerfectScrollbar(scrollForm);

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
// END SET UP FORM

    // OPTIONAL CONFIG
    $('#file').change(function() {
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
        showPreview(this);
    })
    // END OPTIONAL CONFIG


    // BTN TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        ;
        // $('#judul-form').html('Tambah Data SK');
        // newForm();
        // addRowSKDefault()
        valid = true;

        // $('#btn-save').addClass('disabled');
        // $('#btn-save').prop('disabled', true);
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Siswa');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-peserta tbody').html('');
        $('#input-error tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#kode_form').val($form_aktif);

        addRowSKDefault()
        valid = true

    });
    //  END BTN TAMBAH

    // BTN KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function() {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
    });

// SAKU TABLE
    var actionHtmlDefault =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable =
        generateTable(
            "table-data",
            "{{ url('dev-trans/mahasiswa2') }}",
            [{
                    "targets": 0,
                    "createdCell": function(td, cellData, rowData, row, col) {
                        if (rowData.status == "baru") {
                            $(td).parents('tr').addClass('selected');
                            $(td).addClass('last-add');
                        }
                    }
                },
                {
                    'targets': 4,
                    'className': 'text-center',
                    'defaultContent': actionHtmlDefault,
                    'className': 'text-center'
                },
            ],
            [{
                    data: 'nim'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'jenis_kelamin'
                },
                {
                    data: 'nama_jur'
                }
            ],
            "{{ url('dev-auth/sesi-habis') }}",
            [
                [0, "desc"]
            ]
        );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function(event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function(event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({
        trigger: "focus"
    });
// END SAKU TABLE

    // CBBL SAKU FORM
    $('#input-mahasiswa tbody').on('click', '.search-item', function(){
        var index = $(this).closest('td').index();
        var td = $(this).closest('td');
        var tr = $(this).closest('tr');
        var par = $(this).closest('td').find('input').attr('name');
        switch(par){
            case 'kode_jur[]': 
                var options = { 
                    id : par,
                    header : ['No', 'Nama Jurusan'],
                    url : "{{ url('dev-master/jurusan') }}",
                    columns : [
                        { data: 'kode_jur' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jurusan",
                    pilih : "jurusan",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected:function(data){
                        $(tr).find("td:eq(4)").children("input[type='text']").val(data.kode_jur).hide()
                        $(tr).find("td:eq(4)").children('span.text-value').text(data.kode_jur).show()
                        $(tr).find(".search-jur").hide();
                    }
                };
            break;
            case 'nim[]': 
                var options = { 
                    id : par,
                    header : ['NIM', 'Nama Siswa'],
                    url : "{{ url('dev-trans/mahasiswa') }}",
                    columns : [
                        { data: 'nim' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Siswa",
                    pilih : "nim",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected:function(data){
                        $(tr).find("td:eq(1)").children("input[type='text']").val(data.nim).hide()
                        $(tr).find("td:eq(1)").children('span.text-value').text(data.nim).show()
                        $(tr).find("td:eq(2)").children("input[type='text']").val(data.nama).hide()
                        $(tr).find("td:eq(2)").children('span.text-value').text(data.nama).show()
                        $(tr).find(".search-nim").hide();
                    }
                };
            break;
        }
        showInpFilterBSheet(options);

    });

    $('.info-icon-hapus').click(function() {
        var par = $(this).closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', false);
        $('#' + par).attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_' + par).parent('div').addClass('hidden');
        $('.info-name_' + par).addClass('hidden');
        $(this).addClass('hidden');
        $('#' + par).trigger('change');
    });
    // END CBBL SAKU FORM

    // GRID FORM
    $(document).on('click', function() {
        hideAllSelectedRow()
    })

    function hideAllSelectedRow() {
        $('table[id^=input]').each(function(index, table) {
            $(table).children('tbody').each(function(index, tbody) {
                $(tbody).children('tr').each(function(index, tr) {
                    $(tr).children('td').not(':first, :last').each(function(index, td) {
                        var value = $(td).children('.input-value').val()
                        $(td).children('.input-value').val(value)
                        $(td).children('span').not('.not-show').text(value)
                        $(td).children('.input-value').hide()
                        $(td).children('a').not('.hapus-item, .download-item').hide()
                        $(td).children('span').not('.not-show').show()
                    })
                })
            })
            $(table).find('tr').removeClass('selected-row')
            $(table).find('td').removeClass('selected-cell')
            $(table).find('.input-value').hide()
            $(table).find('a').not('.hapus-item, .download-item').hide()
            $(table).find('span').not('.not-show').show()
        })
    }

    function hideUnselectedRow(tbody) {
        tbody.find('tr').not('.selected-row').each(function(index, tr) {
            $(tr).find('td').not(':first, :last').each(function(index, td) {
                var value = $(td).children('.input-value').val()
                $(td).children('.input-value').val(value)
                $(td).children('span').not('.not-show').text(value)
                $(td).children('.input-value').hide()
                $(td).children('a').not('.hapus-item, .download-item').hide()
                $(td).children('span').not('.not-show').show()
            })
        })
    }

    function hideUnselectedCell(tr) {
        tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
            var value = $(td).children('.input-value').val()
            $(td).children('.input-value').val(value)
            $(td).children('span').not('.not-show').text(value)
            if ($(td).hasClass('selected-cell')) {
                $(td).children('span').hide()
                $(td).children('.input-value').show()
                $(td).children('a').not('.hapus-item, .download-item').show()
                setTimeout(function() {
                    $(td).children('.input-value').focus()
                }, 500)
            } else {
                $(td).children('.input-value').hide()
                $(td).children('a').not('.hapus-item, .download-item').hide()
                $(td).children('span').not('.not-show').show()
            }
        })
    }

    function nextSelectedCell(tr, td, index) {
        var value = $(td).children('.input-value').val()
        $(td).children('.input-value').val(value)
        $(td).children('span').not('.not-show').text(value)
        $(td).children('span').not('.not-show').show()
        $(td).children('.input-value').hide()
        $(td).children('a').not('.hapus-item, .download-item').hide()

        var nextindex = index + 1;
        var tdnext = $(tr).find('td').eq(nextindex)
        var cekReadonly = $(tdnext).hasClass('readonly')
        if (cekReadonly) {
            nextindex = nextindex + 1
            tdnext = $(tr).find('td').eq(nextindex)
        }
        var cekCbbl = $(tdnext).has('a').length
        if (cekCbbl > 0) {
            $(tdnext).children('a').show()
        }

        $(tdnext).children('span').hide()
        $(tdnext).children('.input-value').show()
        setTimeout(function() {
            $(tdnext).children('.input-value').focus()
        }, 500)
    }
    // GRID KEDINASAN
    function hitungTotalRowSK() {
        var total_row = $('#input-mahasiswa tbody tr').length;
        $('#total-kedinasan').html(total_row + ' Baris');
    }

    function addRowSKDefault() {
        $('#input-mahasiswa tbody').empty()
        var no = $('#input-mahasiswa tbody > tr').length;
        no = no + 1;
        var idNIM = 'nim-ke__' + no
        var idNama = 'nama-ke__' + no
        var idJenisKelamin = 'jenis-ke__' + no
        var idKodeJur = 'kodejur-ke__' + no
        var idFile = 'file-ke__' + no
        var html = null;


        html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNIM}">
            <span id="text-${idNIM}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNIM}" name="nim[]" class="form-control input-value hidden" required value="" >
        </td>
        <td id="${idNama}">
            <span id="text-${idNama}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idJenisKelamin}">
            <span id="text-${idJenisKelamin}" class="tooltip-span"></span>
            <select id="value-${idJenisKelamin}" class="form-control input-value hidden">
                <option value="Laki-Laki" selected>Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="hidden" id="valueInput-${idJenisKelamin}" name="jenis_kelamin[]"  value="-">
        </td>
        <td id="${idKodeJur}">
            <span id="text-${idKodeJur}" class="tooltip-span"></span>
            <input type='text' id="value-${idKodeJur}" name='kode_jur[]' class='form-control input-value hidden' style='z-index: 1;position: relative;' >
            <a href='#' class='search-item search-jur hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'>
                <i class='simple-icon-magnifier' style='font-size: 18px;'></i>
            </a>
        </td>
        <td id="${idFile}">
            <input type='file' name='file_dok[]' id='file_dok'>
            <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='` + no + `'>
        </td>  
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
        </tr>`;

        $('#input-mahasiswa tbody').append(html)
        var val = $(`#value-${idJenisKelamin}`).val();
        var jk = null;
        if (val === "Laki-Laki") {
            jk = "L"
        } else if (val === "Perempuan") {
            jk = "P"
        }
        $(`#valueInput-${idJenisKelamin}`).val(jk)


        $(`#value-${idJenisKelamin}`).change(function() {
            var td = $(this).parent().attr('id');
            var value = $(this).val()
            var isi = null
            if (value === "Laki-Laki") {
                isi = "L"
            } else if (value === "Perempuan") {
                isi = "P"
            }
            $(`#valueInput-${idJenisKelamin}`).val(isi)
        })
        
        $('.tooltip-span').tooltip({
            title: function() {
                return $(this).text();
            }
        });


        hitungTotalRowSK()
    }

    function addRowSK() {
        var no = $('#input-mahasiswa tbody > tr').length;
        no = no + 1;
        var idNIM = 'nim-ke__' + no
        var idNama = 'nama-ke__' + no
        var idJenisKelamin = 'jenis-ke__' + no
        var idKodeJur = 'kodejur-ke__' + no
        var idFile = 'file-ke__' + no
        var html = null;

        html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNIM}">
            <span id="text-${idNIM}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNIM}" name="nim[]" class="form-control input-value hidden" required value="" >

        </td>
        <td id="${idNama}">
            <span id="text-${idNama}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idJenisKelamin}">
            <span id="text-${idJenisKelamin}" class="tooltip-span"></span>
            <select id="value-${idJenisKelamin}" class="form-control input-value hidden">
                <option value="Laki-Laki" selected>Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="hidden" id="valueInput-${idJenisKelamin}" name="jenis_kelamin[]"  value="-">
        </td>
        <td id="${idKodeJur}">
            <span id="text-${idKodeJur}" class="tooltip-span"></span>
            <input type='text' id="value-${idKodeJur}" name='kode_jur[]' class='form-control input-value hidden' style='z-index: 1;position: relative;' >
            <a href='#' class='search-item search-jur hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'>
                <i class='simple-icon-magnifier' style='font-size: 18px;'></i>
            </a>
        </td>
        <td id="${idFile}" style="word-wrap: break-word">
            <input type="file" name="file_dok[]" class="custom-file-doc" id="file_dok">
        </td>     
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
    </tr>`;

        $('#input-mahasiswa tbody').append(html)
        $('#input-mahasiswa tbody tr').not(':last').removeClass('selected-row');
        $('.row-grid:last').addClass('selected-row');
        var val = $(`#value-${idJenisKelamin}`).val();
        var jk = null;
        if (val === "Laki-Laki") {
            jk = "L"
        } else if (val === "Perempuan") {
            jk = "P"
        }
        $(`#valueInput-${idJenisKelamin}`).val(jk)


        $(`#value-${idJenisKelamin}`).change(function() {
            var td = $(this).parent().attr('id');
            var value = $(this).val()
            var isi = null
            if (value === "Laki-Laki") {
                isi = "L"
            } else if (value === "Perempuan") {
                isi = "P"
            }
            $(`#valueInput-${idJenisKelamin}`).val(isi)
        })

        $('.tooltip-span').tooltip({
            title: function() {
                return $(this).text();
            }
        });
        hitungTotalRowSK()
    }

    $('#input-mahasiswa tbody').on('click', '.hapus-item', function() {
        $(this).closest('tr').remove();
        no = 1;
        $('#input-mahasiswa tbody').children('.row-grid').each(function() {
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
        hitungTotalRowSK()
    });


    $('#add-row').click(function() {
        var row = $('#input-mahasiswa tbody tr').length
        if (row > 0) {
            var empty = false;
            var kolom = null;
            var baris = null;
            var error = '';
            $('#input-mahasiswa tbody tr').each(function() {
                baris = $(this).index() + 1
                $(this).find('td').not(':first, :last').each(function() {
                    // if ($(this).text().trim() === '') {
                    //     empty = true;
                    //     kolom = $('#input-mahasiswa thead > tr th').eq($(this).index()).text()
                    //     error =
                    //         `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                    //     return false;
                    // }
                })
            })
            if (empty) {
                alert(error)
            } else {
                addRowSK()
            }
        } else {
            addRowSK()
        }
    })

    $('#input-mahasiswa tbody').on('click', 'td', function(event) {
        event.stopPropagation();
        var tr = $(this).parent()
        var tbody = $(tr).parent()
        $(tr).addClass('selected-row')
        $(this).addClass('selected-cell');
        tr.children().not(this).removeClass('selected-cell');
        tbody.children().not($(tr)).removeClass('selected-row')
        hideUnselectedCell(tr);
        hideUnselectedRow(tbody)
    });

    $('#input-mahasiswa tbody').on('keydown', 'input', function(event) {
        event.stopPropagation();
        var tr = $(this).closest('tr')
        var td = $(this).parent()
        var tdindex = $(this).parent().index()
        var code = event.keyCode
        var totaltd = $(tr).children('td').not(':first, :last').length - 1
        if (code === 9) {
            $(td).removeClass('selected-cell')
            if (tdindex === totaltd) {
                $('#add-kedinasan').click()
            } else {
                nextSelectedCell(tr, td, tdindex)
            }
        }
    });
    // END GRID KEDINASAN

    // SAVE TRIGGER
    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function(form, event) {
            event.preventDefault()
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            if (parameter == "true") {
                var url = "{{ url('dev-trans/file-doc-mahasiswa-update') }}";
                var pesan = "updated";
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var url = "{{ url('dev-trans/file-doc-mahasiswa') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode " + id;
            }

            var formData = new FormData(form);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            // checkTableSK()

            if (valid) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async: false,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        console.log(result);
                        if (result.data.status) {
                            var kode = result.data.kode;
                            dataTable.ajax.reload();
                            $('#input-mahsiswa tbody').empty()
                            $('#judul-form').html('Tambah Data Siswa');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            msgDialog({
                                id: kode,
                                type: 'simpan'
                            });
                            last_add(dataTable, "nama", kode);
                            $('#id_edit').val('false')
                        } else if (!result.data.status && result.data.message ===
                            "Unauthorized") {
                            window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>' + result.data.message + '</a>'
                            })
                        }
                    },
                    fail: function(xhr, textJenis, errorThrown) {
                        alert('request failed:' + textJenis);
                    }
                });
            }
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function(error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });
    // END SAVE TRIGGER

    // EDIT DATA
    $('#saku-form').on('click', '#btn-update', function() {
        var kode = $('#nu').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function() {
        var id = $(this).closest('tr').find('td').eq(0).html();
        var nama = $(this).closest('tr').find('td').eq(1).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();

        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');

        $('#judul-form').html('Edit Data Siswa "' + nama + '"');
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important'
        );
        editData(id);
    });

    function editData(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-trans/mahasiswa2-detail') }}",
            data: {
                kode: id
            },
            dataType: 'json',
            async: false,
            success: function(res) {
                var data = res.data
                if (data.status) {
                    $('#input-mahasiswa tbody').empty()
                    var gridField = data.data;
                    console.log(gridField.length);
                    valid = true
                    $('#id_edit').val('true')
                    $('#id').val(id)
                    $('#nim').val(gridField.nim)

                    if (gridField.length > 0) {
                        var html = null;
                        var no = 1;
                        var textJenis = null



                        for (var i = 0; i < gridField.length; i++) {
                            var row = gridField[i]
                            console.log(row);

                            var idNIM = 'nim-ke__' + no
                            var idNama = 'nama-ke__' + no
                            var idJenisKelamin = 'jenis-ke__' + no
                            var idKodeJur = 'kodejur-ke__' + no
                            var idFile = 'file-ke__' + no
                            var value_jk= "-"
                            if (row.jenis_kelamin === "Laki-Laki") {
                                    value_jk = "L"
                                } else if (row.jenis_kelamin === "Perempuan") {
                                    value_jk = "P"
                                }

                            html =
                                `<tr class="row-grid">
                            <td class="text-center">
                                <span class="no-grid ">${no}</span>
                                <input type="hidden" name="nomor[]" value="${no}">
                            </td>
                            <td id="${idNIM}">
                                <span id="text-${idNIM}" class="tooltip-span">${row.nim}</span>
                                <input autocomplete="off" type="text" id="value-${idNIM}" name="nim[]" class="form-control input-value hidden" value="${row.nim}" required readonly >
                            </td>
                            <td id="${idNama}">
                                <span id="text-${idNama}" class="tooltip-span">${row.nama}</span>
                                <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="${row.nama}" >
                            </td>
                            <td id="${idJenisKelamin}">
                                <span id="text-${idJenisKelamin}" class="tooltip-span">${row.jenis_kelamin}</span>
                                <select id="value-${idJenisKelamin}" class="form-control input-value hidden">
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <input type="hidden" id="valueInput-${idJenisKelamin}" name="jenis_kelamin[]"  value="${value_jk}">
                            </td>
                            <td id="${idKodeJur}">
                                <span id="text-${idKodeJur}" class="tooltip-span">${row.kode_jur}</span>
                                <input type='text' id="value-${idKodeJur}" name='kode_jur[]' class='form-control input-value hidden' style='z-index: 1;position: relative;' value='${row.kode_jur}' >
                                <a href='#' class='search-item search-jur hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'>
                                    <i class='simple-icon-magnifier' style='font-size: 18px;'></i>
                                </a>
                            </td>
                            <td id="${idFile}" style="word-wrap: break-word">
                                <input id='value-${idFile}' type='file' name='file_dok[]'>
                                <input type="hidden" name="fileName[]" id="fileName-${idFile}" value="-">
                                <input type="hidden" name="filePrevName[]" value="${row.dokumen}">
                                <input type="hidden" name="isUpload[]" id="checkUpload-${idFile}" value="false">
                            </td>  
                            <td class='text-center'>
                            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>`
                            console.log(row.dokumen);
                            if (row.dokumen !== "-" && row.dokumen !== "" && row.dokumen !== null) {
                                console.log(row.dokumen);
                                var tmp = row.dokumen.split('.');
                                var file = tmp[0];
                                var ext = tmp[1];
                                html += `<a class="download-item" href="{{ config('api.url') .'dev2/storage-file' }}/${file}/${ext}" 
                                    title="Lihat Dokumen" style="font-size:12px;cursor:pointer;" target="_blank">
                                        <i class="simple-icon-cloud-download"></i>
                                    </a>`
                            }
                            html += `</td>
                            </tr>`;

                            no++;
                            $('#input-mahasiswa tbody').append(html)
                            $('.tooltip-span').tooltip({
                                title: function() {
                                    return $(this).text();
                                }
                            });

                            $(`#value-${idJenisKelamin}`).val(row.jenis_kelamin).change()
                            $(`#value-${idJenisKelamin}`).change(function() {
                                var td = $(this).parent().attr('id');
                                var value = $(this).val()
                                var jk = null;
                                if (value === "Laki-Laki") {
                                    jk = "L"
                                } else if (value === "Perempuan") {
                                    jk = "P"
                                }
                                $(`#valueInput-${idJenisKelamin}`).val(jk)
                            })
                        }
                    }



                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    setHeightForm();
                    setWidthFooterCardBody();
                    hitungTotalRowSK()
                }
            }
        })
    }
    // END EDIT DATA

    // HAPUS DATA
    $('#saku-datatable').on('click', '#btn-delete', function(e) {
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type: 'hapus'
        });
    });

    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dev-trans/file-doc-mahasiswa') }}",
            data: {
                kode: id
            },
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Siswa dengan NIM (' + id +
                        ') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if (!result.data.status && result.data.message == "Unauthorized") {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>' + result.data.message + '</a>'
                    });
                }
            }
        });
    }
    // END HAPUS DATA

</script>