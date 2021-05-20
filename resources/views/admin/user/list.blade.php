@extends('admin.layout')
@section('content')
    <h2>List Users</h2>
    <table class="table table-flush" id="user-list">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Avatar</th>
            @can('admin')
                <th>Action</th>
            @endcan
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function () {
            let user_id = $(this).data("id");
            let origin = window.location.origin;
            let table = $('#user-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('admin/users/list') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'avatar', name: 'avatar',},
                        @can('admin')
                    {
                        data: 'action', name: 'action'
                    }
                    @endcan
                ]
            });

            $('body').on('click', '#delete-user', function () {
                let user_id = $(this).data("id");
                let origin = window.location.origin;
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        processing: true,
                        serverSide: true,
                        type: "GET",
                        url: origin + "/admin/users/" + user_id + "/delete",
                        success: function (data) {
                            let oTable = $('#user-list').dataTable();
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
