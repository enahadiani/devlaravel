<link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />


<!-- LIST DATA -->
    <x-list-data judul="Data Tagihan" tambah="true" :thead="array('No Tagihan','NIS','Tanggal','Status','','Action')" :thwidth="array(15,15,15,15,15,15)" :thclass="array('','','','','','text-center')" />
<!-- END LIST DATA -->

<!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card" style=''>
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;width:100px;margin-right:5px"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <label for="no_tagihan" id="no_tagihan_html">No Tagihan</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_no_tagihan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input readonly type="text" class="form-control inp-label-no_tagihan" id="no_tagihan" name="no_tagihan" value="" title="">
                                                    <span readonly class="info-name_no_tagihan hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i readonly class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i readonly class="simple-icon-magnifier search-item2" id="search_no_tagihan"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label for="nim">NIS</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_nim" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-nim" id="nim" name="nim" value="" title="">
                                                    <span class="info-name_nim ">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_nim"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label for="tanggal">Tanggal</label>
                                                <input class="form-control" type="date" id="tanggal" name="tanggal">
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label for="periode">Periode</label>
                                                <input class="form-control" type="text" id="periode" name="periode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                                <label for="keterangan" >Keterangan</label>
                                                <textarea id="keterangan" name="keterangan" class="form-control" style="height:50px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-tagihan" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Nilai</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-tagihan" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            <div class="dropdown d-inline-block mx-0">
                                                <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                                <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href='#' id="download-template" >Download Template</a>
                                                    <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                                </div>
                                            </div>
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-tagihan" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th style="width:30%">Kode Jenis</th>
                                                    <th style="width:35%">Nama Jenis</th>
                                                    <th style="width:25%">Nilai</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
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
<!-- FORM INPUT  -->

<!-- MODAL CBBL -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h6 class="modal-title" style="position: absolute;margin-bottom:10px"></h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="">
                    
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL CBBL -->


@include('modal_upload')

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script>
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    
    var $iconLoad = $('.preloader');
    var $target   = "";
    var $target2  = "";
    var $target3  = "";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-tagihan tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

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
        setTimeout(function() {
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }
    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize();
    $('[id^=label]').attr('readonly',true);
    // END 

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
   //DATA TABLE
    var dataTable = $('#table-data').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        "ordering": true,
        "order": [[4, "desc"]],
        'ajax': {
            'url': "{{url('dev-trans/tagihan')}}",
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
            { data: 'no_tagihan' },
            { data: 'nim' },
            { data: 'tanggal' },
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

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    // END LIST DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Tagihan Siswa');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-tagihan tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('#no_tagihan_html').parent().addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        hitungTotalRow();
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

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Tagihan Siswa');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-trans/tagihan-detail') }}",
            dataType: 'json',
            data:{no_tagihan:id},
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#no_tagihan').attr('readonly', true);
                    $('#no_tagihan').val(result.data[0].no_tagihan);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#periode').val(result.data[0].periode);
                    $('#tanggal').val(result.data[0].tanggal);
                    $('#nim').val(result.data[0].nim);
            
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdkodeke"+no+" tooltip-span'>"+line.kode_jenis+"</span><input type='text' id='kode"+no+"' name='kode_jenis[]' class='form-control inp-kode kodeke"+no+" hidden' value='"+line.kode_jenis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-kode hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-jenis tdjeniske"+no+" tooltip-span'>"+line.nama_jenis+"</span><input type='text' name='nama_jenis[]' class='form-control inp-jenis jeniske"+no+" hidden'  value='"+line.nama_jenis+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+line.nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-tagihan tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                   
                        
                    }

                    hitungTotalRow();
                    // $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    //  console.log(result);
                    showInfoField('nim',result.daftar[0].nim,result.daftar[0].nama);
                    showInfoField('kode_jenis',result.daftar[0].kode_jenis,result.daftar[0].nama);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }
                $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    // HAPUS DATA
    function hapusData(id,kode){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dev-trans/tagihan') }}",
            dataType: 'json',
            data:{no_tagihan:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Penilaian ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
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
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            kode: id,
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // CBBL
    function showInfoField(kode, isi_kode, isi_nama) {
        $('#' + kode).val(isi_kode);
        $('#' + kode).attr('style', 'border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_' + kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode).removeClass('hidden');
        $('.info-name_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode + ' span').text(isi_nama);
        var width = $('#' + kode).width() - $('#search_' + kode).width() - 10;
        var height = $('#' + kode).height();
        var pos = $('#' + kode).position();
        $('.info-name_' + kode).width(width).css({
            'left': pos.left,
            'height': height
        });
        $('.info-name_' + kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    $('#download-template').click(function(){
        var kode_lokasi = "{{ Session::get('lokasi') }}";
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        var link = "{{ config('api.url').'dev/penilaian-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template&no_tagihan="+$('#kode_pp').val()+"&kode_kelas="+$('#kode_kelas').val()+"&kode_matpel="+$('.info-name_kode_matpel > span ').text()+"&kode_jenis="+$('#kode_jenis').val()+"&kode_kd="+$('#kode_kd').val()+"&kode_sem="+$('#kode_sem option:selected').text()+"&flag_kelas="+$('#flag_kelas').val()+"&kode_matpel2="+$('.info-code_kode_matpel').text();
        window.open(link, '_blank'); 
    });

    //SHOW SEARCH-MODAL
    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {param:par};
      
        
        switch(par){
            case 'nim': 
                header = ['NIS', 'Nama'];
                var toUrl = "{{ url('dev-master/siswa') }}";
                var columns = [
                    { data: 'nim' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Siswa";
                var pilih = "Siswa";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {nim:$('#nim').val()};
            break;
            case 'kode_jenis[]': 
                header = ['Kode Jenis', 'Nama'];
                var toUrl = "{{ url('dev-master/jenis') }}";
                var columns = [
                    { data: 'kode_jenis' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Jenis Tagihan";
                var pilih = "Siswa";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = ".td-nilai";
                parameter = {kode_jenis:$('#kode_jenis').val()};
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

    function getSiswa(id) {
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-master/siswa') }}",
            dataType: 'json',
            data: {
                nim: kode
            },
            async: false,
            success: function(result) {
                if (result.status) {
                    if (typeof result.daftar !== 'undefined' && result.daftar.length > 0) {
                        showInfoField('nim', result.daftar[0].nim, result.daftar[0].nama);
                    } else {
                        $('#nim').attr('readonly', false);
                        $('#nim').css('border-left', '1px solid #d7d7d7');
                        $('#nim').val('');
                        $('#nim').focus();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getJenis(id) {
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-master/jenis') }}",
            dataType: 'json',
            data: {
                kode_jenis: kode
            },
            async: false,
            success: function(result) {
                if (result.status) {
                    if (typeof result.daftar !== 'undefined' && result.daftar.length > 0) {
                        if (jenis == 'change') {
                            $('.' + target1).val(kode);
                            $('.td' + target1).text(kode);

                            $('.' + target2).val(result.daftar[0].nama);
                            $('.td' + target2).text(result.daftar[0].nama);
                            $('.td' + target3).text('');
                        } else {

                            $("#input-tagihan td").removeClass("px-0 py-0 aktif");
                            $('.' + target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.' + target1).closest('tr').find('.search-kode').hide();
                            $('.' + target1).val(id);
                            $('.td' + target1).text(id);
                            $('.' + target1).hide();
                            $('.td' + target1).show();

                            $('.' + target2).val(result.daftar[0].nama);
                            $('.td' + target2).text(result.daftar[0].nama);
                            $('.' + target2).show();
                            $('.td' + target2).hide();
                            $('.' + target2).focus();
                            $('.td' + target3).text('');
                        }
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                } else {
                    if (jenis == 'change') {

                        $('.' + target1).val('');
                        $('.' + target2).val('');
                        $('.td' + target2).text('');
                        $('.' + target1).focus();
                    } else {
                        $('.' + target1).val('');
                        $('.' + target2).val('');
                        $('.td' + target2).text('');
                        $('.' + target1).focus();
                        alert('Jenis Tagihan tidak valid');
                    }
                }
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

    // END CBBL
    jumFilter();


    // DATA NILAI - FORM

        // GRID JURNAL

        function hideUnselectedRow() {
            $('#input-tagihan > tbody > tr').each(function(index, row) {
                if(!$(row).hasClass('selected-row')) {
                    
                    var kode_jenis = $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                    var nama_jenis = $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-jenis").val();
                    var nilai = $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_jenis);
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_jenis);
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-jenis").val(nama_jenis);
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-jenis").text(nama_jenis);
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                    
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-jenis").hide();
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                    
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".search-kode").hide();
                    
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-jenis").show();
                    $('#input-tagihan > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                }
            })
        }

        $('#input-tagihan tbody').on('click', 'tr', function() {
            $(this).addClass('selected-row');
            $('#input-tagihan tbody tr').not(this).removeClass('selected-row');
            hideUnselectedRow();
        });

        $('#input-tagihan').on('click', '.search-item', function() {
            var par = $(this).closest('td').find('input').attr('name');

            var modul = '';
            var header = [];

            switch (par) {
                case 'kode_jenis[]':
                    var par2 = "nama_jenis[]";
                    break;
            }

            var tmp = $(this).closest('tr').find('input[name="' + par + '"]').attr('class');
            var tmp2 = tmp.split(" ");
            target1 = tmp2[2];

            tmp = $(this).closest('tr').find('input[name="' + par2 + '"]').attr('class');
            tmp2 = tmp.split(" ");
            target2 = tmp2[2];

            showFilter(par, target1, target2);
        });

        $('#input-tagihan').on('keydown', '.inp-kode, .inp-jenis, .inp-nilai', function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['.inp-kode', '.inp-jenis', '.inp-nilai'];
            var nxt2 = ['.td-kode', '.td-jenis', '.td-nilai'];
            if (code == 13 || code == 9) {
                e.preventDefault();
                var idx = $(this).closest('td').index() - 1;
                console.log($(this).closest('td').index());
                var idx_next = idx + 1;
                var kunci = $(this).closest('td').index() + 1;
                var isi = $(this).val();
                switch (idx) {
                    case 0:
                        var noidx = $(this).parents("tr").find(".no-nilai").text();
                        var kode = $(this).val();
                        var target1 = "kodeke" + noidx;
                        var target2 = "jeniske" + noidx;
                        getSiswa(kode, target1, target2, 'tab');
                        break;
                    case 1:
                        $("#input-tagihan td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        break;
                    case 2:
                        $("#input-tagihan td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        break;
                    case 3:
                        if (isi != "" && isi != 0) {
                            $("#input-tagihan td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                            $(this).closest('tr').find(nxt[idx]).val(isi);
                            $(this).closest('tr').find(nxt2[idx]).text(isi);
                            $(this).closest('tr').find(nxt[idx]).hide();
                            $(this).closest('tr').find(nxt2[idx]).show();
                            var cek = $(this).parents('tr').next('tr').find('.td-kode');
                            if (cek.length > 0) {
                                cek.click();
                            } else {
                                $('.add-row').click();
                            }
                            hitungTotalRow();
                        } else {
                            alert('Nilai yang dimasukkan tidak valid');
                            return false;
                        }
                        break;
                    default:
                        break;
                }
            } else if (code == 38) {
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx--;
            }
        });

        // MENAMBAH BARIS DATA NILAI
        $('#form-tambah').on('click', '.add-row', function(){
            var nim =$('#nim').val();
            if(nim != ""){
                var no=$('#input-tagihan .row-nilai:last').index();
                no=no+2;
                console.log(no);
                var input = "";
                input += "<tr class='row-nilai'>";
                input += "<td class='no-nilai text-center'>"+no+"</td>";
                input += "<td ><span class='td-kode tdkodeke"+no+" tooltip-span'></span><input type='text' id='kode"+no+"' name='kode_jenis[]' class='form-control inp-kode kodeke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-kode hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                input += "<td ><span class='td-jenis tdjeniske"+no+" tooltip-span'></span><input type='text' name='nama_jenis[]' class='form-control inp-jenis jeniske"+no+" hidden'  value='' readonly></td>";
                input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'></span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='' required></td>";
                input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                input += "</tr>";
                $('#input-tagihan tbody').append(input);
                // $('.nilke'+no).inputmask("numeric", {
                //     radixPoint: ",",
                //     groupSeparator: ".",
                //     digits: 2,
                //     autoGroup: true,
                //     rightAlign: true,
                //     oncleared: function () { self.Value(''); }
                // });

                hitungTotalRow();
                hideUnselectedRow();

                $('#input-tagihan td').removeClass('px-0 py-0 aktif');
                $('#input-tagihan tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
                // $('#input-tagihan tbody tr').find(".inp-kode").hide();
                // $('#input-tagihan tbody tr').find(".search-kode").hide();
                $('#input-tagihan tbody tr:last').find(".inp-kode").show();
                $('#input-tagihan tbody tr:last').find(".td-kode").hide();
                $('#input-tagihan tbody tr:last').find(".search-kode").show();
                $('#input-tagihan tbody tr:last').find(".inp-kode").focus();

                $('.tooltip-span').tooltip({
                    title: function(){
                        return $(this).text();
                    }
                });
            }else{
                alert('Harap pilih terlebih dahulu NIS Siswa');
            }

        });

             // END MENAMBAH BARIS DATA NILAI

        // SELECT BARIS DATA NILAI
        $('#input-tagihan').on('click', 'td', function() {
            var idx = $(this).index();
            if (idx == 0) {
                return false;
            } else {
                if ($(this).hasClass('px-0 py-0 aktif')) {
                    return false;
                } else {
                    $('#input-tagihan td').removeClass('px-0 py-0 aktif');
                    $(this).addClass('px-0 py-0 aktif');

                    var kode_jenis = $(this).parents("tr").find(".inp-kode").val();
                    var nama_jenis = $(this).parents("tr").find(".inp-jenis").val();
                    var nilai = $(this).parents("tr").find(".inp-nilai").val();
                    var no = $(this).parents("tr").find(".no-nilai").text();

                    $(this).parents("tr").find(".inp-kode").val(kode_jenis);
                    $(this).parents("tr").find(".td-kode").text(kode_jenis);
                    if (idx == 1) {
                        $(this).parents("tr").find(".inp-kode").show();
                        $(this).parents("tr").find(".td-kode").hide();
                        $(this).parents("tr").find(".search-kode").show();
                        $(this).parents("tr").find(".inp-kode").focus();
                    } else {
                        $(this).parents("tr").find(".inp-kode").hide();
                        $(this).parents("tr").find(".td-kode").show();
                        $(this).parents("tr").find(".search-kode").hide();

                    }

                    $(this).parents("tr").find(".inp-jenis").val(nama_jenis);
                    $(this).parents("tr").find(".td-jenis").text(nama_jenis);
                    if (idx == 2) {
                        $(this).parents("tr").find(".inp-jenis").show();
                        $(this).parents("tr").find(".td-jenis").hide();
                        $(this).parents("tr").find(".inp-jenis").focus();
                    } else {

                        $(this).parents("tr").find(".inp-jenis").hide();
                        $(this).parents("tr").find(".td-jenis").show();
                    }

                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                    if (idx == 3) {
                        $(this).parents("tr").find(".inp-nilai").show();
                        $(this).parents("tr").find(".td-nilai").hide();
                        $(this).parents("tr").find(".inp-nilai").focus();
                    } else {
                        $(this).parents("tr").find(".inp-nilai").hide();
                        $(this).parents("tr").find(".td-nilai").show();
                    }
                    hitungTotalRow();
                    var nama_jenis = $(this).parents("tr").find(".inp-jenis").val();
                    console.log(nama_jenis);
                }
            }
        });

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        // HAPUS BARIS DATA NILAI
        $('#input-tagihan').on('click', '.hapus-item', function() {
            $(this).closest('tr').remove();
            no = 1;
            $('.row-nilai').each(function() {
                var nom = $(this).closest('tr').find('.no-nilai');
                nom.html(no);
                no++;
            });
            hitungTotalRow();
            $("html, body").animate({
                scrollTop: $(document).height()
            }, 1000);
        });

    // END DATA NILAI - FORM

    // IMPORT EXCEL

    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        $('#modal-import').modal('show');
    });

    $("#form-import").validate({
        rules: {
            file: {required: true, accept: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"}
        },
        messages: {
            file: {required: 'Harus diisi!', accept: 'Hanya import dari file excel.'}
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            formData.append('kode_pp',$('#kode_pp').val());
            formData.append('kode_kelas',$('#kode_kelas').val());
            $('.pesan-upload').show();
            $('.pesan-upload-judul').html('Proses upload...');
            $('.pesan-upload-judul').removeClass('text-success');
            $('.pesan-upload-judul').removeClass('text-danger');
            $('.progress').removeClass('hidden');
            $('.progress-bar').attr('aria-valuenow', 0).css({
                                width: 0 + '%'
                            }).html(parseFloat(0 * 100).toFixed(2) + '%');
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').attr('aria-valuenow', percentComplete * 100).css({
                                width: percentComplete * 100 + '%'
                            }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                            // if (percentComplete === 1) {
                            //     $('.progress').addClass('hidden');
                            // }
                        }
                    }, false);
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('dev-trans/import-excel') }}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        if(result.data.validate){
                            $('#process-upload').removeClass('disabled');
                            $('#process-upload').prop('disabled', false);
                            $('#process-upload').removeClass('btn-light');
                            $('#process-upload').addClass('btn-primary');
                            $('.pesan-upload-judul').html('Berhasil upload!');
                            $('.pesan-upload-judul').removeClass('text-danger');
                            $('.pesan-upload-judul').addClass('text-success');
                            $('.pesan-upload-isi').html('File berhasil diupload!');
                        }else{
                            if(!$('#process-upload').hasClass('disabled')){
                                $('#process-upload').addClass('disabled');
                                $('#process-upload').prop('disabled', true);
                            }
                            
                            var kode_lokasi = "{{ Session::get('lokasi') }}";
                            var nik_user = "{{ Session::get('nikUser') }}";
                            var nik = "{{ Session::get('userLog') }}";

                            var link = "{{ config('api.url').'dev/penilaian-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=non&kode_pp="+$('#kode_pp').val()+"&kode_kelas="+$('#kode_kelas').val()+"&kode_matpel="+$('.info-name_kode_matpel > span ').text()+"&kode_jenis="+$('#kode_jenis').val()+"&kode_kd="+$('#kode_kd').val()+"&kode_sem="+$('#kode_sem option:selected').text()+"&flag_kelas="+$('#flag_kelas').val()+"&kode_matpel2="+$('.info-code_kode_matpel').text();

                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                },
                error: function(jqXHR, textStatus, errorThrown) { 
                    $('.progress').addClass('hidden');      
                    if(jqXHR.status == 422){
                        var msg = jqXHR.responseText;
                    }else if(jqXHR.status == 500) {
                        var msg = "Internal server error";
                    }else if(jqXHR.status == 401){
                        var msg = "Unauthorized";
                        window.location="{{ url('/dev-auth/sesi-habis') }}";
                    }else if(jqXHR.status == 405){
                        var msg = "Route not valid. Page not found";
                    }
                    $('.pesan-upload-judul').html('Gagal upload!');
                    $('.pesan-upload-isi').html(msg);
                    
                }
            });

        },
        errorPlacement: function (error, element) {
            $('#label-file').html(error);
            $('#label-file').addClass('error');
        }
    });

    $('.custom-file-input').change(function(){
        var fileName = $(this).val();
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-trans/nilai-tmp') }}",
            dataType: 'json',
            data:{'kode_pp':$('#kode_pp').val()},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdkodeke"+no+" tooltip-span'>"+line.kode_jenis+"</span><input type='text' id='kode"+no+"' name='kode_jenis[]' class='form-control inp-kode kodeke"+no+" hidden' value='"+line.kode_jenis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-kode hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-jenis tdjeniske"+no+" tooltip-span'>"+line.nama_jenis+"</span><input type='text' name='nama_jenis[]' class='form-control inp-jenis jeniske"+no+" hidden'  value='' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+line.nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-tagihan tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        // no= 1;
                        // for(var i=0;i<result.detail.length;i++){
                        //     var line =result.detail[i];
                        //     $('.nilke'+no).inputmask("numeric", {
                        //         radixPoint: ",",
                        //         groupSeparator: ".",
                        //         digits: 2,
                        //         autoGroup: true,
                        //         rightAlign: true,
                        //         oncleared: function () { self.Value(''); }
                        //     });
                        //     no++;
                        // }
                        
                    }
                    hitungTotalRow();
                    $('#modal-import').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }else{
                    alert('error');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dev-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    });
    // END IMPORT EXCEL

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            nim:
            {
                required: true
            },
            keterangan:{
                required:true
            },
            periode:{
                required:true
            },
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var jumdet = $('#input-tagihan tr').length;
            
            var param = $('#id').val();
            var id = $('#nim').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('dev-trans/tagihan') }}";
            }else{
                var url = "{{ url('dev-trans/tagihan') }}";
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail nilai tidak boleh kosong ');
            }else{
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

                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Tagihan Siswa');
                            $('#id').val('');
                            $('#input-tagihan tbody').html('');
                            $('[id^=label]').html('');                            
                            $('.input-group-prepend').addClass('hidden');
                            $('span[class^=info-name]').addClass('hidden');
                            $('.info-icon-hapus').addClass('hidden');
                            $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                            hitungTotalRow();
                            console.log(result.data.no_tagihan);

                            msgDialog({
                                id:result.data.no_tagihan,
                                type:'simpan'
                            });
                            
                            last_add("nim",result.data.nim);
                        }
                        else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                        }else{  
                            if(result.data.jenis == 'duplicate'){
                                msgDialog({
                                    id: result.data.no_tagihan,
                                    type: result.data.jenis,
                                    text: result.data.message
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
                        $iconLoad.hide();
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // ENTER FIELD FORM
    $('#tanggal,#jenis,#no_dokumen,#total_debet,#deskripsi,#total_kredit,#nik_periksa,#label_nik_periksa').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','jenis','no_dokumen','total_debet','deskripsi','total_kredit','nik_periksa','label_nik_periksa'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    // END ENTER FIELD FORM


    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        console.log($(this).index());
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('dev-trans/tagihan-detail') }}",
                data:{no_tagihan:id},
                dataType: 'json',
                async:false,
                success:function(res){
                    var result = res.data;
                    console.log(result);
                    if(result.status){

                        var html = 
                        `<tr>
                            <td style='border:none'>No Tagihan</td>
                            <td style='border:none'>`+result.data[0].no_tagihan+`</td>
                        </tr>
                        <tr>
                            <td>NIS Siswa</td>
                            <td>`+result.data[0].nim+`</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>`+result.data[0].keterangan+`</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>`+result.data[0].tanggal+`</td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>`+result.data[0].periode+`</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>`+data.status+`</td>
                        </tr>
                        <tr>
                            <td>Tgl Input</td>
                            <td>`+data.tgl_input+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:5%">No</th>
                                            <th style="width:30%">Kode Tagihan</th>
                                            <th style="width:35%">Jenis Tagihan</th>
                                            <th style="width:30%">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        
                        $('#table-preview tbody').html(html);
                        var det = ``;
                        if(result.detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0; i<result.detail.length; i++){
                                var line =result.detail[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line.kode_jenis+"</td>";
                                input += "<td >"+line.nama_jenis+"</td>";
                                input += "<td class='text-right'>"+line.nilai+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            kode:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#judul-form').html('Edit Data Tagihan Siswa');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-trans/tagihan-detail') }}",
            dataType: 'json',
            data:{no_tagihan:id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#no_tagihan').attr('readonly', true);
                    $('#no_tagihan').val(result.data[0].no_tagihan);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#periode').val(result.data[0].periode);
                    $('#tanggal').val(result.data[0].tanggal);
                    $('#nim').val(result.data[0].nim);
                    console.log(result);

                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdkodeke"+no+" tooltip-span'>"+line.kode_jenis+"</span><input type='text' id='kode"+no+"' name='kode_jenis[]' class='form-control inp-kode kodeke"+no+" hidden' value='"+line.kode_jenis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-kode hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-jenis tdjeniske"+no+" tooltip-span'>"+line.nama_jenis+"</span><input type='text' name='nama_jenis[]' class='form-control inp-jenis jeniske"+no+" hidden'  value='"+line.nama_jenis+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+line.nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-tagihan tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        // no= 1;
                        // for(var i=0;i<result.detail.length;i++){
                        //     var line =result.detail[i];
                        //     $('.nilke'+no).inputmask("numeric", {
                        //         radixPoint: ",",
                        //         groupSeparator: ".",
                        //         digits: 2,
                        //         autoGroup: true,
                        //         rightAlign: true,
                        //         oncleared: function () { self.Value(''); }
                        //     });
                        //     no++;
                        // }
                        
                    }
                    hitungTotalRow();
                    $('#modal-preview').modal('hide');
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                   window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }
            }
        });
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });
    // END PREVIEW

    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var tmp = $('#inp-filter_kode_pp').val().split("-");
                var kode_pp = tmp[0];
                // var status = $('#inp-filter_status').val();
                var col_kode_pp = data[6];
                // var col_status = data[5];
                if(kode_pp != "" ){
                    if(kode_pp == col_kode_pp){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });
    
    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_kode_pp')[0].selectize.setValue('');
        $('#inp-filter_status')[0].selectize.setValue('');
        jumFilter();
    });

    $('[name^=inp-filter]').change(function(e){
        e.preventDefault();
        jumFilter();
    });
    
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });
    
    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });
    
    $('#btn-tampil').click();


</script>

