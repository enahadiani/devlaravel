<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card">
            <x-report-header judul="Laporan Data Pembayaran" padding="px-0 py-4" />
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="no_bayar" nama="Nomor Pembayaran" selected="1" :option="array('1','2','3','i')" />
                                    
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit">Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button">Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-report-result judul="Pembayaran" padding="px-0 py-4"/>
    
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
        var $no_bayar = {
            type : "=",
            from : "{{ Session::get('no_bayar') }}",
            fromname : "{{ Session::get('no_bayar') }}",
            to : "",
            toname : "",
        }

        // var $kode_jur = {
        //     type : "=",
        //     from : "{{ Session::get('kode_jur') }}",
        //     fromname : "{{ Session::get('kode_jur') }}",
        //     to : "",
        //     toname : "",
        // }

        

        // var $aktif = "";

        function fnSpasi(level)
        {
            var tmp="";
            for (var iS=1; iS<=level; iS++)
            {
                tmp=tmp+"&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            return tmp;
        }
        $.fn.DataTable.ext.pager.numbers_length = 5;

        // $('#show').selectize();

        $('#no_bayar-from').val("{{ Session::get('no_bayar') }}");
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
            kode : ['no_bayar'],
            nama : ['No Pembayaran'],
            header : [
                ['No Pembayaran'],
               ],
            headerpilih : [
                ['No Pembayaran','Action'],
              ],
            columns: [
                [
                    { data: 'no_bayar' },
                   
                ]
            ],
            url :[
                "{{ url('dev-report/filter-no_bayar') }}",
            ],
            parameter:[],
            orderby:[[],[]],
            width:[['30%']],
            display:['kode']
        });
    

       

