@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد توضیحات</h4>
    <a href="{{ route('service.description.index', ['Service' => $Service->id]) }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('service.description.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf

    <div class="col-md-6">
        <label class="form-label">توضیحات</label>
        <input name="description" value="{{ old('description') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-6">
        <input name="service_id" value="{{ $Service->id }}" type="text" class="form-control" hidden/>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد
        </button>
    </div>
</form>


@endsection
