<link rel="stylesheet" href="{{ asset('trans.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css?version=_').time() }}" />


{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">

    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Umum</span></a> </li>

                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-umum" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off">
                                        </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                            <label for="jabatan">Jabatan</label>
                                            <input class="form-control" type="text" placeholder="jabatan" id="jabatan" name="jabatan" autocomplete="off">
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="telp">Telpon</label>
                                            <input class="form-control" type="text" placeholder="telp" id="telp" name="telp" autocomplete="off">
                                        </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                            <label for="nopol">No Polisi</label>
                                            <input class="form-control" type="text" placeholder="nopol" id="nopol" name="nopol" autocomplete="off">
                                            </div>
                                            </div>
                                    </div>
                                </div>           
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                            <label for="kode_fm">FM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_fm" readonly="readonly" title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_fm" id="kode_fm" name="kode_fm" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_fm hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_fm"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_area">Area</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_area" readonly="readonly" title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_area" id="kode_area" name="kode_area" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_area hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_area"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="witel">Witel By System</label>
                                            <input class="form-control" type="text" placeholder="Witel By Sistem" id="witel" name="witel" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="disp">Dispatcher</label>
                                            <input class="form-control" type="text" placeholder="Dispatcher" id="disp" name="disp" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_pool">Pool Area</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_pool" readonly="readonly" title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_pool" id="kode_pool" name="kode_pool" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_pool hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_pool"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="witel2">Witel On Pool</label>
                                            <input class="form-control" type="text" placeholder="Witel Pool" id="witel2" name="witel2" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_mitra">Mitra GPS</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_mitra" readonly="readonly" title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_mitra" id="kode_mitra" name="kode_mitra" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_mitra hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_mitra"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="status">Status</label>
                                            <select class='form-control selectize' id="status" name="status">
                                                <option value='SGO' selected>SGO</option>
                                                <option value='IDLE DSP'>IDLE DSP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="aktivasi">Aktivasi</label>
                                            <select class='form-control selectize' id="aktivasi" name="aktivasi">
                                                <option value='ACTIVE' selected>ACTIVE</option>
                                                <option value='INACTIVE'>INACTIVE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="data-aset" role="tabpanel" data-tab="Aset">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="id">ID</label>
                                            <input class="form-control" type="text" placeholder="ID KBM" id="id" name="id" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="id_telkom">ID Telkom</label>
                                            <input class="form-control" type="text" placeholder="ID Telkom" id="id_telkom" name="id_telkom" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="nopol">Nomor Polisi</label>
                                            <input class="form-control" type="text" placeholder="Nomor Polisi" id="nopol" name="nopol" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="nopol_awal">Nomor Polisi Awal</label>
                                            <input class="form-control" type="text" placeholder="Nomor Polisi Awal" id="nopol_awal" name="nopol_awal" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kbm">KBM SP</label>
                                            <input class="form-control" type="text" placeholder="KBM SP" id="kbm_sp" name="kbm_sp" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_type">Type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_type" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_type" id="kode_type" name="kode_type" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_type hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_type"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_rangka">Nomor Rangka</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rangka" id="no_rangka" name="no_rangka" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_mesin">Nomor Mesin</label>
                                            <input class="form-control" type="text" placeholder="Nomor Mesin" id="no_mesin" name="no_mesin" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_polis">No Polis</label>
                                            <input class="form-control" type="text" placeholder="No Polis" id="no_polis" name="no_polis" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_merk">Merk</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_merk" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_merk" id="kode_merk" name="kode_merk" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_merk hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_merk"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_jenis">Jenis</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_jenis" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_jenis" id="kode_jenis" name="kode_jenis" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_jenis hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_jenis"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="masa_kir">Masa Keur KBM</label>
                                            <span class="span-tanggal" id="masa-kir"></span>
                                            <input class='form-control datepicker' id="masa_kir" name="masa_kir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="warna">Warna Bodi</label>
                                            <input class="form-control" type="text" placeholder="Warna" id="warna" name="warna" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="asuransi">Nama Asuransi</label>
                                            <input class="form-control" type="text" placeholder="Nama Asuransi" id="asuransi" name="asuransi" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="keterangan">Keterangan</label>
                                            <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kondisi">Kondisi</label>
                                            <input class="form-control" type="text" placeholder="Kondisi" id="kondisi" name="kondisi" autocomplete="off" >  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-kbm" role="tabpanel" data-tab="KBM">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_mulai">Masa Berlaku STNK</label>
                                            <span class="span-tanggal" id="tgl-mulai"></span>
                                            <input class='form-control datepicker' id="tgl_mulai" name="tgl_mulai" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_selesai">Masa Kadaluarsa STNK</label>
                                            <span class="span-tanggal" id="tgl-selesai"></span>
                                            <input class='form-control datepicker' id="tgl_selesai" name="tgl_selesai" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_pajak">Masa Berlaku Pajak</label>
                                            <span class="span-tanggal" id="tgl-pajak"></span>
                                            <input class='form-control datepicker' id="tgl_pajak" name="tgl_pajak" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="pajak">Pajak KBM (Rp)</label>
                                            <input class="form-control currency pl-4" type="text" placeholder="Pajak KBM (Rp)" id="pajak" name="pajak" autocomplete="off" >
                                            <span class="satuan-rp">Rp</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="jenis1">MS/NMS</label>
                                            <input class="form-control" type="text" placeholder="MS/NMS" id="jenis1" name="jenis1" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="market">Kategori Market</label>
                                            <input class="form-control" type="text" placeholder="Kategori Market" id="market" name="market" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="jenis2">Jenis BBM</label>
                                            <input class="form-control" type="text" placeholder="Jenis BBM" id="jenis2" name="jenis2" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="r2">R2/R4</label>
                                            <select class='form-control selectize' id="r2" name="r2">
                                                <option value='R2' selected>Roda 2</option>
                                                <option value='R4'>Roda 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tahun">Tahun</label>
                                            <input class="form-control" type="text" placeholder="Tahun" id="tahun" name="tahun" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="lokasi">Lokasi</label>
                                            <input class="form-control" type="text" placeholder="Lokasi" id="lokasi" name="lokasi" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_stnk">Tanggal STNK</label>
                                            <span class="span-tanggal" id="tgl-stnk"></span>
                                            <input class='form-control datepicker' id="tgl_stnk" name="tgl_stnk" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_akhir">Kontrak Berakhir</label>
                                            <span class="span-tanggal" id="tgl-akhir"></span>
                                            <input class='form-control datepicker' id="tgl_akhir" name="tgl_akhir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="user1">Kepemilikan</label>
                                            <input class="form-control" type="text" placeholder="Kepemilikan" id="user1" name="user1" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="cust">Cust</label>
                                            <input class="form-control" type="text" placeholder="Cust" id="cust" name="cust" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_kontrak">No Kontrak</label>
                                            <input class="form-control" type="text" placeholder="No Kontrak" id="no_kontrak" name="no_kontrak" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_area">Gedung</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_area" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_area" id="kode_area" name="kode_area" autocomplete="off" data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_area hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_area"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-body-footer row" style="padding: 0 25px;">
                    <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                        <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                    </div>
                    <div style="text-align: right;" class="col-md-2 p-0 ">
                        <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<button id="trigger-bottom-sheet">&nbsp;</button>

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js?version=_').time() }}"></script>
<script src="{{ asset('helper.js?version=_').time() }}"></script>
<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">
    // SET UP FORM
    var scroll = document.querySelector('#content-preview');
    new PerfectScrollbar(scroll);

    var scrollForm = document.querySelector('#form-body');
    new PerfectScrollbar(scrollForm);

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    // END SET UP FORM





    // BTN KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function() {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
    });
    // END BTN KEMBALI

    // CBBL FORM
    $('#form-tambah').on('click', '.search-item2', function(e) {
        var id = $(this).closest('div').find('input').attr('name');
        var options = {}
        switch (id) {
            case 'kode_fm':
                var area = $('#nama').val();
                if (area == '' || area == null) {
                    alert('Harap pilih area terlebih dahulu')
                    return;
                }
                options = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('simadmin-master/kbm-fm') }}",
                    columns: [{
                            data: 'kode_fm'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar FM",
                    pilih: "fm",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                    parameter: {
                        nama: area
                    },
                    onItemSelected: function(data) {
                        showInfoField('kode_fm', data.kode_fm, data.nama);
                        $('#fm').val(data.kode_fm);
                    },
                }
                break;

            case 'kode_area':
                var area = $('#nama').val();
                if (area == '' || area == null) {
                    alert('Harap pilih area terlebih dahulu')
                    return;
                }
                options = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('simadmin-master/kbm-gedung') }}",
                    columns: [{
                            data: 'kode_area'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Area",
                    pilih: "area",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                    parameter: {
                        nama: area
                    }
                }
                break;
        }
        showInpFilterBSheet(options);
    })

    $('.info-icon-hapus').click(function() {
        var par = $(this).closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', false);
        $('#' + par).attr('style', 'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_' + par).parent('div').addClass('hidden');
        $('.info-name_' + par).addClass('hidden');
        $(this).addClass('hidden');
        $('#' + par).trigger('change');
    });

    // function showInfoField(kode,isi_kode,isi_nama_gedung){
    //     if(isi_kode == "" || isi_kode == null || isi_kode == undefined){
    //         $('#'+kode).val("-");
    //     }else{

    //         $('#'+kode).val(isi_kode);
    //         $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
    //         $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
    //         $('.info-code_'+kode).attr('title',isi_nama_gedung);
    //         $('.info-name_'+kode).removeClass('hidden');
    //         $('.info-name_'+kode).attr('title',isi_nama_gedung);
    //         $('.info-name_'+kode+' span').text(isi_nama_gedung);
    //         var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
    //         var height =$('#'+kode).height();
    //         var pos =$('#'+kode).position();
    //         $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
    //         $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    //     }
    // }

    function resizeNameField(kode) {
        var width = $('#' + kode).width() - $('#search_' + kode).width() - 10;
        var height = $('#' + kode).height();
        var pos = $('#' + kode).position();
        $('.info-name_' + kode).width(width).css({
            'left': pos.left,
            'height': height
        });
    }
    // END CBBL FORM
</script>