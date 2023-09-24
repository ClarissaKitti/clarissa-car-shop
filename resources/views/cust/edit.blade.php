@extends('layout.layout')
@section('content')

<div class="card-info">
    <div class="card-header">
        <h3>Edit Customer</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" enctype="multipart/form-data" action="/cust/update">
         @csrf
         @foreach($data as $add)
          <div class="form-group">
                <label for="Nama ">Nama Customer</label>
                  <input type="text" class="form-control" name="nama_cust" value="{{$add->nama_cust}}"/>
                  <input type="text" class="form-control" name="id" value="{{$add->id}}" hidden/>
            </div>
            <div class="form-group">
                <label for="Nama ">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="{{$add->alamat}}"/>
            </div>
            <div class="form-group">
                <label for="Nama ">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$add->email}}"/>
            </div>
            <div class="form-group">
                <label for="Nama ">No Hp</label>
                  <textarea class="form-control" name="no_hp">{{$add->no_hp}}</textarea>
            </div>
          @endforeach
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-primary" >
    </form>
        <a href="/cust" class="btn btn-danger">Back</a>
    </div>
</div>
@endsection