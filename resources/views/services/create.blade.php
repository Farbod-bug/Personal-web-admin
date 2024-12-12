@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد سرویس</h4>
    <a href="{{ route('service.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('service.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf

    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">قیمت</label>
        <input name="price" value="{{ old('price') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('price') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">توضیحات درباره سرویس</label>
        <textarea name="description"  class="form-control" />{{ old('description') }}</textarea>
        <div class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد
        </button>
    </div>
</form>


@endsection
