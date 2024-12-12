@extends('layout.master')

@section('title', 'Product Show')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">نمایش نمونه کار</h4>
    <form method="POST" action="{{ route('portfolio.destroy', ['Portfolio' => $Portfolio->id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">حذف</button>
        <a href="{{ route('portfolio.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
    </form>
</div>

<div class="row gy-4 mb-4">

    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4"">
                <img src="{{ asset("images/photos/$Portfolio->primary_image") }}" class="rounded" width=350 height=220 alt="primary-image">
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان</label>
        <input value="{{ $Portfolio->title }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">تگ</label>
        <input value="{{ $Portfolio->tag }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">مشتری</label>
        <input name="customer" value="{{ $Portfolio->customer }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">دسته بندی</label>
        <input name="category" value="{{ $Portfolio->category }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس سایت</label>
        <input name="web_address" value="{{ $Portfolio->web_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">تاریخ</label>
        <input data-jdp name="date" type="text" class="form-control" value="{{ $Portfolio->date !== null ? getJalaliDate($Portfolio->date) : null }}" disabled/>
    </div>

    <div class="col-md-12">
        <label class="form-label">توضیحات</label>
        <textarea disabled class="form-control" rows="5">{{ $Portfolio->description }}</textarea>
    </div>

    <div class="col-md-12">
        @foreach ($Portfolio->images as $image)
        <img class="rounded" width="200" src="{{ asset("images/photos/$image->name") }}" alt="images">
        @endforeach
    </div>
</div>
@endsection
