<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users Profiles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Privileges</li>
              <li class="breadcrumb-item active"><a href="{{ url('privileges/userprofiles') }}">User Profiles</a></li>
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
              @include('contents.allmessage')
                <h3 class="card-title">Buat</h3>
            </div>
            <div class="card-body">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('privileges/users/create-profile/'.$user->idusers.'/create-profile') }}">
                  {{-- <form action="{{ url('lecture/class/detail/'.$class->idclass.'/create-subclass') }}" role="form" method="post"> --}}
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                        <div class="col-sm-5">
                          <input type="text" name="name" value="{{$user->name}}" readonly class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Depan</label>
                        <div class="col-sm-5">
                          <input type="text" name="firstname" placeholder="Nama Depan" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Belakang</label>
                          <div class="col-sm-5">
                            <input type="text" name="lastname" placeholder="Nama Belakang" class="form-control">
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                          <div class="col-sm-5">
                            <input type="text" name="tempatlahir" placeholder="Tempat Lahir" class="form-control">
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                      <div class="col-sm-5">
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker pull-right" name="date_born" id="date" data-date-format='yyyy-mm-dd' value="{{date('Y-m-d')}}" autocomplete="off">
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Job Role</label>
                          <div class="col-sm-5">
                            <input type="text" name="jobrole" placeholder="Job Role" class="form-control">
                          </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                          <div class="col-sm-5">
                            <textarea class="form-control" name="address"  cols="30" rows="10"></textarea>
                          </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Images Profile</label>
                      <div class="col-sm-5">
                      <img class="img-rounded zoom" id="img-upload" src="{{env('PATH_URL')}}imagesprofile/{{$user->image}}" width="100">
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