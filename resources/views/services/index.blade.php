@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">سرویس های من</h4>
        <a href="{{ route('service.create') }}" class="btn btn-sm btn-outline-primary">ایجاد سرویس</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($services as $service)
            <tbody>
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ number_format(intval($service->price)) }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('service.description.index', ['Service' => $service->id]) }}" class="btn btn-sm btn-outline-info me-2">توضیحات</a>
                            <a href="{{ route('service.edit', ['Service' => $service->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <a href="{{ route('service.show', ['Service' => $service->id]) }}" class="btn btn-sm btn-outline-primary me-2">نمایش</a>
                            <form method="POST" action="{{ route('service.destroy', ['Service' => $service->id]) }}">
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
        {{ $services->links('layout.paginate') }}
    </div>

@endsection
