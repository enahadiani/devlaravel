<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/dash-financial.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
    var chartJurusan = null;

    function getDataJurusan(){
        $.ajax({
        type: 'GET',
        url: "{{ url('dev-dash/data-jurusan') }}",
        dataType: 'json',
        async: true,
        success:function(result){
            var data = result.daftar;
            console.log(data);
            var data_jur = [];
            var data_jum = [];
            data.forEach(jur => {
                data_jur = [...data_jur, jur.nama];
                data_jum = [...data_jum, parseInt(jur.jumlah)];
            });
            
            chartJurusan =  Highcharts.chart('chart-jurusan', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'center',
                    text: 'Data Jurusan'
                },
                credits: {
                    enabled: false
                },
                subtitle: {
                    align: 'center',
                    text: 'Jumlah Siswa setiap Jurusan'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    categories: data_jur,
                    // type: 'category',
                    title:{
                        text: 'Jurusan'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Siswa'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [
                    {
                        name: "Jurusan",
                        colorByPoint: true,
                        data: data_jum
                    }
                ],
                drilldown: {
                    breadcrumbs: {
                        position: {
                            align: 'right'
                        }
                    }
                }
            });
        }
    });
    }

    getDataJurusan();



    // Create the chart


</script>


<section id="saku-dashboad" class="mt-12 p-24">
    <div id="dekstop-1" class="dekstop card card dash">
        <div class="card-body">
            <div id="chart-jurusan" style="width:100%; height: calc(86.5vh - 180px);"></div>
        </div>
    </div>  
</section>





