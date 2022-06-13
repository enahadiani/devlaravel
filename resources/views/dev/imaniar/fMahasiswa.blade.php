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
<x-list-data judul="Data Mahasiswa" tambah="true" :thead="array('NIM','Nama Mahasiswa','Jurusan','Status','Action')" :thwidth="array(15,15,15,15,15)" :thclass="array('','','','','text-center')" />
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
                                        $column = array("No","NIM","Nama Mahasiswa","Jurusan");
                                        $width = array(5,15,15,15);
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
    function clearTmp(){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('payroll-trans/payroll-no_gaji-upload-clear-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                if(result.status){
                    tablepeserta.ajax.reload();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }else{
                    alert(result.message);
                }
            }
        });
    }

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
                            var link = "{{ config('api.url').'payroll-trans/payroll-export?kode_lokasi='.Session::get('lokasi').'&nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog') }}";
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
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

    $('#download-template').click(function(){
        alert('test');
        // var nik_user = "{{ Session::get('nikUser') }}";
        // var nik = "{{ Session::get('userLog') }}";
        // var link = "{{ config('api.url').'payroll-trans/payroll-export' }}?nik_user="+nik_user+"&nik="+nik+"&type=template";
        // window.open(link, '_blank'); 
        $("#input-peserta").table2excel({
            // exclude: ".excludeThisClass",
            name: "Mahasiswa_Template{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Mahasiswa_Template_{{ Session::get('userLog') }}.xlsx", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        }); 
    });


</script>