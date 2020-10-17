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
                <h3 class="card-title">Buat</h3>
            </div>
            <div class="card-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('lecture/categories/update/'.$categories->idcategories) }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" value="{{$categories->name}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Kategori</label>
                      <div class="col-sm-5">
                      <input type="file" name="images" class="form-control">
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