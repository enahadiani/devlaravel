    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
        }
        .form-group{
            margin-bottom:5px !important;
        }
    </style>
    <div class="row header-datatable">
        <div class="col-12">
            <h1>Data Vendor</h1>
            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="min-height: 560px !important;">                    
                    <table id="table-data" class="" style='width:100%'>
                        <thead>
                            <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row header-form" style="display:none;">
        <div class="col-12">
            <h1>Form Data Vendor</h1>
            <button type="button" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card pt-3" style="min-height: 560px !important;">
                <form id="form-tambah">
                    <div class="card-body pt-0">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_vendor" class="col-md-3 col-sm-3 col-form-label">Kode</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Kode Vendor" id="kode_vendor" name="kode_vendor">
                            </div>
                            <label for="nama" class="col-md-3 col-sm-3 col-form-label">Nama</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nama Vendor" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tel" class="col-md-3 col-sm-3 col-form-label">No Telp</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_tel" name="no_tel">
                            </div>
                            <label for="no_fax" class="col-md-3 col-sm-3 col-form-label">No Fax</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Fax" id="no_fax" name="no_fax">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-sm-3 col-form-label">Email</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="email" placeholder="Email" id="email" name="email">
                            </div>
                            <label for="npwp" class="col-md-3 col-sm-3 col-form-label">NPWP</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="NPWP Vendor" id="npwp" name="npwp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pic" class="col-md-3 col-sm-3 col-form-label">PIC</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic">
                            </div>
                            <label for="no_tel" class="col-md-3 col-sm-3 col-form-label">No Telp PIC</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Telepon PIC" id="no_pictel" name="no_pictel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-3 col-sm-3 col-form-label">Bank</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank">
                            </div>
                            <label for="cabang" class="col-md-3 col-sm-3 col-form-label">Cabang</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_rek" class="col-md-3 col-sm-3 col-form-label">No. Rekening</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="number" placeholder="No Rekening" id="no_rek" name="no_rek">
                            </div>
                            <label for="nama_rek" class="col-md-3 col-sm-3 col-form-label">Nama Rekening</label>
                            <div class="col-md-3 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Nama Rekening" id="nama_rek" name="nama_rek">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-3 col-sm-3 col-form-label">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Alamat Vendor" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat2" class="col-md-3 col-sm-3 col-form-label">Alamat NPWP</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Alamat NPWP" id="alamat2" name="alamat2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akun_hutang" class="col-md-3 col-sm-3 col-form-label">Akun Utang</label>
                            <div class="input-group col-md-3 col-sm-9">
                                <input type='text' name="akun_hutang" id="akun_hutang" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_akun_hutang" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
     <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script>
        // var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        function getAkun(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/vendor-akun') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#akun_hutang').val(result.daftar[0].kode_akun);
                            $('#label_akun_hutang').text(result.daftar[0].nama);
                        }else{
                            alert('Kode Akun tidak valid');
                            $('#akun_hutang').val('');
                            $('#akun_hutang').focus();
                        }
                    }
                }
            });
        }

        function getLabelAkun(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/vendor-akun') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_akun === no){
                                $('#label_akun_hutang').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode Akun tidak valid');
                            $('#akun_hutang').val('');
                            $('#akun_hutang').focus();
                        }
                    }
                }
            });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='simple-icon-pencil'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='simple-icon-trash'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        'ajax': {
            'url': "{{ url('esaku-master/vendor') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'kode_vendor' },
            { data: 'nama' },
            { data: 'alamat' },
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
            lengthMenu: "Items Per Page _MENU_"
        },
    });

    $('.header-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#kode_vendor').attr('readonly', false);
        $('#label_akun_hutang').text('');
        $('#saku-datatable').hide();
        $('.header-datatable').hide();
        $('.header-form').show();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('.header-form').on('click', '#btn-kembali', function(){
        $('.header-datatable').show();
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('.header-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'akun_hutang': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/vendor-akun') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            columnDefs: [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='simple-icon-check'></i></a>"
            }],
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
                lengthMenu: "Items Per Page _MENU_"
            },
        });


        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
                $($target).attr('value',kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            console.log($target3);
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('change', '#akun_hutang', function(){
        var par = $(this).val();
        getAkun(par);
    });

    $('#btn-simpan').click(function(e){
        e.preventDefault();
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $('#form-tambah').submit();
    });

    $('#form-tambah').submit(function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('esaku-master/vendor') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('esaku-master/vendor') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
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
                // alert('Input data '+result.message);
                if(result.data.status){
                    // location.reload();
                    dataTable.ajax.reload();
                    // Swal.fire(
                    //     'Great Job!',
                    //     'Your data has been '+pesan,
                    //     'success'
                    //     )
                    alert(result.data.message);
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                    $('.header-datatable').show();
                    $('.header-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                   
                    window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    
                }else{
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Something went wrong!',
                        //     footer: '<a href>'+result.data.message+'</a>'
                        // })
                        
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        $('#btn-simpan').html("Simpan").removeAttr('disabled');
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //     if (result.value) {
            if(confirm("Anda yakin ini menghapus data ini?")){
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('esaku-master/vendor') }}/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            // Swal.fire(
                            //     'Deleted!',
                            //     'Your data has been deleted.',
                            //     'success'
                            // )
                            alert(result.data.message);
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            // Swal.fire({
                            //     title: 'Session telah habis',
                            //     text: 'harap login terlebih dahulu!',
                            //     icon: 'error'
                            // }).then(function() {
                                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                            // })
                        }else{
                            // Swal.fire({
                            // icon: 'error',
                            // title: 'Oops...',
                            // text: 'Something went wrong!',
                            // footer: '<a href>'+result.data.message+'</a>'
                            // })
                            alert(result.data.message);
                        }
                    }
                });
            }
                
        //     }else{
        //         return false;
        //     }
        // })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_vendor').attr('readonly', true);
                    $('#kode_vendor').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#alamat2').val(result.data[0].alamat2);
                    $('#email').val(result.data[0].email);
                    $('#npwp').val(result.data[0].npwp);
                    $('#pic').val(result.data[0].pic);
                    $('#no_pictel').val(result.data[0].no_pictel);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('#no_fax').val(result.data[0].no_fax);
                    $('#bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#akun_hutang').val(result.data[0].akun_hutang);
                    getLabelAkun(result.data[0].akun_hutang);
                    $('#row-id').show();;
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('.header-datatable').hide();
                    $('.header-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    //     window.location.href = "{{ url('saku/login') }}";
                    // })
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>