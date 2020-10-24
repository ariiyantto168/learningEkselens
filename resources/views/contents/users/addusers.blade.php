<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Users</li>
              <li class="breadcrumb-item active"><a href="{{ url('privileges/users') }}">Users</a></li>
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

            <div class="row">
            <div class="card-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('privileges/users/create-new') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" placeholder="Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                          <div class="col-sm-5">
                            <input type="email" name="email" placeholder="Input Your Email" class="form-control">
                          </div>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">images</label>
                      <div class="col-sm-5">
                      <input type="file" name="image" class="form-control">
                      <small class="text-danger">size image max 5 mb</small>
                      </div>
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="role">
                        <option value="c">Admin Class</option>
                        <option value="b">Admin Business</option>
                        <option value="m">Mitra</option>
                        <option value="i">Instructor</option>
                        <option value="u">User</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                      <div class="col-sm-5">
                        <input type="password" name="password" placeholder="Input your password" class="form-control">
                      </div>
                  </div>
                        
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>  
    
      </div>
    </section>
  </div>