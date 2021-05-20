@extends('admin.layout')
@section('content')
    <h2>List Categories</h2>
    <table class="table table-flush" id="category-list">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Total Post</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function () {
            let category_id = $(this).data("id");
            let origin = window.location.origin;
            let table = $('#category-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('admin/categories/list') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'total post', name: 'total post'},
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
