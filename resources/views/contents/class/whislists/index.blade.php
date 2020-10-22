<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Whislists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Lecture</li>
              <li class="breadcrumb-item active"><a href="{{ url('lecture/whislists') }}">My Whislists</a></li>
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
                <h3 class="card-title">Index</h3>
                <div class="float-right"><i class="fas fa-plus size:2x"></i> <a href="{{ url('lecture/whislists/create-new') }}">Create New</a></div>

            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>my whislists</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($whislists as $idx => $whis)
                        <tr>
                            <td>{{ $idx+1 }}</td>
                            <td>
                                    @if ($whis->active)
                                    <span class="btn btn-block btn-success btn-sm" style="width: 60px;">Active</span>
                                    @else
                                    <span class="btn btn-block btn-danger btn-sm" style="width: 70px;">Inactive</span>
                                    @endif
                            </td>
                        <td>
                          <a href="{{ url('lecture/whislists/update/'.$whis->idwhislists) }}"><i class="fas fa-edit"></i></a>
                        </td>
                        </tr>
                        @endforeach
                  </tbody>                    
                </table>
            </div>
        </div>  
    
      </div>
    </section>
  </div>