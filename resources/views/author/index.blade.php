<!DOCTYPE html>
<html>
@include("header")
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include("sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Author</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h6>Total Author : {{ count($data['author'])}} </h6>
                <hr/>
                <div class="card-tools">
                  <a href="{{ url('/')}}/author/add" class="btn btn-primary">Tambah Author</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead class="header_1">
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $data['author'] as $key => $value )
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td><a href="{{url('/')}}/author/show/{{$value->id}}" class="btn btn-primary">Detail</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
</div>
@include("footer")
</body>
</html>
