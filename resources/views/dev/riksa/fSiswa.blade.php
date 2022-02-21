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

<!-- DATATABLES -->
<div class="row" id="saku-datatable">
    <div class="col-12">
        <div class="card">
            <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                <h5 style="position:absolute;top: 25px;">Data Jenis</h5>
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
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th></th>
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
                                    <label for="nim">NIS</label>
                                    <input class="form-control" type="text" id="nim" name="nim">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama">Nama Siswa</label>
                                    <input class="form-control" type="text" id="nama" name="nama">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_jur">Jurusan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_jur" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_jur" id="kode_jur" name="kode_jur" value="" title="">
                                        <span class="info-name_kode_jur hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_jur"></i>
                                    </div>
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

<!-- MODAL CBBL -->
<div class="modal" tabindex="-1" role="dialog" id="modal-search">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content">
            <div style="display: block;" class="modal-header">
                <h5 class="modal-title" style="position: absolute;margin-bottom:10px"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">
                
            </div>
        </div>
    </div>
</div>
<!-- END MODAL CBBL -->

<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:0.75em">
            <div class="modal-header py-0" style="display:block;">
                <h6 class="modal-title py-2" style="position: absolute;">Preview Data Siswa<span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
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
setHeightForm();
var $iconLoad = $('.preloader');
var $target = "";
var $target2 = "";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$('[id^=label]').attr('readonly',true);

var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);

var scroll = document.querySelector('#content-preview');
var psscroll = new PerfectScrollbar(scroll);

//GET TABLE JURUSAN
function getJurusan(id){

    if(id == ""){
        return false;
    }

    $.ajax({
        type: 'GET',
        url: "{{ url('dev-master/jurusan') }}",
        dataType: 'json',
        data:{kode_jur:id},
        async:false,
        success:function(result){    
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('kode_jur',result.daftar[0].kode_jur,result.daftar[0].nama);
                    
                }else{
                    $('#kode_jur').attr('readonly',false);
                    $('#kode_jur').css('border-left','1px solid #d7d7d7');
                    $('#kode_jur').val('');
                    $('#kode_jur').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('dev-auth/sesi-habis') }}";
            }
        }
    });
}

$('[data-toggle="tooltip"]').tooltip(); 

function showInfoField(kode,isi_kode,isi_nama){
    $('#'+kode).val(isi_kode);
    $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
    $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
    $('.info-code_'+kode).attr('title',isi_nama);
    $('.info-name_'+kode).removeClass('hidden');
    $('.info-name_'+kode).attr('title',isi_nama);
    $('.info-name_'+kode+' span').text(isi_nama);
    var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
    var height =$('#'+kode).height();
    var pos =$('#'+kode).position();
    $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
    $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
}

jumFilter();

//SHOW SEARCH-MODAL
function showFilter(param,target1,target2){
    var par = param;
    var modul = '';
    var header = [];
    $target = target1;
    $target2 = target2;
    var parameter = {param:par};
    
    switch(par){
        case 'kode_jur': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('dev-master/jurusan') }}";
            var columns = [
                { data: 'kode_jur' },
                { data: 'nama' }
            ];
            var judul = "Daftar Jurusan";
            var pilih = "jurusan";
            var jTarget1 = "text";
            var jTarget2 = "text";
            $target = ".info-code_"+par;
            $target2 = ".info-name_"+par;
            $target3 = "";
            $target4 = "";
            parameter = {kode_jur:$('#kode_jur').val()};
        break;
    }

    var header_html = '';
    var width = ["30%","70%"];
    for(i=0; i<header.length; i++){
        header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
    }

    var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
    table += "<tbody></tbody></table>";

    $('#modal-search .modal-body').html(table);

    var searchTable = $("#table-search").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<f><"clearfix">>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        ajax: {
            "url": toUrl,
            "data": parameter,
            "type": "GET",
            "async": false,
            "dataSrc" : function(json) {
                return json.daftar;
            }
        },
        columns: columns,
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
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        },
    });

    $('#modal-search .modal-title').html(judul);
    $('#modal-search').modal('show');
    searchTable.columns.adjust().draw();

    $('#table-search tbody').on('click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            searchTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
                $($target).attr('value',kode);
            }else{
                $('#'+par).css('border-left',0);
                $('#'+par).val(kode);
                $($target).text(kode);
                $($target).attr("title",nama);
                $($target).parents('div').removeClass('hidden');
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                
                console.log('sini2');
                var width= $('#'+par).width()-$('#search_'+par).width()-10;
                var pos =$('#'+par).position();
                var height = $('#'+par).height();
                console.log(par);
                $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                $($target2+' span').text(nama);
                $($target2).attr("title",nama);
                $($target2).removeClass('hidden');
                $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        }
    });
}

$('#form-tambah').on('click', '.search-item2', function(){
    if($(this).css('cursor') == "not-allowed"){
        return false;
    }
    var par = $(this).closest('div').find('input').attr('name');
    showFilter(par);
});

$('.info-icon-hapus').click(function(){
    var par = $(this).closest('div').find('input').attr('name');
    $('#'+par).val('');
    $('#'+par).attr('readonly',false);
    $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_'+par).parent('div').addClass('hidden');
    $('.info-name_'+par).addClass('hidden');
    $(this).addClass('hidden');
});

//TD ACTION
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

//DATA TABLE
var dataTable = $('#table-data').DataTable({
    destroy: true,
    bLengthChange: false,
    sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
    "ordering": true,
    "order": [[4, "desc"]],
    'ajax': {
        'url': "{{url('dev-master/siswa')}}",
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
            "targets": [4],
            "visible": false,
            "searchable": false
        },
        {'targets': 5, data: null, 'defaultContent': action_html }
    ],
    'columns': [
        { data: 'nim' },
        { data: 'nama' },
        { data: 'nama_jur' },
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
    $('#nim').attr('readonly', false);
    $('.info-icon-hapus').addClass('hidden');
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
        nim:
        {
            required: true,
            maxlength:15   
        },
        nama:
        {
            required: true,
            maxlength:50   
        },
        kode_jur:
        {
            required: true
        }
    },
    errorElement: "label",
    submitHandler: function (form) {
        var parameter = $('#id_edit').val();
        var id = $('#nim').val();
        if(parameter == "edit"){
            var url = "{{ url('dev-master/siswa') }}";
            var pesan = "updated";
        }else{
            var url = "{{ url('dev-master/siswa') }}";
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
                    $('.info-icon-hapus').addClass('hidden');
                    $('.input-group-prepend').addClass('hidden');
                    $('span[class^=info-name]').addClass('hidden');
                    $('#nim').attr('readonly', false);
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
                            text:'NIS sudah digunakan'
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
        url: "{{ url('dev-master/siswa-detail') }}",
        dataType: 'json',
        data:{'nim':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#nim').val(id);
                $('#method').val('put');
                $('#nim').attr('readonly', true);
                $('#nama').val(result.daftar[0].nama);
                $('#kode_jur').val(result.daftar[0].kode_jur);
                // $('#row-id').show();
                $('#saku-datatable').hide();
                $('#saku-form').show();
                showInfoField('kode_jur',result.daftar[0].kode_jur,result.daftar[0].nama_jur);
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
        url: "{{ url('dev-master/siswa') }}",
        dataType: 'json',
        data:{'nim':id},
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
    if($(this).index() != 4){

        var id = $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row(this).data();
        var html = `<tr>
            <td style='border:none'>NIS</td>
            <td style='border:none'>`+data.nim+`</td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td>`+data.nama+`</td>
        </tr>
         <tr>
            <td>Jurusan</td>
            <td>`+data.nama_jur+`</td>
        </tr>
        <tr>
            <td>Status</td>
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
        url: "{{ url('dev-master/siswa-detail') }}",
        dataType: 'json',
        data:{'nim':id},
        async:false,
        success:function(result){
            if(result.status){
                $('#id_edit').val('edit');
                $('#nim').val(id);
                $('#method').val('put');
                $('#nim').attr('readonly', true);
                $('#nama').val(result.daftar[0].nama);
                $('#kode_jur').val(result.daftar[0].kode_jur);
                // $('#row-id').show();
                $('#saku-datatable').hide();
                $('#saku-form').show();
                $('#modal-preview').modal('hide');
                showInfoField('kode_jur',result.daftar[0].kode_jur,result.daftar[0].nama_jur);
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