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
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Create</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
          </div>
          <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data" action="{{ url('lecture/class/create-new') }}">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <div class="col-sm-6">
                    <select class="form-control" id="idcategories" name="idcategories">
                      <option>-- select categories -- </option>
                        @foreach ($categories as $cat)
                          <option value="{{$cat->idcategories}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Images</label>
                      <div class="col-sm-6">
                      <input type="file" name="images" class="form-control">
                      <small class="text-danger">size image max 5 mb</small>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Demo</label>
                      <div class="col-sm-6">
                      <input type="file" name="demo" class="form-control">
                      <small class="text-danger">size image max 10 mb</small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutor</label>
                    <div class="col-sm-6">
                      <textarea name="tutor" rows="3"  class="form-control" required></textarea>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <div class="col-sm-6">
                      <textarea name="description" rows="3"  class="form-control" required></textarea>
                    </div>
                  </div>

                  {{-- class lecture --}}
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Materi Lecture</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Head Materi</label>
                        <div class="col-sm-6">
                          <input type="text" name="headmateri" placeholder="Head Materi" class="form-control">
                        </div>
                      </div>

                    </div>

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name Materi</label>
                        <div class="col-sm-6">
                          <input type="text" name="materi" placeholder="Materi" class="form-control">
                        </div>
                      </div>

                    </div>
                  </div>

                  {{-- hilight lecture --}}
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Hilight Lecture</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Hilights Class</label>
                        <div class="col-sm-6">
                          <textarea name="namehilights" rows="2"  class="form-control" required></textarea>
                        </div> 
                      </div>
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