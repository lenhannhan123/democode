@extends('admin-layout.layout')
@section('title','List User')

@section('content')
<h2>Danh sách người dùng</h2>
<hr>
<div>
    <a href="{{url('admin/user/create')}}">Create New User</a>
</div>

<table class="table table-hover" id="book">
    <thead>
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Passwordd</th>
            <th>Role</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ds as $item )
            <tr>
                <td> {{$item->id}} </td>
                <td> {{$item->username}}</td>
                <td> {{$item->password}}</td>
                <td> {{$item->role?'Admin':"User"}}</td>
                <td> <img src="{{asset("images/$item->userimage")}}" alt="" class='pic-in-list' style="width:100px" > </td>
                <td><a href= "{{url("admin/user/review/{$item->id}")}}">View</a> |
                <a href="{{url("admin/user/edit/{$item->id}")}}">Edit</a> |
                <a href="{{url("admin/user/delete/{$item->id}")}}">Delete</a></td>
            </tr>
        @endforeach
    </tbody>

</table>


@endsection

@section('script-section')
<script>
    $(function () {
        $('#book').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

@endsection