@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">مشخصات بازدید کننده ها</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>ISP</th>
                    <th>تاریخ بازدید</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($guests as $guest)
            <tbody>
                <tr>
                    <td>{{ $guest->ip }}</td>
                    <td>{{ $guest->isp }}</td>
                    <td>{{ getJalaliDate2($guest->visited_at) }}</td>
                    <td>
                        <div class="d-flex">
                            <form method="POST" action="{{ route('usersInfo.destroy', ['guest' => $guest->id]) }}">
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
        {{ $guests->links('layout.paginate') }}
    </div>

@endsection
