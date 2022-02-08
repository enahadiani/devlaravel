<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Data Pembayaran" padding="px-0 py-4"/>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="no_bayar" nama="Nomor Pembayaran" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="nis" nama="NIS" selected="3" :option="array('1','2','3','i')"/>
                                        <!-- <x-inp-filter kode="kode_kelas" nama="Kelas" selected="1" :option="array('1','2','3','i')"/> -->
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