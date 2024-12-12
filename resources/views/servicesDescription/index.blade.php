@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">توضیحات سرویس ({{ $Service->title }})</h4>
        <a href="{{ route('service.description.create', ['Service' => $Service->id]) }}" class="btn btn-sm btn-outline-primary">ایجاد توضیحات</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($descriptions as $description)
            <tbody>
                <tr>
                    <td>{{ $description->description }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('service.description.edit', ['ServiceDescription' => $description->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <form method="POST" action="{{ route('service.description.destroy', ['ServiceDescription' => $description->id]) }}">
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


@endsection
