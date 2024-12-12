@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش ادمین</h4>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')

    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ $user->name }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">ایمیل</label>
        <input name="email" value="{{ $user->email }}" type="email" class="form-control" />
        <div class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">سطح دسترسی</label>
        <select name="access_level" class="form-select">
            <option {{ $user->access_level == 0 ? "selected" : '' }} value="0">دسترسی محدود</option>
            <option {{ $user->access_level == 1 ? "selected" : '' }} value="1">دسترسی کامل</option>
        </select>
        <div class="form-text text-danger">@error('access_level') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
        </button>
        <a href="{{ route('users.editPss', ['user' => $user->id]) }}" class="btn btn-outline-secondary mt-3">
            ویرایش رمز عبور
        </a>
    </div>
</form>


@endsection
