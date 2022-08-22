<link rel="stylesheet" href="{{ asset('trans.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<style>
    .popover{
        top: -80px !important;
    }

    #input-peserta tbody td,#input-error tbody td
    {
        overflow:hidden;
        padding-top:4px !important; 
        padding-bottom:4px !important;
    }

    table.dataTable{
        border-collapse:collapse;
    }

    .dataTables_scrollBody #input-peserta th, .dataTables_scrollBody #input-budget th, .dataTables_scrollBody #input-error th
    {
        padding-top:0px !important; 
        padding-bottom:0px !important;
    }

    .dataTables_scrollBody #prev-peserta th
    {
        padding-top:0px !important; 
        padding-bottom:0px !important;
    }

    #prev-peserta tbody td
        {
            overflow:hidden;
            padding-top:4px !important; 
            padding-bottom:4px !important;
        }
</style>

<!-- LIST DATA -->
<x-list-data judul="Data Mahasiswa" tambah="true" :thead="array('NIM','Nama Mahasiswa','Jenis Kelamin','Jurusan','Status','Action')" :thwidth="array(15,15,15,15,15,15)" :thclass="array('','','','','','text-center')" />
<!-- END LIST DATA -->

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                    <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;width:100px;margin-right:5px"><i class="fa fa-undo"></i> Keluar</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body" style="padding-bottom: 0 !important">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row hidden" id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            <input type="hidden" name="kode_form" id="kode_form">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <span id="tanggal-dp"></span>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="deskripsi">Keterangan</label>
                                        <input class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="upload-data" class="btn btn-primary float-right">Upload</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="validate-data" class="btn btn-primary">Validasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-peserta" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Mahasiswa</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-error" role="tab" aria-selected="true"><span class="hidden-xs-down">Pesan Validasi</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-peserta" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;min-height:43.2px">
                                <a href="#" id="download-template" type="button" style="position:relative; top:8px;"><i class="simple-icon-cloud-download mx-2" style="font-size:18px;position:relative; top:3px;"></i> Download Template</a>
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" >0 rows</span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered striped display nowrap" id="input-peserta" style="width:100%;">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                      @php 
                                        $column = array("No","NIM","Nama Mahasiswa","Jenis Kelamin","Jurusan");
                                        $width = array(5,15,15,15,15);
                                        @endphp
                                        @for($i=0; $i < count($column); $i++)
                                            <th style='width:{{ $width[$i] }}%'>{{ $column[$i] }}</th>
                                        @endfor
                                    </tr>

                                   
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-error" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;height:43.2px">
                                <a href="#" id="download-error" type="button" style="position:relative; top:8px;"><i class="simple-icon-cloud-download mx-2" style="font-size:18px;position:relative; top:3px;"></i> Download Pesan Error</a>
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-error" >0 rows</span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered striped display nowrap" id="input-error" style="width:100%;">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:10%">No</th>
                                        <th style="width:90%">Error Message</th>
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
        </div>
    </div>
</form>
<!-- FORM INPUT  --> 

@include('modal_upload')

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>

    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);

    setHeightForm();
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
        var total_row = tablepeserta.data().count();
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowBudget(form){
        var total_row = tablebudget.data().count()
        $('#total-row-budget').html(total_row+' Baris');
    }

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);    

    $('.selectize').selectize();

    $("#tanggal").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tanggal-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });
    // END 

    // FUNCTION AJAX
    // Menghapus data mahasiswa tmp pada database dev_mahasiswa_tmp
    function clearTmp(){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dev-trans/mahasiswa-upload-clear-temp') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                if(result.status){
                    tablepeserta.ajax.reload();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }else{
                    alert(result.message);
                }
            }
        });
    }

    $('#tanggal').change(function(e){
        // e.preventDefault();
        var tanggal = $('#tanggal').val();
        if(tanggal == ""){
            alert('Tanggal wajib diisi');
            return false;
        }
        generateNoBukti(tanggal);
    })

      

    // LIST DATA
    var action_html = "<a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var action_html2 = "";
    var dataTable = generateTable(
        "table-data",
        "{{ url('dev-trans/mahasiswa') }}", 
        [
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }
        ],
        [
            { data: 'nim' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'nama_jur' },
            { data: 'status'}
        ],
        "{{ url('dev-auth/sesi-habis') }}",
        [[3 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 3;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    // GRID
        var tablepeserta = $("#input-peserta").DataTable({
            destroy: true,
            scrollX: true,
            pageLength: 50,
            scrollY: '50vh',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('dev-trans/mahasiswa-upload-tmp') }}",
                type: "POST",
                data: function(prm) {
                    return $.extend({}, prm, {})
                }
            },
            deferRender: true,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            columns: [
                { data: 'no' },
                { data: 'nim' },
                { data: 'nama' },
                { data: 'jenis_kelamin' },
                { data: 'kode_jur' }
            ],
            order:[],
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
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            }
        });
        var tableerror = $("#input-error").DataTable({
            destroy: true,
            scrollX: true,
            pageLength: 50,
            scrollY: 'calc(100vh - 360px)',
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            data: [],
            columns: [
                { data: 'no' },
                { data: 'error' }
            ],
            order:[],
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
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            }
        });
    //END GRID

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dev-trans/mahasiswa') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Upload Peserta ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');                  
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
            }
        });
    }
    $('#saku-datatable').on('click','#btn-delete',function(e){
            var id = $(this).closest('tr').find('td').eq(0).html();
            msgDialog({
                id: id,
                type:'hapus'
            });
        });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#validate-data').addClass('disabled');
        $('#validate-data').prop('disabled', true);
        $('#btn-save').addClass('disabled');
        $('#btn-save').prop('disabled', true);
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Upload Mahasiswa');
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
        clearTmp();
        tablepeserta.columns.adjust().draw();
        setHeightForm();
        setWidthFooterCardBody();
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

    // IMPORT EXCEL
    $('#upload-data').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        if(typeof M == 'undefined'){
            $('#modal-import').modal('show');
        }else{
            $('#modal-import').bootstrapMD('show');
        }
    });

    // Menyimpan data import ke table dev_mahasiswa_tmp / tabel sementara
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
            if(!$('#process-upload').hasClass('disabled')){
                $('#process-upload').addClass('disabled');
                $('#process-upload').prop('disabled', true);
            }
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
                            console.log(percentComplete);
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
                            console.log(percentComplete);
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('dev-trans/dev-mahasiswa-upload') }}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    console.log(result);
                        
                    $('#btn-save').addClass('disabled');
                        $('#btn-save').prop('disabled', true);
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
                            var link = "{{ config('api.url').'dev2/export-mahasiswa2' }}?type=template";
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                        console.log("Gagal 2 ");
                    }
                    else{
                        console.log("Gagal");
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: JSON.stringify(result.data.message)
                        });
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    console.log("Gagal");
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
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
        console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        tablepeserta.ajax.reload();
        tablepeserta.columns.adjust().draw();
        tableerror.clear().draw();
        hitungTotalRow();
        $('#validate-data').removeClass('disabled');
        $('#validate-data').prop('disabled', false);
        if(typeof M == 'undefined'){
            $('#modal-import').modal('hide');
        }else{
            $('#modal-import').bootstrapMD('hide');
        }
    });

    $('#validate-data').click(function(e){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('/dev-trans/mahasiswa-upload-validate') }}",
            dataType: 'json',
            data: {nik_user: "{{ Session::get('nikUser') }}"},
            async:false,
            success:function(result){
                tableerror.clear().draw();
                if(!result.status){
                    $('#btn-save').addClass('disabled');
                    $('#btn-save').prop('disabled', true);
                    tableerror.rows.add(result.data).draw(false);
                    tableerror.columns.adjust().draw();
                    $('.nav-tabs a[href="#data-error"]').tab('show');
                    if(typeof M == 'undefined'){
                        $('#modal-import').modal('hide');
                    }else{
                        $('#modal-import').bootstrapMD('hide');
                    }
                    if(result.message == 'Unauthorized'){
                        window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                    }else if(result.message == 'Sukses'){
                        // 
                    }else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: JSON.stringify(result.message)
                        });
                    }
                }else{
                    msgDialog({
                        id: '-',
                        type: 'sukses',
                        title: 'Sukses',
                        text: 'Validasi data berhasil'
                    });
                    $('#btn-save').removeClass('disabled');
                    $('#btn-save').prop('disabled', false);
                }
            }
        });
    });

    $('#download-template').click(function(){
      
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        console.log(nik);
        var link = "{{ config('api.url').'dev2/export-mahasiswa2' }}?type=template";
        console.log(link);
        window.open(link, '_blank'); 
       
    });

    $('#download-error').click(function(){
        var kode_lokasi = "{{ Session::get('lokasi') }}";
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        var link = "{{ config('api.url').'billing-trans/error-payroll-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik;
        window.open(link, '_blank'); 
    });


    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {
            console.log(form);
            var formData = new FormData(form);
            console.log(formData);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            var jumdet = tablepeserta.data().count();
            var param = $('#id').val();
            var id = $('#nim').val();

            var url = "{{ url('/dev-trans/mahasiswa-simpan') }}";

            if(jumdet == 0){
                alert('Transaksi tidak valid. Detail Mahasiswa tidak boleh kosong ');
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
                        // alert('Input data '+result.message);
                        if(result.data.status){
                            // location.reload();
                            dataTable.ajax.reload();
                            tablepeserta.ajax.reload();
                            tableerror.clear().draw();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Upload Payroll');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:'-',
                                type:'simpan',
                                text: result.data.message
                            });

                            if(result.data.no_pooling != undefined){
                                kirimWAEmail(result.data.no_pooling);
                            }

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                        }
                        else{
                            msgDialog({
                                id: '-',
                                type: 'warning',
                                title: 'Gagal',
                                text: result.data.message
                            });
                        }
                        // $iconLoad.hide();
                    },
                    error: function(xhr, status, error) {
                        var error = JSON.parse(xhr.responseText);
                        var detail = Object.values(error.trace);
                        console.log(detail);
                        if(xhr.status == 422){
                            var keys = Object.keys(error.trace);
                            var tab =  $('#'+keys[0]).parents('.tab-pane').attr('id');
                            $('a[href="#'+tab+'"]').click();
                            $('#'+keys[0]).addClass('error');
                            $('#'+keys[0]).parent('.input-group').addClass('input-group-error');
                            $("label[for="+keys[0]+"]").append("<br/>");
                            $("label[for="+keys[0]+"]").append('<label id="'+keys[0]+'-error" class="error" for="'+keys[0]+'">'+detail[0]+'</label>');
                            $('#'+keys[0]).focus();
                        }
                        Swal.fire({
                            type: 'error',
                            title: error.message,
                            text: detail[0]
                        })
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

    // END SIMPAN

</script>
