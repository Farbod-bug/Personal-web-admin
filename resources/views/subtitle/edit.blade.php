@extends('layout.master')

@section('title', 'Product Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش مهارت</h4>
    <a href="{{ route('subtitle.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form id="adminForm" action="{{ route('subtitle.update', ['SubTitle' => $SubTitle->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')

    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ $SubTitle->title }}" type="text" class="form-control" />
        <div id="titleError" class="form-text text-danger"></div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
        </button>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#adminForm').on('submit', function(e) {
            e.preventDefault();

            $('#titleError').text('');

            $.ajax({
                url: "{{ route('subtitle.update', ['SubTitle' => $SubTitle->id]) }}",
                method: "PUT",
                data: $(this).serialize(),
                headers: {
                    'Accept': 'application/json',
                },
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
                    if (errors.title) {
                        $('#titleError').text(errors.title[0]);
                    }
                }
            });
        });
    });
</script>

@endsection
