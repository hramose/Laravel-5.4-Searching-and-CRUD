
@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
              
            <div class="panel panel-primary">
                <div class="panel-heading"> Home / Manage / Departemts


                </div>


                <div class="panel-body">

               

    <div class="row">
        <div class="col-md-12">
        <a id="btncreate" class="btn btn-primary" href="{{ route('depts.create') }}">
                                   <i class="fa fa-plus" aria-hidden="true" ></i></a> 
                                    </br>
                                    </br>
                                    

<!--searching functionality -->
  <form action="/search" method="POST" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control" name="q"
          placeholder="Search by Department id or name "> <span class="input-group-btn">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </span>
      </div>
    </form>

    @include('msg._msg')
         

  <div class="table table-responsive">
               <table id ="table" class="table table-striped">

    <thead>
      <tr>
        <th>Action</th>
        <th>#</th>
        <th>department Id</th>
        <th>department Name</th>
        <th>description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach ($depts as $dept)
        <td>
      <a href="{{ route('depts.edit', $dept->id) }}" class="btn btn-default btn-xs" role="button" id="editbutton"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      <form action="{{ route('depts.destroy', $dept->id) }}" class="form-group pull-left" method="post" onclick="return confirm('Are you sure to delete?')" > 
       {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-xs"  id="editbutton"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
      </form>
        </td>

        <td>{{$dept->id}}</td>
        <td>{{$dept->departmentId}}</td>
        <td>{{$dept->departmentName}}</td>
        <td>{{$dept->description}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    
    {!!$depts->links();!!}
  </div>
</div>

   </div>
 </div>
</div>
</div>

               
      
@endsection