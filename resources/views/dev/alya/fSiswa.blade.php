{{-- Referensi file fVendor folder Esaku --}}
    <link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />

    <x-list-data judul="Data Siswa" tambah="true" :thead="array('NIS','Nama','Nama Jurusan','Action')" :thwidth="array(15,15,15,15)" :thclass="array('','','','text-center')" />
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
                        <button type="submit" class="btn btn-primary btn-save float-right"><i class="fa fa-save"></i> Simpan</button>
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
                                <label for="nim" >NIS</label>
                                <input class="form-control" type="text" placeholder="NIM" id="nim" name="nim" required>                        
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nama" >Nama</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>                         
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
                        {{-- <div class="form-group row">
                            <label for="nim" class="col-md-2 col-sm-12 col-form-label">NIS</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="NIS" id="nim" name="nim" required>                                
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row ">
                            <label for="nama" class="col-md-2 col-sm-12 col-form-label">Nama</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-2 col-sm-12">
                            </div>                            
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_jur">Kode Jurusan</label>
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
                            </div> --}}
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->
    
    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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
    
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('dev-master/siswa') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        'columns': [
            { data: 'nim' },
            { data: 'nama' },
            { data: 'nama_jur' }
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
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Siswa');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_flag').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
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

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#nim').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

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
                var url = "{{ url('dev-master/siswa') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('dev-master/siswa') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
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
                        var kode = $('#nim').val();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Siswa');
                        $('#method').val('post');
                        $('#nim').attr('readonly', false);
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add("kode",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/dev-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Nis Siswa sudah digunakan'
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
                    showNotification("top", "center", "success","Hapus Data","Data Siswa ("+id+")");
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
        var kode = $(this).closest('tr').find('td').eq(0).html();
        $('#modal-preview').modal('hide');
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS
    function getKodeJurusan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-master/jurusan') }}",
            dataType: 'json',
            data:{'kode_jur':id},
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

    $('.selectize').selectize();

$('#form-tambah').on('click', '.search-item2', function(){
    var id = $(this).closest('div').find('input').attr('name');
    var options = {}
    switch(id){
       
        case 'kode_jur':
            options = {
                id : id,
                header : ['Kode Jurusan', 'Nama Jurusan'],
                url : "{{ url('dev-master/jurusan') }}",
                columns : [
                    { data: 'kode_jur' },
                    { data: 'nama' }
                ],
                judul : "Daftar Jurusan",
                pilih : "Kode Jurusan",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        
    }
    showInpFilter(options);
});

$('#form-tambah').on('change', '#kode_jur', function(){
    var par = $(this).val();
    getKodeJurusan(par);
});
    /// BUTTON EDIT
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
                    // $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('show');
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }
            }
        });
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    // $('#nim,#nama,#kode_jur').keydown(function(e){
    //     var code = (e.keyCode ? e.keyCode : e.which);
    //     var nxt = ['kode_flag','nama'];
    //     if (code == 13 || code == 40) {
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx++;
    //         if(idx == 15){
    //             console.log('No event')
    //             // var akun = $('#akun_hutang').val();
    //             // getAkun(akun);
    //         }else{
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }else if(code == 38){
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx--;
    //         if(idx != -1){ 
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }
    // });


    // PREVIEW saat klik di list data

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var status = data.flag_status;
            var html = `<tr>
                <td style='border:none'>Kode Jenis</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Jenis</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>`+data.status+`</td>
            </tr>
            <tr>
                <td>Nama Jurusan</td>
                <td>`+data.nama_jur+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview-judul').text('Preview Jenis');
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data FS');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-master/siswa') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nim').attr('readonly', true);
                    $('#nim').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#nim').val(result.data[0].nim);                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dev-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });


    </script>