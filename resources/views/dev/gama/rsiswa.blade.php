<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('dev-report/dev-lap-siswa', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('dev-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data);
        if(data.length > 0){
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }            
            var html=`<div align='center'>
            <style>
                .info-table thead{
                    // background:#e9ecef;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>`;
            // html+=judul_lap("DAFTAR SISWA AKTIF",ta,'KELAS '+line.kode_kelas);
            html+=`<h6>LAPORAN SISWA AKTIF<h6>
                    <hr>`;
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='20%'>NIS</th>
                        <th width='20%'>NAMA</th>
                        <th width='25%'>KODE JURUSAN</th>
                        <th width='30%'>JURUSAN</th>
                </tr>
                </thead>`;
                
            for (let i = 0; i < data.length; i++) {
                no=i+1
                html+=`<tr>
                    <td>${no}</td>
                    <td>${data[i].nim}</td>
                    <td>${data[i].nama}</td>
                    <td>${data[i].kode_jur}</td>
                    <td>${data[i].nama_jur}</td>
                    </tr>`
            }

            html+=`
                </table>
            </div>
            `;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   