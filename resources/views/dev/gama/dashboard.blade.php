<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/global.dekstop.css?version=_') . time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/dash-financial.dekstop.css?version=_') . time() }}" />

<section id="saku-dashboad" class="mt-12 p-24">
    <div id="dekstop-1" class="dekstop card card dash">
        <div class="card-body">
            <div id="chart-jurusan" style="width:100%; height: calc(86.5vh - 180px);"></div>
        </div>
    </div>
</section>


{{-- <!-- LIST DATA -->
<x-list-data judul="Data Siswa" tambah="" :thead="array('NIS','Nama Siswa')" :thwidth="array(15,15)" :thclass="array('','')" />
<!-- END LIST DATA --> --}}

<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-dash/data-jurusan') }}",
            dataType: 'json',
            async: true,
            success: function(result) {
                let Jurusan=[]
                let Data=[]
              result.daftar.map((d)=>{
                Jurusan.push(d['kode_jur'])
                Data.push(parseInt(d['jumlah']))
              })
              console.log(Jurusan);
              console.log(Data);


                chartJurusan = Highcharts.chart('chart-jurusan', {
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
                        categories: Jurusan,
                        // type: 'category',
                        title: {
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
                            },
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function() {
                                        alert('Category: ' + this.category +
                                            ', value: ' + this
                                            .y);
                                        console.log(this.category);

                                    }
                                }
                            }
                        },

                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },

                    series: [{
                        name: "Jurusan",
                        colorByPoint: true,
                        data: Data
                    }],
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
    })
</script>
