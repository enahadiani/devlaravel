<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-saku/dash-financial.dekstop.css?version=_').time() }}" />

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
                    data_jur = [...data_jur, jur.kode_jur];
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
                            },
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function () {
                                        alert('Category: ' + this.category + ', value: ' + this.y);
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

    // DATABASE
    // var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    //     var dataTable = $("#table-data").DataTable({
    //     destroy: true,
    //     bLengthChange: false,
    //     sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
    //     'ajax': {
    //         'url': "{{ url('dev-dash/list-siswa/JUR001') }}",
    //         'async':false,
    //         'type': 'GET',
    //         'dataSrc' : function(json) {
    //             if(json.status){
    //                 return json.daftar;   
    //             }else{
    //                 window.location.href = "{{ url('dev-auth/sesi-habis') }}";
    //                 return [];
    //             }
    //         }
    //     },
    //     'columns': [
    //         { data: 'nim' },
    //         { data: 'nama' }
    //     ],
    //     drawCallback: function () {
    //         $($(".dataTables_wrapper .pagination li:first-of-type"))
    //             .find("a")
    //             .addClass("prev");
    //         $($(".dataTables_wrapper .pagination li:last-of-type"))
    //             .find("a")
    //             .addClass("next");

    //         $(".dataTables_wrapper .pagination").addClass("pagination-sm");
    //     },
    //     language: {
    //         paginate: {
    //             previous: "<i class='simple-icon-arrow-left'></i>",
    //             next: "<i class='simple-icon-arrow-right'></i>"
    //         },
    //         search: "_INPUT_",
    //         searchPlaceholder: "Search...",
    //         // lengthMenu: "Items Per Page _MENU_"
    //         "lengthMenu": 'Menampilkan <select>'+
    //         '<option value="10">10 per halaman</option>'+
    //         '<option value="25">25 per halaman</option>'+
    //         '<option value="50">50 per halaman</option>'+
    //         '<option value="100">100 per halaman</option>'+
    //         '</select>',
            
    //         info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //         infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
    //         infoFiltered: "(terfilter dari _MAX_ total entri)"
    //     }
    //     });
    //     //END DATABASE
        
    //     $.fn.DataTable.ext.pager.numbers_length = 5;

    //     //SEARCH DATA - TABEL DATA SISWA
    //     $("#searchData").on("keyup", function (event) {
    //         dataTable.search($(this).val()).draw();
    //     });

    //     //PAGE COUNT
    //     $("#page-count").on("change", function (event) {
    //         var selText = $(this).val();
    //         dataTable.page.len(parseInt(selText)).draw();
    //     });

    

    // Create the chart


</script>







