<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kelas</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('lecture/categories') }}">Kategori</a></li>
              <li class="breadcrumb-item active">Update</li>
              <li class="breadcrumb-item active">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
              </li>
            </ol>
          </div><!-- /.col -->      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('contents.allmessage')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat</h3>
            </div>
            <div class="card-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('lecture/categories/update/'.$categories->idcategories) }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" value="{{$categories->name}}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Kategori</label>
                      <div class="col-sm-5">
                      <input type="file" value="{{$categories->images}}" id="images" name="images" accept="image/svg,image/jpeg" class="form-control" required>
                      <br>
                      <img class="img-rounded zoom" id="img-upload" src="{{env('PATH_URL')}}image/{{$categories->images}}" width="100">
                    </div>
                  </div>
                        
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>  
    
      </div>
    </section>
  </div>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Delete Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure Delete Categories ?
      </div>
      <div class="modal-footer">
          <form action="{{ url('lecture/categories/delete/'.$categories->idcategories) }}" role="form" method="post">
            @method('delete')
            @csrf
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>

  </div>
</div> 

  {{-- batasan size images --}}
  <script type="text/javascript">
    $(document).ready(function() {
      maxFileSize = 10 * 1024 * 1024 / 2; // 5 mb
  
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