<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kupons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Promotions</li>
              <li class="breadcrumb-item active"><a href="{{ url('promotions/kupons') }}">Kupons</a></li>
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
                <div class="float-right"><i class="fas fa-plus size:2x"></i> <a href="{{ url('promotions/kupons/create-new') }}">Create New</a></div>

            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Kupon Price</th>
                          <th>Images</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($kupons as $idx => $kup)
                      <tr>
                          <td>{{ $idx+1 }}</td>
                          <td>{{ $kup->name }}</td>
                          <td>{{ $kup->potongan }}</td>
                          <td>
                          {{-- images dapet dr model function --}}
                            @if (is_null($kup->images))
                              <label> - </label>
                            @else
                              <img class="img-rounded zoom" src="{{env('PATH_URL')}}promotions/kupons/{{$kup->images}}" width="50">
                            @endif
                      </td>
                      <td>
                        <a href="{{ url('promotions/kupons/update/'.$kup->idkupons) }}"><i class="fas fa-edit" title="Update Kupons"></i></a>
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