@extends('layout.master')

@section('title', 'Product Edit')

@section('link')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
<script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
@endsection

@section('script')
<script type="text/javascript">
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', (src = '') => ({
            imageUrl: src,

            fileChosen(event) {
                if (event.target.files.length == 0) return;

                let file = event.target.files[0];
                let reader = new FileReader()

                reader.readAsDataURL(file)
                reader.onload = e => this.imageUrl = e.target.result
            }
        }))
    });

    jalaliDatepicker.startWatch({time:true});
</script>
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش مهارت</h4>
    <a href="{{ route('skills.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('skills.update', ['skill' => $skill->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')
    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4" x-data="imageViewer('{{ asset("images/photos/$skill->icon") }}')">
                <label class="form-label me-2">تصویر</label>

                <template x-if="imageUrl">
                    <img :src="imageUrl" class="rounded" width=150 height=150 alt="primary-image">
                </template>

                <input name="icon" @change="fileChosen" type="file" class="form-control mt-3" />
                <div class="form-text text-danger">@error('icon') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ $skill->title }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">پیشرفت</label>
        <input name="progress" value="{{ $skill->progress }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('progress') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
        </button>
    </div>
</form>


@endsection
