@extends('layout.master')

@section('title', 'Product')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">نمایش پیام کاربر</h4>
    <a href="{{ route('contact.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('contact.destroy', ['contact' => $contact->id]) }}" method="POST" class="row gy-4">
    @csrf
    @method('DELETE')
    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="title" value="{{ $contact->name }}" type="text" class="form-control" disabled />
    </div>
    <div class="col-md-3">
        <label class="form-label">موضوع</label>
        <input name="link_address" value="{{ $contact->title }}" type="text" class="form-control" disabled />
    </div>
    <div class="col-md-3">
        <label class="form-label">ایمیل</label>
        <input name="link_title" value="{{ $contact->email }}" type="text" class="form-control" disabled />
    </div>
    <div class="col-md-3">
        <label class="form-label">شماره تماس</label>
        <input name="link_title" value="{{ $contact->cellphone }}" type="text" class="form-control" disabled />
    </div>
    <div class="col-md-12">
        <label class="form-label">متن</label>
        <textarea disabled name="body" class="form-control" rows="5">{{ $contact->body }}</textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-danger mt-3">
            حذف
        </button>
        <a href="{{ route('contact.check', ['contact' => $contact->id]) }}" class="btn btn-outline-secondary mt-3">
            بررسی شد
        </a>
        <p class="mt-4 text-muted">
            زمان ایجاد: {{ verta($contact->created_at)->format('H:i') }} - {{ verta($contact->created_at)->format('Y/m/d') }}
        </p>
    </div>
</form>

@endsection
