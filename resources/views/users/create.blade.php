@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد ادمین</h4>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
    </div>
    <div class="col-md-3">
        <label class="form-label">ایمیل</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" />
        <div class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
    </div>
    <div class="col-md-3">
        <label class="form-label">پسورد</label>
        <div class="input-group">
            <input name="password" id="password" value="{{ old('password') }}" type="password" class="form-control" />
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password')">
                👁️
            </button>
        </div>
        <div class="form-text text-danger">@error('newPassword') {{ $message }} @enderror</div>
    </div>
    <div class="col-md-3">
        <label class="form-label">سطح دسترسی</label>
        <select name="access_level" class="form-select">
            <option value="0">دسترسی محدود</option>
            <option value="1">دسترسی کامل</option>
        </select>
        <div class="form-text text-danger">@error('access_level') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد
        </button>
    </div>
</form>

<script>
    function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const button = input.nextElementSibling;
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
    button.textContent = type === 'password' ? '👁️' : '👁‍🗨';
}

</script>


@endsection
