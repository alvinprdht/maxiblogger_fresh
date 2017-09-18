@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                    <a href="{{ Manager::to('role','self') }}">Role</a>
                    <a href="{{ Manager::to('add','self') }}">Add User</a>
                    <a href="{{ Manager::to('list','self') }}">All User</a>

                    <table id="table_user" class="table">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>
                        @foreach($data as $object)
                            <tr>
                                <td>{{ $object->name }}</td>
                                <td>{{ $object->email }}</td>
                                <td>{{ $object->status }}</td>
                                <td>{{ $object->role }}</td>
                                <td>{{ $object->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){ 
        $('#table_user').DataTable();
    })
</script>
@endsection