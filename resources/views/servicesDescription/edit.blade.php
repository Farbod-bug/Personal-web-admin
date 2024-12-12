@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش توضیحات</h4>
    <a href="{{ route('service.description.index', ['Service' => $ServiceDescription->service_id]) }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('service.description.update', ['ServiceDescription' => $ServiceDescription->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')

    <div class="col-md-6">
        <label class="form-label">توضیحات</label>
        <input name="description" value="{{ $ServiceDescription->description }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
        </button>
    </div>
</form>


@endsection
