@extends('admin.layout')
@section('content')
    <h2>List Post</h2>
    <table class="table table-flush" id="posts-list">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Title</th>
            <th>Category</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function () {
            let table = $('#posts-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('admin/posts/list') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'user', name: 'user'},
                    {data: 'title', name: 'title'},
                    {data: 'category', name: 'category'},
                    {data: 'content', name: 'content'},
                    {data: 'action', name: 'action'}
                ]
            });

            $('body').on('click', '#delete-category', function () {
                let category_id = $(this).data("id");
                let origin = window.location.origin;
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        processing: true,
                        serverSide: true,
                        type: "GET",
                        url: origin + "/admin/categories/" + category_id + "/delete",
                        success: function (data) {
                            let oTable = $('#category-list').dataTable();
                            oTable.fnDraw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>
@endsection
