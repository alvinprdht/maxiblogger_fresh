@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                    <a href="{{ URL::to(Session('childURL').'/role') }}">Role</a>
                    <a href="{{ URL::to(Session('childURL').'/add') }}">Add User</a>
                    <a href="{{ URL::to(Session('childURL').'/list') }}">All User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
