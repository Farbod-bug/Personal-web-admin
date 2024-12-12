@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">مهارت های من</h4>
        <a href="{{ route('subtitle.create') }}" class="btn btn-sm btn-outline-primary">ایجاد مهارت</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($subTitles as $subTitle)
            <tbody>
                <tr>
                    <td>{{ $subTitle->title }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('subtitle.edit', ['SubTitle' => $subTitle->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <form method="POST" action="{{ route('subtitle.destroy', ['SubTitle' => $subTitle->id]) }}">
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
        {{ $subTitles->links('layout.paginate') }}
    </div>

@endsection
