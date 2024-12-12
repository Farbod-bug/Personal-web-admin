@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد ادمین</h4>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form id="adminForm" action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
        <div id="nameError" class="form-text text-danger"></div>
    </div>
    <div class="col-md-3">
        <label class="form-label">ایمیل</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" />
        <div id="emailError" class="form-text text-danger"></div>
    </div>
    <div class="col-md-3">
        <label class="form-label">پسورد</label>
        <div class="input-group">
            <input name="password" id="password" value="{{ old('password') }}" type="password" class="form-control" />
            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password')">
                👁️
            </button>
        </div>
        <div id="passwordError" class="form-text text-danger"></div>
    </div>
    <div class="col-md-3">
        <label class="form-label">سطح دسترسی</label>
        <select name="access_level" class="form-select">
            <option value="0">دسترسی محدود</option>
            <option value="1">دسترسی کامل</option>
        </select>
        <div id="access_levelError" class="form-text text-danger"></div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#adminForm').on('submit', function(e) {
            e.preventDefault();

            $('#nameError').text('');
            $('#emailError').text('');
            $('#passwordError').text('');
            $('#access_levelError').text('');

            $.ajax({
                url: "{{ route('users.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت',
                        text: response.success,
                        confirmButtonText: 'باشه',
                    }).then(() => {

                        window.location.href = response.redirect;
                    });
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        $('#nameError').text(errors.name[0]);
                    }
                    if (errors.email) {
                        $('#emailError').text(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#passwordError').text(errors.password[0]);
                    }
                    if (errors.access_level) {
                        $('#access_levelError').text(errors.access_level[0]);
                    }
                }
            });
        });
    });
</script>


@endsection
