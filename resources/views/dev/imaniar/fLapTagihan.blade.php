<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Data Tagihan" padding="px-0 py-4"/>
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="no_tagihan" nama="Nomor Tagihan" selected="1" :option="array('1','2','3','i')"/>
                                    <x-inp-filter kode="nim" nama="NIS Siswa" selected="1" :option="array('1','2','3','i')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging/>
                
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Tagihan" padding="px-0 py-4"/>

@include('modal_search')
@include('modal_email')

@php
date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
        }
    });
    var $no_tagihan = {
        type : "=",
        from : "{{ Session::get('no_tagihan') }}",
        fromname : "{{ Session::get('no_tagihan') }}",
        to : "",
        toname : "",
    }

    var $nim = {
        type : "=",
        from : "{{ Session::get('nim') }}",
        fromname : "{{ Session::get('nim') }}",
        to : "",
        toname : "",
    }

    $('#no_tagihan-from').val("{{ Session::get('no_tagihan') }}");
    $('#nim-from').val("{{ Session::get('nim') }}");

    $('#btn-filter').click(function(e){
        $('#collapseFilter').show();
        $('#collapsePaging').hide();
        if($(this).hasClass("btn-primary")){
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-light");
        }
        
        $('#btn-filter').addClass("hidden");
        $('#btn-export').addClass("hidden");
        setHeightReport();
    });
    
    $('#btn-tutup').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
        setHeightReport();
    });    

    $('#btn-tampil').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
        setHeightReport();
    });

    $('.selectize').selectize();

    $('#inputFilter').reportFilter({
        kode : ['nim','no_tagihan'],
        nama : ['NIS','Daftar Tagihan'],
        header : [['NIS', 'Nama Siswa'],['Nomor Tagihan','Ketarangan Tagihan']],
        headerpilih : [['NIS', 'Nama Siswa','Action'],['Nomor Tagihan', 'Keterangan Tagihan','Action']],
        columns: [
            [
                { data: 'nim' },
                { data: 'nama' }
            ],[
                { data: 'no_tagihan' },
                { data: 'keterangan' }
            ]
        ],
        url :["{{ url('dev-report/filter-nim') }}","{{ url('dev-report/filter-tagihan') }}"],
        parameter:[{},{
            'nim[0]' : $nim.type,
            'nim[1]' : $nim.from,
            'nim[2]' : $nim.to,
            'flag_aktif[0]' : '=',
            'flag_aktif[1]' : '1',
            'flag_aktif[2]' : ''
        },{
            'no_tagihan[0]' : $no_tagihan.type,
            'no_tagihan[1]' : $no_tagihan.from,
            'no_tagihan[2]' : $no_tagihan.to,
            'flag_aktif[0]' : '=',
            'flag_aktif[1]' : '1',
            'flag_aktif[2]' : ''
        }],
        orderby:[[],[]],
        width:[['30%','70%'],['30%','70%']],
        display:['kode','kode']
    });

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
                kode : ['nim','no_tagihan'],
                nama : ['NIS','Daftar Tagihan'],
                header : [['NIS', 'Nama Siswa'],['Nomor Tagihan','Ketarangan Tagihan']],
                headerpilih : [['NIS', 'Nama Siswa','Action'],['Nomor Tagihan', 'Keterangan Tagihan','Action']],
                columns: [
                    [
                        { data: 'nim' },
                        { data: 'nama' }
                    ],[
                        { data: 'no_tagihan' },
                        { data: 'keterangan' }
                    ]
                ],
                url :["{{ url('dev-report/filter-nim') }}","{{ url('dev-report/filter-tagihan') }}"],
                parameter:[{},{
                    'nim[0]' : $nim.type,
                    'nim[1]' : $nim.from,
                    'nim[2]' : $nim.to,
                    'flag_aktif[0]' : '=',
                    'flag_aktif[1]' : '1',
                    'flag_aktif[2]' : ''
                },{
                    'no_tagihan[0]' : $no_tagihan.type,
                    'no_tagihan[1]' : $no_tagihan.from,
                    'no_tagihan[2]' : $no_tagihan.to,
                    'flag_aktif[0]' : '=',
                    'flag_aktif[1]' : '1',
                    'flag_aktif[2]' : ''
                }],
                orderby:[[],[]],
                width:[['30%','70%'],['30%','70%']],
                display:['kode','kode']
                
            });
        }, 500);
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("nim[]",$nim.type);
        $formData.append("nim[]",$nim.from);
        $formData.append("nim[]",$nim.to);
        $formData.append("no_tagihan[]",$no_tagihan.type);
        $formData.append("no_tagihan[]",$no_tagihan.from);
        $formData.append("no_tagihan[]",$no_tagihan.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('dev-auth/form/imaniar_rptTagihan') }}";
        $('#saku-report #canvasPreview').load(xurl);
        setHeightReport();
    });
    
    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("nim[]",$nim.type);
        $formData.append("nim[]",$nim.from);
        $formData.append("nim[]",$nim.to);
        $formData.append("no_tagihan[]",$no_tagihan.type);
        $formData.append("no_tagihan[]",$no_tagihan.from);
        $formData.append("no_tagihan[]",$no_tagihan.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        xurl = "{{ url('dev-auth/form/imaniar_rptTagihan') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#sai-rpt-print').click(function(){
        $('#saku-report #canvasPreview').printThis({
            removeInline: true,
            importStyle: true,
        });
    });

    $('#sai-rpt-print-prev').click(function(){
        var newWindow = window.open();
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
        newWindow.document.write(html);
    });

    $("#sai-rpt-excel").click(function(e) {
        e.preventDefault();
        $("#saku-report #canvasPreview").table2excel({
            // exclude: ".excludeThisClass",
            name: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });


</script>