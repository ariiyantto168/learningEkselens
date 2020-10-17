<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Testimonies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kelas</li>
              <li class="breadcrumb-item acti   ve"><a href="{{ url('lecture/testimonies') }}">Testimonies Users</a></li>
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
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('lecture/testimonies/create-new') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jobrole</label>
                          <div class="col-sm-5">
                            <input type="text" name="jobrole" placeholder="jobrole" class="form-control">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <div class="col-sm-5">
                      <select class="form-control" id="idclass" name="idclass">
                        <option>-- select Kelas -- </option>
                          @foreach ($classes as $cls)
                            <option value="{{$cls->idclass}}">{{$cls->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" name="description"  cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name_materi" class="col-sm-1 col-form-label">Images Users</label>
                        <div class="col-sm-5">
                          <input type="file" class="form-control-file" name="images">
                          <small class="help-block">Extension must jpg, jpeg, png</small>
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