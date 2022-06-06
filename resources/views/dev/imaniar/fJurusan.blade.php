{{-- Referensi file fVendor folder Esaku --}}
<link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />

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

<!-- LIST DATA -->
<x-list-data judul="Data Jurusan" tambah="true" :thead="array('Kode','Nama','Status','Action')" :thwidth="array(15,15,15,15)" :thclass="array('','','','text-center')" />
<!-- END LIST DATA -->

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12" style="height: 90px;">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;width:100px;margin-right:5px"><i class="fa fa-undo"></i> Keluar</button>
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
<!-- END FORM INPUT -->


{{-- JAVASRICPT --}}
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // DATABASE - DATA JURUSAN
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
            {'targets': 3, data: null, 'defaultContent': action_html, 'className':'text-center'}
        ],
        'columns': [
            { data: 'kode_jur' },
            { data: 'nama' },
            { data: 'status' }
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
        $('#kode_jur').attr('readonly', false);
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

    // BUTTON UPDATE
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_vendor').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    
    // END DATABASE - DATA JURUSAN

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
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });
    
    // BUTTON DELETE 2 - PREVIEW DATA
        $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    //BUTTON EDIT 2 - PREVIEW DATA
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
    

    // END PREVIEW DETAIL

</script>