@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">نمونه کار های من</h4>
        <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary">ایجاد نمونه کار</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>تگ</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            @foreach ($portfolios as $portfolio)
            <tbody>
                <tr>
                    <th>
                        <img class="rounded" src="{{ asset("images/photos/$portfolio->primary_image") }}" width="100" alt="">
                    </th>
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ $portfolio->tag }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('portfolio.show', ['Portfolio' => $portfolio->id]) }}" class="btn btn-sm btn-outline-primary me-2">نمایش</a>
                            <a href="{{ route('portfolio.edit', ['Portfolio' => $portfolio->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <form method="POST" action="{{ route('portfolio.destroy', ['Portfolio' => $portfolio->id]) }}">
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
        {{ $portfolios->links('layout.paginate') }}
    </div>

@endsection
