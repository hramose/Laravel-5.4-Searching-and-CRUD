@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">

              
            <div class="panel panel-primary">
                <div class="panel-heading">Home / Manage /Departments

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

  @if(isset($details))
      <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <div class="table table-responsive">
  
  <table id="table" class="table table-striped">

    <thead>
      <tr>
        <th>Action</th>
       
        <th>Department Id</th>
        <th>Department Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>

          @foreach($details as $user)
          <td>   
        <a href="{{ route('depts.edit', $user->id) }}" class="btn btn-default btn-xs" role="button" id="editbutton"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <form action="{{ route('depts.destroy', $user->id) }}" class="form-group pull-left" method="post" onclick="return confirm('Are you sure to delete?')" > 
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
      <button type="submit" class="btn btn-danger btn-xs"  id="editbutton"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
      </form>
        </td>
        <td>{{$user->departmentId}}</td>
        <td>{{$user->departmentName}}</td>
        <td>{{$user->description}}</td>

      </tr>
      @endforeach
    </tbody>
  </table>
      
      @if($details){!! $details->render() !!}@endif
      @elseif(isset($message))
      <p>{{ $message }}</p>
      @endif



               
      
@endsection