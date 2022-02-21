<!-- CSS tambahan -->
<style>
    th,td{
        padding:8px !important;
        vertical-align:middle !important;
    }
    input.error{
        border:1px solid #dc3545;
    }
    label.error{
        color:#dc3545;
        margin:0;
    }
    #table-data_paginate,#table-search_paginate
    {
        margin-top:0 !important;
    }

    #table-data_paginate ul,#table-search_paginate ul
    {
        float:right;
    }
    .form-body 
    {
        position: relative;
        overflow: auto;
    }

    #content-delete
    {
        position: relative;
        overflow: auto;
    }
    
    #table-search
    {
        border-collapse:collapse !important;
    }

    .hidden{
        display:none;
    }

    #table-search_filter label, #table-search_filter input
    {
        width:100%;
    }

    .dataTables_wrapper .paginate_button.previous {
    margin-right: 0px; }

    .dataTables_wrapper .paginate_button.next {
    margin-left: 0px; }

    div.dataTables_wrapper div.dataTables_paginate {
    margin-top: 25px; }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    justify-content: center; }

    .dataTables_wrapper .paginate_button.page-item {
        padding-left: 5px;
        padding-right: 5px; 
    }

    .dataTables_length select {
        border: 0;
        background: none;
        box-shadow: none;
        border:none;
        width:120px !important;
        transition-duration: 0.3s; 
    }

    #table-data_filter label
    {
        width:100%;
    }
    #table-data_filter label input
    {
        width:inherit;
    }
    #searchData
    {
        font-size: .75rem;
        height: 31px;
    }
    .dropdown-toggle::after {
        display:none;
    }
    .dropdown-aksi > .dropdown-item{
        font-size : 0.7rem;
    }
    .last-add::before{
        content: "***";
        background: var(--theme-color-1);
        border-radius: 50%;
        font-size: 3px;
        position: relative;
        top: -2px;
        left: -5px;
    }

    div.dataTables_wrapper div.dataTables_filter input{
        height:calc(1.3rem + 1rem) !important;
    }

    .input-group-prepend{
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    .input-group > .form-control 
    {
        border-radius: 0.5rem !important;
    }

    .input-group-prepend > span {
        margin: 5px;padding: 0 5px;
        background: #e9ecef !important;
        border: 1px solid #e9ecef !important;
        border-radius: 0.25rem !important;
        color: var(--theme-color-1);
        font-weight:bold;
        cursor:pointer;
    }

    span[class^=info-name]{
        cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        line-height:22px;

    }

    .info-icon-hapus{
        font-size: 14px;
        position: absolute;
        top: 10px;
        right: 35px;
        z-index: 3;
    }

    .form-control {
        padding: 0.1rem 0.5rem; 
        height: calc(1.3rem + 1rem);
        border-radius:0.5rem;
    }

    .selectize-input {
        min-height: unset !important;
        padding: 0.1rem 0.5rem; 
        height: calc(1.3rem + 1rem);
        line-height: 30px;
        border-radius: 0.5rem;
    }

    label{
        margin-bottom: 0.2rem;
    }

    .search-item2{
        cursor:pointer;
        font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
    }
</style>
<div class="row" id="saku-datatable">
<div class="col-12">
    <div class="card">
        <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
            <h5 style="position:absolute;top: 25px;">Data Jurusan</h5>
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
                            <th>Kode Jurusan</th>
                            <th>Nama</th>
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
<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12" style="height: 90px;">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
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
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_jur">Kode Jurusan</label>
                                    <input class="form-control" type="text" id="kode_jur" name="kode_jur">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama">Nama Jurusan</label>
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

<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:0.75em">
            <div class="modal-header py-0" style="display:block;">
                <h6 class="modal-title py-2" style="position: absolute;">Preview Data Jenis <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
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
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

//TD ACTION
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

//DATA TABLE
var dataTable = $('#table-data').DataTable({
    destroy: true,
    bLengthChange: false,
    sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
    "ordering": true,
    "order": [[3, "desc"]],
    'ajax': {
        'url': "{{url('dev-master/jurusan')}}",
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
        { data: 'kode_jur' },
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
    $('#judul-form').html('Tambah Data Jenis');
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
        kode_jur:
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
        var id = $('#kode_ta').val();
        if(parameter == "edit"){
            var url = "{{ url('dev-master/jurusan') }}";
            var pesan = "updated";
        }else{
            var url = "{{ url('dev-master/jurusan') }}";
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
                    $('#judul-form').html('Tambah Data Jurusan');
                    $('#method').val('post');
                    $('.input-group-prepend').addClass('hidden');
                    $('span[class^=info-name]').addClass('hidden');
                    $('#kode_jur').attr('readonly', false);
                    msgDialog({
                        id:result.data.kode,
                        type:'simpan'
                    });
                    last_add("kode_jur",result.data.kode);
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'Kode Jurusan sudah digunakan'
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
    
    $('#judul-form').html('Edit Data Jurusan');
    $('#form-tambah')[0].reset();
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');

    $.ajax({
        type: 'GET',
        url: "{{ url('dev-master/jurusan-detail') }}",
        dataType: 'json',
        data:{'kode_jur':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#kode_jur').val(id);
                $('#method').val('put');
                $('#kode_jur').attr('readonly', true);
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
        url: "{{ url('dev-master/jurusan') }}",
        dataType: 'json',
        data:{'kode_jur':id},
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload(); 
                $('#btn-tampil').click();                       
                showNotification("top", "center", "success","Hapus Data","Data Jurusan ("+id+")");
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
// END BUTTON HAPUS DATA

// PREVIEW DETAIL
$('#table-data tbody').on('click','td',function(e){
    if($(this).index() != 3){

        var id = $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row(this).data();
        var html = `<tr>
            <td style='border:none'>Kode Jurusan</td>
            <td style='border:none'>`+data.kode_jur+`</td>
        </tr>
        <tr>
            <td>Nama Jurusan</td>
            <td>`+data.nama+`</td>
        </tr>
        <tr>
            <td>Status Jurusan</td>
            <td>`+data.status+`</td>
        </tr>
        <tr>
            <td>Tanggal Input</td>
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
    
    $('#judul-form').html('Edit Data Jurusan');
    $('#form-tambah')[0].reset();
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');

    $.ajax({
        type: 'GET',
        url: "{{ url('dev-master/jurusan-detail') }}",
        dataType: 'json',
        data:{'kode_jur':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#kode_jur').val(id);
                $('#method').val('put');
                $('#kode_jur').attr('readonly', true);
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