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
              <li class="breadcrumb-item active">Lecture</li>
              <li class="breadcrumb-item active"><a href="{{ url('lecture/categories') }}">Categories</a></li>
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
                <div class="float-right"><i class="fas fa-plus size:2x"></i> <a href="{{ url('lecture/categories/create-new') }}">Create New</a></div>

            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Gambar Kategori</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $idx => $categorie)
                        <tr>
                            <td>{{ $idx+1 }}</td>
                            <td>{{ $categorie->name }}</td>
                            <td>
                            {{-- images dapet dr model function --}}
                              @if (is_null($categorie->images))
                                <label> - </label>
                              @else
                                <img class="img-rounded zoom" src="{{env('PATH_URL')}}image/{{$categorie->images}}" width="50">
                              @endif
                        </td>
                        <td>
                          <a href="{{ url('lecture/categories/update/'.$categorie->idcategories) }}"><i class="fas fa-edit" title="edit categories"></i></a>
                          <a style="color:blue;" type="button"><i class="fas fa-trash"  onclick="btn_delete({{$categorie->idcategories}})" title="delete categories" data-toggle="modal" data-target="#myModal"></i></a>
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
      <form action="{{ url('lecture/categories/delete') }}" role="form" method="post">
        @csrf
      <div class="modal-body">
        Are You Sure Delete Categories ?
        <input type="text" id="idcategories" name="idcategories">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </form>
    </div>

  </div>
</div> 

<script>
  function btn_delete(idcategories){
    $('#idcategories').val(idcategories)
  }
</script>