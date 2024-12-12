@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد مهارت</h4>
    <a href="{{ route('subtitle.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('subtitle.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد
        </button>
    </div>
</form>


@endsection
