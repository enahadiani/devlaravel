<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card">
            <x-report-header judul="Laporan Data Tagihan" padding="px-0 py-4" />
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="no_tagihan" nama="Nomor Tagihan" selected="1" :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="nis" nama="NIS" selected="2" :option="array('1','2','3','i')" />

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

<x-report-result Judul="Laporan Tagihan" padding="px-0 py-4" />
@include('modal_search')
@include('modal_email')

@php
date_default_timezone_set("Asia/Bangkok")
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
        }
    });

    var $no_tagihan = {
        type: "all",
        from: "",
        fromname: "",
        to: "",
        toname: "",
    }

    var $nis = {
        type: "all",
        from: "",
        fromname: "",
        to: "",
        toname: ""
    }


    $("btn-filter").click(function(e) {

        $('$collapseFilter').show();
        $('#collapsePagging').hide();
        if ($(this).hasClass("btn-primary")) {
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-light");
        }

        $('btn-filter').addClass("hidden");
        $('btn-export').addClass("hidden");
    });

    $("btn-tutup").click(function(e) {
        $('collapseFilter').hide();
        $('collapsePaging').show();
        $('btn-filter').addClass("btn-primary");
        $('btn-filter').removeClass("btn-light");
        $('btn-filter').removeClass("hidden");
        $('btn-export').removeClass("hidden");

    });

    $("btn-tampil").click(function(e) {
        $('collapseFilter').hide();
        $('collapsePaging').show();
        $('btn-filter').addClass("btn-primary");
        $('btn-filter').removeClass("btn-light");
        $('btn-filter').removeClass("hidden");
        $('btn-export').removeClass("hidden");

    });

    $('.selectize').selectize();

    $('$inputFilter').reportFilter({
                kode: [
                    'no_tagihan',
                    'nama'
                ],
                nama: [
                    'Kode Tagihan',
                    'nama'
                ],
                header: [
                    ['Kode'],
                    ['Nama']
                ],
                headerpilih: [
                    ['Kode','Nama','Action'],
                    ['Kode','Nama','Action']
                ],
                columns: [
                    [{
                        data: 'no_tagihan',
                        data: 'nama'
                    }],
                ],
                url: [
                    "{{ url('dev-master/dev-tagihh') }}"
                ],
                parameter: [],
                orderby: [
                    []
                ],
                width: [
                    ['30%', '70%']
                ],
                display: ['kode'],
                pageLength:[10, 10, 10, 10,10,10]
});

               