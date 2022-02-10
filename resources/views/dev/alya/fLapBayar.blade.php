<link rel="stylesheet" href="{{ asset('report.css')}}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card">
                <x-report-header judul="Laporan Pembayaran" padding="px-0 py-5">
                    <div class="seperator"></div>
                    <div class="row">
                        <div class="col-sm col-sm-12">
                            <div class="collapse-show" id="collapseFilter">
                                <div class="px-4 pb-4 pt-2">
                                    <form id="form-filter">
                                        Filter
                                        <div class="inputFilter">
                                            <!-- COMPONENT -->
                                        <x-inp-filter kode="nim" nama="NIS" selected="3" :option="array('1','2','3','i')">
                                        <x-inp-filter kode="kode_jur" nama="Kode Jurusan" selected="3" :option="array('1','2','3','i')">
                                        </div>
                                        <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary " >Tampilkan</button>
                                        <button type="button">Tutup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <x-report-paging/>
                    </div>
                </x-report-header>
            </div>
        </div>

    </div>