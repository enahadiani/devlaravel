{{-- Referensi file fVendor folder Esaku --}}
    <link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />


<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
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
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Gedung</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama Tenant</label>
                                <input class="form-control" type="text" placeholder="Nama Tenant" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama PIC</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nama">Potensi </label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="modul">Kelompok Akun</label>
                                <select class="form-control selectize" id="modul" name="modul" required>
                                    <option value="">--Pilih Modul--</option>
                                    <option value="A">Aktiva</option>
                                    <option value="P">Passiva</option>
                                    <option value="L">Laba Rugi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">           
                                <label for="jenis">Kelompok Laporan</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="">--Pilih Jenis--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="account">Normal Account</label>
                                <select class="form-control selectize" id="account" name="account" required>
                                    <option value="">--Pilih Normal Account--</option>
                                    <option value="D">D - Debet</option>
                                    <option value="C">C - Kredit</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_curr">Currency</label>
                                <input class="form-control" type="text" placeholder="Kode Currency" id="kode_curr" name="kode_curr" value="IDR" readonly required>            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_akun">Kode</label>
                                <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="custom-control custom-switch" style="margin-left: 35px;">
                                    <input type="checkbox" class="custom-control-input" id="status-aktif" >
                                    <label class="custom-control-label" for="status-aktif">Tidak Aktif</label>
                                    
                                    <div class="label-switch hidden">
                                        <span id="active">Aktif</span>
                                        <span id="unactive">Tidak Aktif</span>
                                    </div>
                                </div>
                                <!-- <div class="switch-toggle">
                                    <label class="switch">
                                        <input type="checkbox" id="status-aktif">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="label-switch">
                                        <span id="active">Aktif</span>
                                        <span id="unactive">Tidak Aktif</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="custom-control custom-switch" style="margin-left: 35px;">
                                    <input type="checkbox" class="custom-control-input" id="status-anggaran" >
                                    <label class="custom-control-label" for="status-anggaran">Tidak Cek Anggaran</label>
                                    <div class="label-switch hidden">
                                        <span id="check">Cek Anggaran</span>
                                        <span id="uncheck">Tidak Cek Anggaran</span>
                                    </div>
                                </div>
                                <!-- <div class="switch-toggle">
                                    <label class="switch">
                                        <input type="checkbox" id="status-anggaran">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="label-switch">
                                        <span id="check">Cek Anggaran</span>
                                        <span id="uncheck">Tidak Cek Anggaran</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_akun">Kode</label>
                                        <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nama">Gedung</label>
                                        <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="modul">Modul</label>
                                        <select class="form-control selectize" id="modul" name="modul" required>
                                            <option value="">--Pilih Modul--</option>
                                            <option value="A">Aktiva</option>
                                            <option value="P">Passiva</option>
                                            <option value="L">Laba Rugi</option>
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12">           
                                        <label for="modul">Jenis</label>
                                        <select class="form-control" id="jenis" name="jenis" required>
                                        <option value="">--Pilih Jenis--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_curr">Currency</label>
                                        <input class="form-control" type="text" placeholder="Kode Currency" id="kode_curr" name="kode_curr" value="IDR" readonly required>            
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="blok">Status Blok</label>
                                        <select class="form-control selectize" id="blok" name="blok" required>
                                            <option value="">--Pilih Status Blok--</option>
                                            <option value="0">Unblok</option>
                                            <option value="1">Blok</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="budget">Status Budget</label>
                                        <select class="form-control selectize" id="budget" name="budget" required>
                                            <option value="">--Pilih Status Budget--</option>
                                            <option value="0">Uncheck</option>
                                            <option value="1">Check</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="account">Normal Account</label>
                                        <select class="form-control selectize" id="account" name="account" required>
                                        <option value="">--Pilih Normal Account--</option>
                                        <option value="D">D - Debet</option>
                                        <option value="C">C - Kredit</option>
                                        </select>
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
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    var $status_aktif = false;
    var $status_cek = false;
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();
    $optionJenis1 = [{value:'Neraca', text:'Neraca'}]
    $optionJenis2 = [{value:'Pendapatan', text:'Pendapatan'},{value:'Beban', text:'Beban'}]
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
// BUTTON KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
         // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        isCheckedAktif()
        isCheckedAnggaran()
        $('#id_edit').val('');
        $('#judul-form').html('Booking');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_akun').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });
    // END BUTTON TAMBAH
    </script>