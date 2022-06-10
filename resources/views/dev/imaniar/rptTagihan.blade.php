<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('dev-report/dev-lap-tagihan', null, formData, null, function(res){
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
            html+=`<h6>LAPORAN TAGIHAN<h6>
                    <hr>`;
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='15%'>NO TAGIHAN</th>
                        <th width='15%'>NIS SISWA</th>
                        <th width='20%'>NAMA SISWA</th>
                        <th width='20%'>KETERANGAN</th>
                        <th width='10%'>TANGGAL</th>
                        <th width='10%'>PERIODE</th>
                </tr>
                </thead>`;
            var det = ``;
            var no = 1 ;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                det+=`<tr>
                    <td>`+no+`</td>
                    <td>`+line.no_tagihan+`</td>
                    <td>`+line.nim+`</td>
                    <td>`+line.nama+`</td>
                    <td>`+line.keterangan+`</td>
                    <td>`+line.tanggal+`</td>
                    <td>`+line.periode+`</td>
                    </tr>`;
                no++;   
            }
            html+=det;
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
   