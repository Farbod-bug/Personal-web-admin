@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">مهارت های نرم افزاری من</h4>
        <a href="{{ route('skills.create') }}" class="btn btn-sm btn-outline-primary">ایجاد مهارت</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>پیشرفت</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            @foreach ($skills as $skill)
            <tbody>
                <tr>
                    <th>
                        <img class="rounded" src="{{ asset("images/photos/$skill->icon") }}" width="50" alt="">
                    </th>
                    <td>{{ $skill->title }}</td>
                    <td>{{ $skill->progress }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                            <form method="POST" action="{{ route('skills.destroy', ['skill' => $skill->id]) }}">
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
        {{ $skills->links('layout.paginate') }}
    </div>

@endsection
