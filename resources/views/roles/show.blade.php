@extends("layouts.global")

@section("title") Detail @endsection
@section("page-title") Detail User @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-striped mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>: {{ $role->name }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Roles</th>
                                <td>:
                                    @if( !empty($rolePermissions) )
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->name }},</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
