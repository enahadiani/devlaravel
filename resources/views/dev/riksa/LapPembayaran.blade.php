<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="dev-filter">
    <div class="col-12">
        <div class="card">
            <x-report-header judul="Laporan Pembayaran Siswa" padding="px-0 py-4" />
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->  
                                    <x-inp-filter kode="no_bayar" nama="NO Pembayaran" selected="3" :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="nim" nama="NIM" selected="3" :option="array('1','2','3','i')" />
                                    
                                    <!-- <x-inp-filter kode="kode_kelas" nama="Kelas" selected="1" :option="array('1','2','3','i')"/> -->
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit">Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button">Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging />

            </div>
        </div>
    </div>
</div>
<x-report-result judul="Pembayaran" padding="px-0 py-4" />

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
    var $nim = {
        type: "=",
        from: "{{ Session::get('nim') }}",
        fromname: "{{ Session::get('nim') }}",
        to: "",
        toname: "",
    }

    var $no_bayar = {
        type: "=",
        from: "{{ Session::get('no_bayar') }}",
        fromname: "{{ Session::get('no_bayar') }}",
        to: "",
        toname: "",
    }



    // var $aktif = "";

    // function fnSpasi(level)
    // {
    //     var tmp="";
    //     for (var iS=1; iS<=level; iS++)
    //     {
    //         tmp=tmp+"&nbsp;&nbsp;&nbsp;&nbsp;";
    //     }
    //     return tmp;
    // }
    // $.fn.DataTable.ext.pager.numbers_length = 5;

    // $('#show').selectize();

    $('#nim-from').val("{{ Session::get('nim') }}");
    $('#no_bayar-from').val("{{ Session::get('no_bayar') }}");

    $('#btn-filter').click(function(e) {
        $('#collapseFilter').show();
        $('#collapsePaging').hide();
        if ($(this).hasClass("btn-primary")) {
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-light");
        }

        $('#btn-filter').addClass("hidden");
        $('#btn-export').addClass("hidden");
        setHeightReport();
    });

    $('#btn-tutup').click(function(e) {
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
        setHeightReport();
    });

    $('#btn-tampil').click(function(e) {
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
        kode: [
            'nim',
            'no_bayar'
        ],
        nama: [
            'NIS',
            'no_bayar'
        ],
        header: [
            ['NIS', 'Nama Siswa'],
            ['no_bayar','Keterangan']
        ],
        headerpilih: [
            ['NIS', 'Nama Siswa', 'Action'],
            ['No Bayar', 'Keterangan', 'Action']
        ],
        columns: [
            [
                {data: 'nim'},
                {data: 'nama'}
            ],
            [
                {data: 'no_bayar'},
                {data: 'keterangan'}
            ]
        ],
        url: [
            "{{ url('dev-report/filter-nim') }}",
            "{{ url('dev-report/filter-bayar') }}"
        ],
        parameter: [{}, {
            'nim[0]': $nim.type,
            'nim[1]': $nim.from,
            'nim[2]': $nim.to,
            'flag_aktif[0]': '=',
            'flag_aktif[1]': '1',
            'flag_aktif[2]': ''
        }, {
            'no_tagihan[0]': $no_bayar.type,
            'no_tagihan[1]': $no_bayar.from,
            'no_tagihan[2]': $no_bayar.to,
            'flag_aktif[0]': '=',
            'flag_aktif[1]': '1',
            'flag_aktif[2]': ''
        }],
        orderby: [
            [],
            [],
            []
        ],
        width: [
            ['30%', '70%'],
            ['30%', '70%']
        ],
        display: ['kode', 'kode']
    });


    $('#inputFilter').on('change', 'input', function(e) {
    setTimeout(() => {
        $('#inputFilter').reportFilter({
        kode: [
            'no_bayar',
            'nim'
        ],
        nama: [
            'NIS',
            'no_bayar'
        ],
        header: [
            ['NIS', 'Nama Siswa'],
            [
                'No Bayar',
                'Keterangan'
            ]
        ],
        headerpilih: [
            ['NIS', 'Nama Siswa', 'Action'],
            ['No Bayar', 'Keterangan', 'Action']
        ],
        columns: [
            [{
                    data: 'nim'
                },
                {
                    data: 'nama'
                }
            ],
            [{
                    data: 'no_bayar'
                },
                {
                    data: 'keterangan'
                }
            ]
        ],
        url: [
            "{{ url('dev-report/filter-nim') }}",
            "{{ url('dev-report/filter-bayar') }}"
        ],
        parameter: [{}, {
            'nim[0]': $nim.type,
            'nim[1]': $nim.from,
            'nim[2]': $nim.to,
            'flag_aktif[0]': '=',
            'flag_aktif[1]': '1',
            'flag_aktif[2]': ''
        }, {
            'no_bayar[0]': $no_bayar.type,
            'no_bayar[1]': $no_bayar.from,
            'no_bayar[2]': $no_bayar.to,
            'flag_aktif[0]': '=',
            'flag_aktif[1]': '1',
            'flag_aktif[2]': ''
        }],
        orderby: [
            [],
            [],
            []
        ],
        width: [
            ['30%', '70%'],
            ['30%', '70%']
        ],
        display:['kode', 'kode'],
            pageLength:[10,10]
        });
    }, 500)
});

var $formData = "";
$('#form-filter').submit(function(e){
    e.preventDefault();
    $formData = new FormData();

    $formData.append("no_bayar[]",$no_bayar.type);
    $formData.append("no_bayar[]",$no_bayar.from);
    $formData.append("no_bayar[]",$no_bayar.to);

    $formData.append("nim[]",$nim.type);
    $formData.append("nim[]",$nim.from);
    $formData.append("nim[]",$nim.to);

    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]);
    }
    $('#saku-report').removeClass('hidden');
        xurl = "{{ url('dev-auth/form/riksa_rptPembayaran') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

$('#show').change(function(e){
        $formData = new FormData();
        $formData.append("nim[]",$nim.type);
        $formData.append("nim[]",$nim.from);
        $formData.append("nim[]",$nim.to);


        $formData.append("no_bayar[]",$no_bayar.type);
        $formData.append("no_bayar[]",$no_bayar.from);
        $formData.append("no_bayar[]",$no_bayar.to);

        
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ',     '+ pair[1]);
        }
        $('#dev-report').removeClass('hidden');
        xurl = "{{ url('dev-auth/form/rptPembayaran') }}";
        $('#dev-report #canvasPreview').load(xurl);
    });
</script>