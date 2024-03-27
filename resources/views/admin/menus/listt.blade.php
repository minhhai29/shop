@extends('admin.users.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <td style="width: 50px;">ID</td>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!!\App\Helpers\Helper::menu($menus)!!}
        </tbody>

    </table>
@endsection
