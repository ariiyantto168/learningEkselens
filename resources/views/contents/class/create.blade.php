<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Lecture</li>
              <li class="breadcrumb-item active"><a href="{{ url('lecture/class') }}">Class</a></li>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data" action="{{ url('lecture/class/create-new') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Images</label>
                        <input type="file" name="images" class="form-control">
                        <small class="text-danger">size image max 5 mb</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Demo</label>
                        <input type="file" name="demo" class="form-control">
                        <small class="text-danger">size image max 10 mb</small>
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