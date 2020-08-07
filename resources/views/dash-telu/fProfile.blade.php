<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


body {
    font-family: 'Roboto', sans-serif !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Roboto', sans-serif !important;
    font-weight: normal !important;
}
h2{
    margin-bottom: 5px;
    margin-top:5px;
}
.judul-box{
    font-weight:bold;
    font-size:18px !important;
}
.inner{
    padding:5px !important;
}

.box-nil{
    margin-bottom: 20px !important;
}

.pad-more{
    padding-left:10px !important;
    padding-right:0px !important;
}
.mar-mor{
    margin-bottom:10px !important;
}
.box-wh{
    box-shadow: 0 3px 3px 3px rgba(0,0,0,.05);
}
.small-box .icon{
    top: 0px !important;
    font-size: 20px !important;
}
.bg-white{
    background:white
}
.small-box .inner{
    background: white;
    border: 1px solid white;
    border-radius: 10px !important;
}
.small-box{
    border-radius:10px !important;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.widget-user-2 .widget-user-header {

    padding: 20px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.icon-green {
    color:white;
    background: #00a65a;
    border: 1px solid #00a65a;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-blue {
    color:white;
    background: #0073b7;
    border: 1px solid #0073b7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-purple {
    color:white;
    background: #605ca8 !important;
    border: 1px solid #605ca8 !important;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-pink {
    color:white;
    background: #d81b60;
    border: 1px solid #d81b60;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.box-footer {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
border-top: 1px solid #f4f4f4;
padding: 10px;
background-color: #fff;
box-shadow: 1px 2px 2px 2px #e6e0e0e6;

}

.box-nil{
    margin-bottom: 20px !important;
}

.icon{
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.judulBox:hover{
    color:#0073b7
}
</style>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-5">
                <div style="margin-right: 1rem;top: 130px;" class="position-absolute card-top-buttons">
                    <button id="editBackground" data-toggle="modal" data-backdrop="static" data-target="#modalBackground" alt="Edit Background" class="btn" style="background: #FFFFFF;border-radius: 10px;opacity: 0.63;padding: 5px 10px;">
                    <i class="simple-icon-pencil"></i>&nbsp;
                    Ubah background</button>
                </div>
                <img class="social-header card-img" style="height:200px;object-position:bottom" src="{{ asset('/img/gambar2.jpg') }}" />
            </div>
            <div class="col-12 col-lg-5 col-xl-4 col-left">
                <a href="#" class="lightbox" id="foto">
                </a>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="pt-5">
                        <h5 style="font-weight: bold;">Keamanan Akun</h5>
                        </div>
                        <div class="d-flex flex-row" style="margin-top:2rem">
                            <div class="w-30">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#">Username</a>
                                    </li>
                                    <li class="mb-1 pb-2" >
                                    <a href="#">Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-70">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#" class="nama"></a>
                                    </li>
                                    <li class="mb-1 pb-2">
                                    <a href="#" id="password"></a>
                                    <button id="editPassword" data-toggle="modal" data-backdrop="static" data-target="#modalPassword" alt="Edit Password" class="btn" style="background: #FFFFFF;border-radius: 10px;opacity: 0.63;padding: 5px 10px;position: absolute;right: 15px;">
                                    <i class="simple-icon-pencil"></i>&nbsp;
                                    </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-8 col-right">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 style="font-weight: bold;">Profile Pekerjaan</h5>
                        <div class="d-flex flex-row" style="margin-top:2rem">
                            <div class="w-30">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#">NIK</a>
                                    </li>
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#">Jabatan</a>
                                    </li>
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#">Nama</a>
                                    </li>
                                    <li class="mb-1 pb-2" >
                                    <a href="#">PP</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-70">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#" id="nik" ></a>
                                    </li>
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#" id="jabatan"></a>
                                    </li>
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#" class="nama"></a>
                                    </li>
                                    <li class="mb-1 pb-2" >
                                    <a href="#" id="pp"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 style="font-weight: bold;">Info Kontak</h5>
                        <div class="d-flex flex-row" style="margin-top:2rem">
                            <div class="w-30">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#">Email</a>
                                    </li>
                                    <li class="mb-1 pb-2" >
                                    <a href="#">Telepon</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-70">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1 pb-2" style="border-bottom: 1px solid #e8e8e8">
                                    <a href="#" id="email"></a>
                                    </li>
                                    <li class="mb-1 pb-2">
                                    <a href="#" id="no_telp"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-right" id="modalPhoto" tabindex="-1" role="dialog"
    aria-labelledby="modalPhoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formPhoto">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name ="foto" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>

function sepNum(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function typePass(str){
    var count = str.length;
    var text = "";
    if(count > 0){
        for(var i=0;i<count;i++){
            text+="•";
        }
    }
    return text;
}

function loadService(index,method,url,param={}){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/sesi-habis')}}";
            }
        },
        data: param,
        success:function(result){    
            if(result.status){
                switch(index){
                    case 'profile' :
                    if(result.data[0].foto == "-" || result.data[0].foto == "" || result.data[0].foto == undefined){
                        var img= `
                        <div class="position-absolute card-top-buttons" style="top: -15px;left: 50%;z-index: 10;opacity: ;">
                            <button id="editPhoto" data-toggle="modal" data-backdrop="static" data-target="#modalPhoto" alt="Edit Photo" class="btn icon-button " style="background: white;border: 1px solid #8080802b;opacity: 0.8;">
                            <i class="simple-icon-camera"></i>
                            </button>
                        </div>
                        <img alt="Profile" src="{{ asset('asset_elite/images/user.png') }}" class="img-thumbnail card-img social-profile-img" width="100" style="border-radius: 50%;">
                        `;
                    }else{
                        var img= `
                        <div class="position-absolute card-top-buttons" style="top: -15px;left: 50%;z-index: 10;opacity: ;">
                            <button id="editPhoto" data-toggle="modal" data-backdrop="static" data-target="#modalPhoto" alt="Edit Photo" class="btn icon-button " style="background: white;border: 1px solid #8080802b;opacity: 0.8;">
                            <i class="simple-icon-camera"></i>
                            </button>
                        </div>
                        <img alt="Profile" src="https://api.simkug.com/api/ypt/storage/`+result.data[0].foto+`" class="img-thumbnail card-img social-profile-img" width="100" style="border-radius: 50%;">
                        `;
                    }
                    $('#foto').html(img);
                    $('.nama').html(result.data[0].nama);
                    $('#nik').html(result.data[0].nik);
                    $('#no_telp').html(result.data[0].no_telp);
                    $('#email').html(result.data[0].email);
                    var pp = result.data[0].kode_pp+` - `+result.data[0].nama_pp;
                    $('#pp').html(pp);
                    $('#jabatan').html(result.data[0].jabatan);
                    $('#password').html(typePass(result.data[0].password));
                    break;

                }
            }
        }
    });
}
function initDash(){
    loadService('profile','GET',"dash-telu/profile"); 
}
initDash();

$('#form-profile').on('submit', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var url = "dash-telu/update-password";
        var pesan = "saved";

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
                if(result.data.status){
                    alert('Update password '+result.message);   
                    $('#password_lama').val('');
                    $('#password_baru').val('');
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                }
                else{
                   alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                   alert(jqXHR.responseText);
                }
            }
        });
        
});

$('#formPhoto').on('submit', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var url = "dash-telu/update-foto";
        var pesan = "saved";

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
                if(result.data.status){
                    alert('Update foto sukses!');
                    $('#modalPhoto').modal('hide');
                    $('#foto-profile').html('<img alt="Profile Picture" src="https://api.simkug.com/api/ypt/storage/'+result.data.foto+'">');
                    loadForm("{{url('dash-telu/form/fProfile')}}");
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                }
                else{
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    alert(jqXHR.responseText);
                }
            }
        });
        
});
</script>