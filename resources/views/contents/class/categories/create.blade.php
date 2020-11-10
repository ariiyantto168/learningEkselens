<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kelas</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('lecture/categories') }}">Kategori</a></li>
              <li class="breadcrumb-item active">Create-new</li>

            </ol>
          </div><!-- /.col -->      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body">
              @include('contents.allmessage')
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('lecture/categories/create-new') }}">  
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" placeholder="Example: Tekhnologi" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Kategori</label>
                      <div class="col-sm-6">
                      <input type="file" name="images" id="images" class="form-control" accept="image/svg,image/jpeg" required>
                      <small class="text-danger">size image max 5 mb</small>
                      </div>
                  </div>
                        
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" value="upload">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
    
      </div>
    </section>
  </div>

  {{-- batasan size images --}}
<script type="text/javascript">
  $(document).ready(function() {
    maxFileSize = 10 * 1024 * 1024 / 2; // 10 mb

    $('#images').change(function() {
      fileSize = this.files[0].size;

      if (fileSize > maxFileSize) {
        this.setCustomValidity("You can upload only files under 5 MB");
        this.reportValidity();
      } else {
        this.setCustomValidity("");
      }
    });
  });
</script>