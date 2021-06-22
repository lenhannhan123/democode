@extends('admin-layout.layout')
@section('title','List Book')

@section('content')
<h2>List of Books</h2>
<hr>
<div>
    <a href="{{url('admin/book/create')}}">Create New Book</a>
</div>

<table class="table table-hover" id="book">
    <thead>
        <tr>
            <th>Book Id </th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ds as $item )
            <tr>
                <td> {{$item->bookid }} </td>
                <td> {{$item->bookname}}</td>
                <td> {{$item->author}}</td>
                <td> {{$item->price}}</td>
                <td> <img src="{{asset("images/$item->image")}}" alt="" class='pic-in-list' style="width:100px" > </td>
                <td><a href= "{{url("admin/book/review/{$item->bookid}")}}">View</a> |
                <a href="{{url("admin/book/edit/{$item->bookid}")}}">Edit</a> |
                <a href="{{url("admin/book/delete/{$item->bookid}")}}">Delete</a></td>
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