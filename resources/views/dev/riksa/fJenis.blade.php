    <link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
<!-- CSS tambahan -->

<!-- DATATABLES -->
<div class="row" id="saku-datatable">
    <div class="col-12">
        <div class="card">
            <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                <h5 style="position:absolute;top: 25px;">Data Jenis Tagihan</h5>
                <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="simple-icon-plus"></i> Tambah</button>
            </div>
            <div class="separator mb-2"></div>
            <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                    <div class="page-countdata">
                        <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search..."
                        aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">
                        <div class="input-group-append" >
                            <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                <div class="table-responsive ">
                    <table id="table-data" style='width:100%'>                                    
                        <thead>
                            <tr>
                                <th>Kode Jenis Tagihan</th>
                                <th>Nama Jenis Tagihan</th>
                                <th>Status</th>
                                <th>Tgl Input</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DATATABLES -->

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0,5rem;padding-bottom:0,5rem;min-height:48px;">
                    <h5 id="judul-form" style="position:absolute;top:15px"></h5>
                    <button type="submit" class="btn btn-primary btn-save float-right"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                </div>
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <div class="form-group row" id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="kode_jenis">Kode Jenis</label>
                                    <input class="form-control" type="text" id="kode_jenis" name="kode_jenis">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="nama">Nama Jenis Tagihan</label>
                                    <input class="form-control" type="text" id="nama" name="nama">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END FORM INPUT -->

<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:0.75em">
            <div class="modal-header py-0" style="display:block;">
                <h6 class="modal-title py-2" style="position: absolute;">Preview Data Jenis<span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
                <button type="button" class="close float-right ml-3" data-dismiss="modal" aria-label="Close" style="line-height:3.5">
                <span aria-hidden="true">&times;</span>
                </button>

                <div class="dropdown d-inline-block float-right">
                    <button class="btn dropdown-toggle mb-1" type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0">
                    <h6 class="mx-0 my-0 py-2">Aksi <i class="simple-icon-arrow-down ml-1" style="font-size: 10px;"></i></h6>
                    </button>
                    <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                        <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                        <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                        <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                        <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                        <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                        <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                        <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                    </div>
                </div>
            </div>
            <div class="modal-body" id="content-preview" style="height:520px">
                <table id="table-preview" class="table no-border">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PREVIEW -->    

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script>
$('#saku-form > .col-12').addClass('mx-auto col-lg-6');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});


// TD ACTION
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

//DATA TABLE
var dataTable = $('#table-data').DataTable({
    destroy: true,
    bLengthChange: false,
    sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
    "ordering": true,
    "order": [[3, "desc"]],
    'ajax': {
        'url': "{{url('dev-master/jenis')}}",
        'async':false,
        'type': 'GET',
        'dataSrc' : function(json) {
            if(json.status){
                return json.daftar;   
            }else if(!json.status && json.message == "Unauthorized"){
                window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                return [];
            }else{
                return [];
            }
        }
    },
    'columnDefs': [
        {
            "targets": 0,
            "createdCell": function (td, cellData, rowData, row, col) {
                if ( rowData.status == "baru" ) {
                    $(td).parents('tr').addClass('selected');
                    $(td).addClass('last-add');
                }
            }
        },
        {
            "targets": [3],
            "visible": false,
            "searchable": false
        },
        {'targets': 4, data: null, 'defaultContent': action_html }
    ],
    'columns': [
        { data: 'kode_jenis' },
        { data: 'nama' },
         { data: 'status' },
        { data: 'tgl_input'}
    ],
    drawCallback: function () {
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
        "lengthMenu": 'Menampilkan <select>'+
        '<option value="10">10 per halaman</option>'+
        '<option value="25">25 per halaman</option>'+
        '<option value="50">50 per halaman</option>'+
        '<option value="100">100 per halaman</option>'+
        '</select>',
        
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
        infoFiltered: "(terfilter dari _MAX_ total entri)"
    }
});
$.fn.DataTable.ext.pager.numbers_length = 5;

//SEARCH DATA
$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

//PAGE COUNT
$("#page-count").on("change", function (event) {
    var selText = $(this).val();
    dataTable.page.len(parseInt(selText)).draw();
});

//LAST ADD
function last_add(param,isi){
    var rowIndexes = [];
    dataTable.rows( function ( idx, data, node ) {             
        if(data[param] === isi){
            rowIndexes.push(idx);                  
        }
        return false;
    }); 
    dataTable.row(rowIndexes).select();
    $('.selected td:eq(0)').addClass('last-add');
    console.log('last-add');
    setTimeout(function() {
        console.log('timeout');
        $('.selected td:eq(0)').removeClass('last-add');
        dataTable.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

// BUTTON TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function(){
    $('#row-id').hide();
    $('#judul-form').html('Tambah Data Jenis ');
    $('#btn-update').attr('id','btn-save');
    $('#btn-save').attr('type','submit');
    $('#form-tambah')[0].reset();
    $('#form-tambah').validate().resetForm();
    $('#method').val('post');
    $('#id_edit').val('');
    $('#kode_jenis').attr('readonly', false);
    $('#saku-datatable').hide();
    $('#saku-form').show();
    $('.input-group-prepend').addClass('hidden');
    $('span[class^=info-name]').addClass('hidden');
});
// END BUTTON TAMBAH

// BUTTON KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
});
// END BUTTON KEMBALI

// BUTTON UPDATE
$('#saku-form').on('click', '#btn-update', function(){
    var kode = $('#kode_vendor').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});
// END BUTTON UPDATE

//BUTTON SIMPAN /SUBMIT
$('#form-tambah').validate({
    ignore: [],
    rules: 
    {
        kode_jenis:
        {
            required: true,
            maxlength:10   
        },
        nama:
        {
            required: true,
            maxlength:50    
        },
    },
    errorElement: "label",
    submitHandler: function (form) {
        var parameter = $('#id_edit').val();
        var id = $('#kode_jenis').val();
        if(parameter == "edit"){
            var url = "{{ url('dev-master/jenis') }}";
            var pesan = "updated";
        }else{
            var url = "{{ url('dev-master/jenis') }}";
            var pesan = "saved";
        }

        var formData = new FormData(form);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST', 
            url: url,
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();
                    $('#btn-tampil').click();    
                    $('#row-id').hide();
                    $('#form-tambah')[0].reset();
                    $('#form-tambah').validate().resetForm();
                    $('[id^=label]').html('');
                    $('#id_edit').val('');
                    $('#judul-form').html('Tambah Data Jenis');
                    $('#method').val('post');
                    $('.input-group-prepend').addClass('hidden');
                    $('span[class^=info-name]').addClass('hidden');
                    $('#kode_jenis').attr('readonly', false);
                    msgDialog({
                        id:result.data.kode,
                        type:'simpan'
                    });
                    last_add("kode_jenis",result.data.kode);
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'Kode Jenis sudah digunakan'
                        });
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        // $('#btn-simpan').html("Simpan").removeAttr('disabled');
    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});
// END BUTTON SIMPAN

// BUTTON EDIT
$('#saku-datatable').on('click', '#btn-edit', function(){
    var id = $(this).closest('tr').find('td:eq(0)').html();
    
    $('#judul-form').html('Edit Data Jenis');
    $('#form-tambah')[0].reset();
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');

    $.ajax({
        type: 'GET',
        url: "{{ url('dev-master/jenis-detail') }}",
        dataType: 'json',
        data:{'kode_jenis':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#kode_jenis').val(id);
                $('#method').val('put');
                $('#kode_jenis').attr('readonly', true);
                $('#nama').val(result.daftar[0].nama);
                // $('#row-id').show();
                $('#saku-datatable').hide();
                $('#saku-form').show();
            }else if(!result.status && result.message == "Unauthorized"){
                window.location.href = "{{ url('dev-auth/sesi-habis') }}";
            }
        }
    });
});
// END BUTTON EDIT

// BUTTON HAPUS DATA
function hapusData(id,kode){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('dev-master/jenis') }}",
        dataType: 'json',
        data:{'kode_jenis':id},
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload(); 
                $('#btn-tampil').click();                       
                showNotification("top", "center", "success","Hapus Data","Data Jenis ("+id+")");
                $('#modal-pesan-id').html('');
                $('#table-delete tbody').html('');
                $('#modal-pesan').modal('hide');
            }else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('dev-auth/sesi-habis') }}";
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>'+result.data.message+'</a>'
                });
            }
        }
    });
}

 $('#saku-datatable').on('click','#btn-delete',function(e){
    var kode = $(this).closest('tr').find('td:eq(0)').html();

    msgDialog({
        id: kode,
        type:'hapus'
    });
});
// END BUTTON HAPUS

// PREVIEW DETAIL
$('#table-data tbody').on('click','td',function(e){
    if($(this).index() != 3){

        var id = $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row(this).data();
        var html = `<tr>
            <td style='border:none'>Kode Jenis</td>
            <td style='border:none'>`+data.kode_jenis+`</td>
        </tr>
        <tr>
            <td>Nama Jenis</td>
            <td>`+data.nama+`</td>
        </tr>
        <tr>
            <td>Status Jenis</td>
            <td>`+data.status+`</td>
        </tr>
        <tr>
            <td>Tgl Input</td>
            <td>`+data.tgl_input+`</td>
        </tr>
        `;
        $('#table-preview tbody').html(html);
        
        $('#modal-preview-id').text(id);
        $('#modal-preview').modal('show');
    }
});

// BUTTON DELETE 2
$('.modal-header').on('click','#btn-delete2',function(e){
    var id = $('#modal-preview-id').text();
    $('#modal-preview').modal('hide');
    msgDialog({
        id:id,
        type:'hapus'
    });
});

//BUTTON EDIT 2
$('.modal-header').on('click', '#btn-edit2', function(){
    var id= $('#modal-preview-id').text();
    
    $('#judul-form').html('Edit Data Jenis');
    $('#form-tambah')[0].reset();
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');

    $.ajax({
        type: 'GET',
        url: "{{ url('dev-master/jenis-detail') }}",
        dataType: 'json',
        data:{'kode_jenis':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#kode_jenis').val(id);
                $('#method').val('put');
                $('#kode_jenis').attr('readonly', true);
                $('#nama').val(result.daftar[0].nama);
                // $('#row-id').show();
                $('#saku-datatable').hide();
                $('#saku-form').show();
                $('#modal-preview').modal('hide');
            }else if(!result.status && result.message == "Unauthorized"){
                window.location.href = "{{ url('dev-auth/sesi-habis') }}";
            }
        }
    });
});

//BUTTON CETAK
$('.modal-header').on('click','#btn-cetak',function(e){
    e.stopPropagation();
    $('.dropdown-ke1').addClass('hidden');
    $('.dropdown-ke2').removeClass('hidden');
    console.log('ok');
});

//BUTTON CETAK 2
$('.modal-header').on('click','#btn-cetak2',function(e){
    // $('#dropdownAksi').dropdown('toggle');
    e.stopPropagation();
    $('.dropdown-ke1').removeClass('hidden');
    $('.dropdown-ke2').addClass('hidden');
});
</script>