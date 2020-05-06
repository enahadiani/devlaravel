<style>
.form-group{
    margin-bottom:15px !important;
}
</style>
    <div class="container-fluid mt-3">
        <div class="row" id="saku-data">
            <div class="col-12">
                <div class="card" style="min-height:560px">
                    <div class="card-body">
                        <style>
                        th,td{
                            padding:8px !important;
                            vertical-align:middle !important;
                        }
                        </style>
                        <h4 class="card-title">Data Verifikasi 
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                            <thead>
                                <tr>
                                <th>No Verifikasi</th>
                                <th>No Aju</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <script>
    function sepNum(x){
        var num = parseFloat(x).toFixed(0);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }

    function toRp(num){
        if(num < 0){
            return "("+sepNum(num * -1)+")";
        }else{
            return sepNum(num);
        }
    }

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        // number = number.replace(',', '.');
        return +number;
    }

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a>";
    
    var dataTable2 = $('#table-data').DataTable({
        'ajax': {
            'url': "{{ url('apv/verifikasi_history') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columns': [
            { data: 'no_bukti' },
            { data: 'no_juskeb' },
            { data: 'status' },
            { data: 'keterangan' },
            { data: 'tanggal' }
        ]
    });

    </script>