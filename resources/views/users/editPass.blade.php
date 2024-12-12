@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش رمز عبور ادیمن ({{ $user->name }})</h4>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('users.updatePass', ['user' => $user->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')

    <div class="col-md-3">
        <label class="form-label">پسورد قبلی</label>
        <div class="input-group">
            <input name="oldPassword" id="oldPassword" value="{{ old('oldPassword') }}" type="password" class="form-control" />
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('oldPassword')">
                👁️
            </button>
        </div>
        <div class="form-text text-danger">@error('oldPassword') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">پسورد</label>
        <div class="input-group">
            <input name="newPassword" id="newPassword" value="{{ old('newPassword') }}" type="password" class="form-control" />
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('newPassword')">
                👁️
            </button>
        </div>
        <div class="form-text text-danger">@error('newPassword') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تکرار پسورد</label>
        <div class="input-group">
            <input name="comfirmedPass" id="comfirmedPass" type="password" class="form-control" />
        </div>
        <div class="form-text text-danger">@error('comfirmedPass') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
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
