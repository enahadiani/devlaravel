<script>
    
     // SISWA BOX
     (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('dev-dash/dev-box-siswa') }}",
            dataType: 'json',
            async: true,
            success:function(result){
                var data = result.data.data;
                console.log(data)
                $('#siswa-value').text(sepNum(data.length));
            }
        });
    })();
    // END BOX SISWA
</script>

<!-- HEADER -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h3 class="m-0 text-dark my-5 ml-5">Dashboard</h3>
            <hr>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="row">
    <div class="col-md-4 col-xl-3 ml-5">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <h5 id="siswa-value" class="text-value text-dark-red font-bold">0</h5>
                    </div>
                    <div class="text-muted">Data Siswa</div>
                  </div>
                </div>
              </div>
            </div>
    <div class="col-md-4 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <h5 id="siswa-value" class="text-value text-dark-red font-bold">0</h5>
                    </div>
                    <div class="text-muted">Data Jenis</div>
                  </div>
                </div>
              </div>
            </div>
    <div class="col-md-3 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <h5 id="siswa-value" class="text-value text-dark-red font-bold">0</h5>
                    </div>
                    <div class="text-muted">Data Tagihan</div>
                  </div>
                </div>
              </div>
            </div>
    </div>