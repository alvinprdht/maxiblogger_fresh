@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                    <form method="POST" action="{{ URL::to(Session('childURL')) }}" class="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" >
                                @foreach($role as $temp)
                                    <option value="{{$temp['id']}}">{{ $temp['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                           {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
