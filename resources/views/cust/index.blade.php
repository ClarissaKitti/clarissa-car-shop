@extends('layout.layout')
@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(session()->get('danger'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session()->get('danger') }}  
  </div><br />
@endif
</div>
<h3>Data Customer</h3>
<div class="card card-info">
<div class="card-header">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-addcars">Input data</button>
 
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
          @foreach($cust as $add)
      <tr>
        <td>{{$add->nama_cust}}</td>
        <td>{{$add->alamat}}</td>
        <td>{{$add->email}}</td>
        <td> {{$add->no_hp}}</td>
        <td><a href="/cust/edit/{{$add->id}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="/cust/delete/{{$add->id}}" method="post">
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </tfoot>
    </table>
  </div>
</div>

<div class="modal fade" id="modal-addcars">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <i class="fas fa-fw fa-plus-circle"></i><span>Add &nbsp;<b>Data</b></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
        <form method="post" enctype="multipart/form-data" action="/cust/store">
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="Nama ">Nama Customer</label>
                  <input type="text" class="form-control" name="nama_cust" />
            </div>
            <div class="form-group">
                <label for="Nama ">Alamat</label>
                  <input type="text" class="form-control" name="alamat" />
            </div>
            <div class="form-group">
                <label for="Nama ">Email</label>
                  <input type="text" class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label for="Nama ">No Hp</label>
                  <textarea class="form-control" name="no_hp"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Customer">
        </form>
        </div>
    </div>
    </div>
    </div>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection