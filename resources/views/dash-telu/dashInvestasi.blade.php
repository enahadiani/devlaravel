@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');
@endphp
<style>
   .card{
        border-radius: 0 !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }
    td,th{
        padding:4px !important;
    }
    .btn-red{
        padding: 2px 20px;
        border-radius: 15px; 
        background:#ad1d3e;
        color:white;
        border-color: #ad1d3e;
    }

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }

    .nav-tabs .nav-link{
        border: 1px solid #ad1d3e;
        border-radius: 20px;
        padding: 2px 25px;
        color:#ad1d3e;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: white;
        background-color: #ad1d3e;
        border-color: #ad1d3e;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
        padding: 0px 10px 0px 0px;
    }
    
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    /* #modalFilter
    {
        top:90px
    }

    @media (max-width: 1439px) {
        #modalFilter
        {
            top:90px
        }
    }
    @media (max-width: 1199px) {
        #modalFilter
        {
            top:80px
        }
    }
    @media (max-width: 767px) {
        #modalFilter
        {
            top:70px
        }   
    }
    @media (max-width: 575px) {
        #modalFilter
        {
            top:70px
        }
    } */
    
    /* .modal-backdrop.show
    {
        opacity:0;
    }
    .modal-content{
        box-shadow: 0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);;
    } */
</style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h1>Investasi</h1>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4" >Komponen Investasi</h6>
                <div class="card-body pt-0">
                    <div id='komponen' style='height:350px'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4" >RKA VS Realisasi</h6>
                <!-- <p style='font-size:9px;padding-left:20px'>Klik bar untuk melihat detail</p> -->
                <div class="card-body pt-0">
                    <div id='rkaVSreal' style='height:350px'></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4" >Penyerapan Inventaris Tahun 2020</h6>
                <!-- <p style='font-size:9px;padding-left:20px'>Klik bar untuk melihat detail</p> -->
                <div class="card-body pt-0">
                    <div id='serapInvestasi' style='height:350px'></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4" >Penyerapan Inventaris Tahun 2020</h6>
                <!-- <p style='font-size:9px;padding-left:20px'>Klik bar untuk melihat detail</p> -->
                <div class="card-body pt-0">
                    <div id='rkaVSreal3' style='height:350px'></div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Periode</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll ps">
                <h6 class="modal-title pl-0" style="position:absolute">Filter</h6>
                <button type="button" class="close" id="btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="form-filter" style="margin-top:50px">
                    <div class="form-group" style="margin-bottom:30px">
                        <label>Periode</label>
                        <select class="form-control" data-width="100%" name="periode" id="periode">
                        <option value='#'>Pilih Periode</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right ml-2">Tampilkan</button>
                    <button type="button" class="btn btn-outline-primary float-right" id="btn-reset">Reset</button>
                </form>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                    </div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
 {{-- <script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var darkMode = localStorage.getItem('dore-theme-color');
    var color = '';
    var colorText = '';
    function drawChart() {
        console.log(darkMode);
        if(darkMode == 'dore.dark.redruby.min.css'){
            color = '#404040';
            colorText = '#FFFFFF';
        }else if(darkMode == 'dore.light.redruby.min.css'){
            color = 'transparent';
            colorText = '#000000';
        }
        console.log(color)
        console.log(colorText)
        var data = new google.visualization.arrayToDataTable([
            ['Categories', 'Real', 'On Progres', 'RKA'],
            ['GEDUNG DAN PEMBANGUNAN', 80, 20, 150],
            ['SARANA PENDIDIKAN', 70, 60, 200],
            ['Sarpen CELOE', 70, 90, 250],
            ['Sarpen Telu', 60, 75, 300],
            ['INVENTARIS KANTOR', 80, 90, 350],
            ['SERTIFIKASI PENDIDIKAN', 90, 80, 270],
            ['AKREDITASI DALAM', 50, 60, 170],
            ['ALAT PENGOLAH DATA', 60, 55, 220],
            ['ALAT CATUT DAYA', 80, 70, 210],
        ]);

        var options = {
            legend: { position: 'bottom', alignment:'center' ,maxLines: 3,  textStyle: {color: colorText} },
            bar: { groupWidth: '75%' },
            isStacked: true,
            backgroundColor: { fill: color },
            hAxis: {
                textStyle:{color: colorText}
            },
            vAxis:{
                textStyle:{color: colorText}
            },
            seriesType: 'bars',
            series: {
                0:{color:'#FF8F01'},
                1:{color:'#A5A5A5'},
                2:{color:'#0004FF', type:'area'}
            }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('rkaVSreal3'));
        chart.draw(data, options);
    }
 </script> --}}

<script>
var $kd = "";
function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
            // console.log(x);
            var tmp = x.toString().split('.');
            // console.dir(tmp);
            var y = tmp[1].substr(0,2);
            var z = tmp[0]+'.'+y;
            var parts = z.split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
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

function toMilyar(x) {
    var nil = x / 1000000000;
    return sepNum(nil) + ' M';
}

function singkatNilai(num){
    if(num < 0){
        num = num * -1;
    }
    
    if(num >= 1000 && num < 1000000){
        var str = 'Rb';
        var pembagi = 1000;
    }else if(num >= 1000000 && num < 1000000000){
        var str = 'Jt';
        var pembagi = 1000000;
    }else if(num >= 1000000000 && num < 1000000000000){
        var str = 'M';
        var pembagi = 1000000000;
    }else if(num >= 1000000000000){
        var str = 'T';
        var pembagi = 1000000000000;
    }
    
    if(num < 0){
        return (parseFloat(num/pembagi).toFixed(0) * -1) + ' ' +str;
    }else if (num > 0 && num >= 1000){
        return parseFloat(num/pembagi).toFixed(0) + ' ' +str;
    }else if(num > 0 && num < 1000){
        return num;
    }else{
        return num;
    }
}


function getPeriode(){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/periode') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#periode').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                    }
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getPeriode();

function getRKARealInvestasi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/rka-real-investasi') }}",
        data:{periode:periode},
        dataType:"JSON",
        success:function(result){
            Highcharts.chart('rkaVSreal', { 
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNum(this.y)+'</b>';
                    }
                },
                yAxis: {
                    title: {
                        text: ''
                        },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                xAxis: {
                    categories:result.data.ctg
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            formatter: function () {
                                return '<b>'+sepNum(this.y)+'</b>';
                            }
                        }
                    }
                },
                series: result.data.series

            });

        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getKomponenInvestasi(periode=null){
$.ajax({
    type:"GET",
    url:"{{ url('/dash-telu/komponen-investasi') }}",
    data:{periode:periode},
    dataType:"JSON",
    success: function(result){
        Highcharts.chart('komponen', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: null
            },
            credits:{
                enabled:false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        // distance:-30,
                        
                        alignTo: 'plotEdges',
                        format:'<b>{point.name}</b>'
                        // formatter: function () {
                        //     // return Highcharts.numberFormat(this.percentage,2,",",".")+' %';
                        //     return this.name;
                        // }
                    },
                    size:'100%',
                    showInLegend: false
                }
            },
            series: [{
                name: 'Komponen Investasi',
                colorByPoint: true,
                data: result.data.data
            }],
            // legend: {
            //     itemStyle: {
            //         fontSize:'8px'
            //     }
            // }
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {       
        if(jqXHR.status == 422){
            var msg = jqXHR.responseText;
        }else if(jqXHR.status == 500) {
            var msg = "Internal server error";
        }else if(jqXHR.status == 401){
            var msg = "Unauthorized";
            window.location="{{ url('/dash-telu/sesi-habis') }}";
        }else if(jqXHR.status == 405){
            var msg = "Route not valid. Page not found";
        }
        
    }
});

}

function getSerapInvestasi(periode=null) {
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/penyerapan-investasi') }}",
        dataType:"JSON",
        data:{periode:periode},
        success:function(result){

            Highcharts.chart('serapInvestasi', {
                title: {
                    text: null
                },
                xAxis:{
                    // categories: ['GEDUNG DAN BANGUNAN','SARANA PENDIDIKAN','Sarpen CELOE','Sarpen Telu','INVENTARIS KANTOR','SERTIFIKASI PENDIDIKAN','AKREDITASI DALAM','ALAT PENGOLAH DATA','ALAT CATUT DAYA']
                    categories : result.data.ctg
                },
                credits:{
                    enabled:false
                },
                plotOptions: {
                    area: {
                        marker: {
                            pointStart: 5,
                            enabled: false,
                            symbol: 'circle',
                            radius: 2,
                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    },
                    column: {
                        stacking: 'percent'
                    }
                },
                // series:[
                //     {
                //         type:'area',
                //         name:'RKA',
                //         color:'#0004FF',
                //         data: [150,200,250,300,350,270,170,220,210]
                //     },
                //     {
                //         type:'column',
                //         name:'Real',
                //         color: '#FF8F01',
                //         data: [5,9,7,6,5,3,8,8.5,9]
                //     },
                //     {
                //         type:'column',
                //         name:'On Progres',
                //         color:'#A5A5A5 ',
                //         data: [2,5,4,5,7,5,6,7.5,6]
                //     }
                // ]
                series: result.data.series
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getKomponenInvestasi("{{$periode}}");
// getOprNonOpr("{{$periode}}");
getRKARealInvestasi("{{$periode}}");
getSerapInvestasi("{{$periode}}");

$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    getKomponenInvestasi(periode);
    // getOprNonOpr(periode);
    getRKARealInvestasi(periode);
    var tahun = parseInt(periode.substr(0,4));
    var tahunLalu = tahun-1;
    $('.thnLalu').text(tahunLalu);
    $('.thnIni').text(tahun);
    $('#modalFilter').modal('hide');
    
    // $('.app-menu').hide();
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode')[0].selectize.setValue('');
});

// $('.app-menu').hide();
   
$('#btn-filter').click(function(){
    // $('.app-menu').show();
    
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    // $('.app-menu').hide();
});
    
</script>
