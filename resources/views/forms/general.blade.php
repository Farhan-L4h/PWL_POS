@extends('welcome')

<!-- Main Sidebar Container -->

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- right column -->
        <div class="col-md-6">
          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">General Elements</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Level ID</label>
                      <input type="text" class="form-control" placeholder="Enter Level ID">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Level Name</label>
                      <input type="text" class="form-control" placeholder="Enter Level Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-info">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection