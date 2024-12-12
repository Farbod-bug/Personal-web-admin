@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ادمین ها</h4>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">ایجاد ادمین</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <div>
        {{ $users->links('layout.paginate') }}
    </div>

@endsection
