@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
              
            <div class="panel panel-primary">
           
                <div class="panel-heading">Home / Add /Department</div>

                <div class="panel-body">
    <div class="row">
        <div class="col-md-12">

             @include('errors._errors')
         
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('depts.store') }}">
                        {{ csrf_field() }}

                        
                       <div class="form-group{{ $errors->has('departmentId') ? ' has-error' : '' }}">
                            <label for="departmentId" class="col-md-4 control-label">Department Id<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="departmentId" type="text" class="form-control" name="departmentId" value="{{ old('departmentId') }}" required autofocus>

                                @if ($errors->has('departmentId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departmentId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('departmentName') ? ' has-error' : '' }}">
                            <label for="departmentName" class="col-md-4 control-label">Department Name<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="departmentName" type="text" class="form-control" name="departmentName" value="{{ old('departmentName') }}" required autofocus>

                                @if ($errors->has('departmentName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departmentName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description<span class="required">*</span> </label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                         

                    



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  class="btn btn-primary">
                                    Save
                                </button>
                                <a class="btn btn-default" href="{{ route('depts.index') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                </div>
            </div>
    
       
   
@endsection
