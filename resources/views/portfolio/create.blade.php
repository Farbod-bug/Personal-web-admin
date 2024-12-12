@extends('layout.master')

@section('title', 'Product Create')

@section('link')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
<script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
@endsection

@section('script')
<script type="text/javascript">
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', () => ({
            imageUrl: '',

            fileChosen(event) {
                if (event.target.files.length == 0) return;

                let file = event.target.files[0];
                let reader = new FileReader()

                reader.readAsDataURL(file)
                reader.onload = e => this.imageUrl = e.target.result
            }
        }))
    });

    jalaliDatepicker.startWatch();
</script>
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد محصول</h4>
    <a href="{{ route('portfolio.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('portfolio.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4">
    @csrf

    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4" x-data="imageViewer()">
                <label class="form-label">تصویر اصلی</label>

                <template x-if="imageUrl">
                    <img :src="imageUrl" class="rounded" width=350 height=220 alt="primary-image">
                </template>

                <input name="primary_image" @change="fileChosen" type="file" class="form-control mt-3" />
                <div class="form-text text-danger">@error('primary_image') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تصاویر محصول</label>
        <input name="images[]" type="file" multiple class="form-control" />
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ old('title') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تگ</label>
        <input name="tag" value="{{ old('tag') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('tag') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">مشتری</label>
        <input name="customer" value="{{ old('customer') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('customer') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">دسته بندی</label>
        <input name="category" value="{{ old('category') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('category') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس سایت</label>
        <input name="web_address" value="{{ old('web_address') }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('web_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تاریخ</label>
        <input data-jdp name="date" type="text" class="form-control" value="{{ old('date') }}"/>
        <div class="form-text text-danger">@error('date') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-9">
        <label class="form-label">توضیحات</label>
        <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        <div class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد نمونه کار
        </button>
    </div>
</form>
@endsection
