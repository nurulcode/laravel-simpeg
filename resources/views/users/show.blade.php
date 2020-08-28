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
                                <td>: {{ $user->name }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>: {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Roles</th>
                                <td>:
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
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
