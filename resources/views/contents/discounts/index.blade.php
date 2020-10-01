<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Discounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Promotions</li>
              <li class="breadcrumb-item active"><a href="{{ url('promotions/discounts') }}">Discounts</a></li>
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
                <div class="float-right"><i class="fas fa-plus size:2x"></i> <a href="{{ url('promotions/discounts/create-new') }}">Create New</a></div>

            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Percent</th>
                          <th>Slug</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                  </tbody>                    
                </table>
            </div>
        </div>  
    
      </div>
    </section>
  </div>