@extends('layout.layout')
@section('content')

<div class="card-info">
    <div class="card-header">
        <h3>Edit Cars</h3>
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
        <form method="post" enctype="multipart/form-data" action="/cars/update">
         @csrf
         @foreach($data as $add)
          <div class="form-group">
              <label for="Nama ">Type Car</label>
              <input type="text" class="form-control" name="type_car" value="{{$add->type_car}}"/>
                <input type="text" class="form-control" name="id" value="{{$add->id}}" hidden/>
          </div>
          <div class="form-group">
              <label for="Nama ">Year Car</label>
                <input type="text" class="form-control" name="year_car" value="{{$add->year_car}}"/>
          </div>
          <div class="form-group">
              <label for="Nama ">Colour Car</label>
                <input type="text" class="form-control" name="colour_car" value="{{$add->colour_car}}"/>
          </div>
          <div class="form-group">
              <label for="Nama ">Remarks</label>
                <textarea class="form-control" name="remarks" >{{$add->remarks}}</textarea>
          </div>
          @endforeach
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-primary" >
    </form>
        <a href="/cars" class="btn btn-danger">Back</a>
    </div>
</div>
@endsection