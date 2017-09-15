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

                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </thead>
                        @foreach($data as $object)
                        <tr>
                            <td>{{ $object->name }}<td>
                            <td>{{ $object->email }}<td>
                            <td>{{ $object->status }}<td>
                            <td>{{ $object->role }}<td>
                            <td>{{ $object->created_at }}<td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $data }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
