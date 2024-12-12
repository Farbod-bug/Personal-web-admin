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
    <h4 class="fw-bold">ویرایش اطلاعات</h4>
    <a href="{{ route('myInfo.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
</div>

<form action="{{ route('myInfo.update', ['myinfo' => $myinfo->id]) }}" enctype="multipart/form-data" method="POST" class="row gy-4 mb-4">
    @csrf
    @method('PUT')
    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4" x-data="imageViewer('{{ asset("images/photos/$myinfo->primary_image") }}')">
                <label class="form-label me-2">تصویر اصلی</label>

                <template x-if="imageUrl">
                    <img :src="imageUrl" class="rounded" width=300 height=300 alt="primary-image">
                </template>

                <input name="primary_image" @change="fileChosen" type="file" class="form-control mt-3" />
                <div class="form-text text-danger">@error('primary_image') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ $myinfo->name }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">دسته بندی</label>
        <input name="email" value="{{ $myinfo->email }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">شماره تماس</label>
        <input name="cellphone" value="{{ $myinfo->cellphone }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('cellphone') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">حوزه کاری</label>
        <input name="work_area" value="{{ $myinfo->work_area }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('work_area') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان درباری من (1)</label>
        <input name="about_title" value="{{ $myinfo->about_title }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('about_title') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان درباری من (2)</label>
        <input name="about_title2" value="{{ $myinfo->about_title2 }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('about_title2') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس اینستاگرام</label>
        <input name="instagram_address" value="{{ $myinfo->instagram_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('instagram_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس تلگرام</label>
        <input name="telegram_address" value="{{ $myinfo->telegram_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('telegram_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس واتس آپ</label>
        <input name="whatsapp_address" value="{{ $myinfo->whatsapp_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('whatsapp_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس گیت هاب</label>
        <input name="github_address" value="{{ $myinfo->github_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('github_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس لینکدین</label>
        <input name="linkedin_address" value="{{ $myinfo->linkedin_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('linkedin_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس دیسکورد</label>
        <input name="discord_address" value="{{ $myinfo->discord_address }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('discord_address') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تجربه کاری (سال)</label>
        <input name="work_history" value="{{ $myinfo->work_history }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('work_history') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تعداد مشتری</label>
        <input name="Number_of_customers" value="{{ $myinfo->Number_of_customers }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('Number_of_customers') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-3">
        <label class="form-label">تعداد پروژه ها</label>
        <input name="Number_of_projects" value="{{ $myinfo->Number_of_projects }}" type="text" class="form-control" />
        <div class="form-text text-danger">@error('Number_of_projects') {{ $message }} @enderror</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">توضیحات درباره من</label>
        <textarea name="about_description"  class="form-control" />{{ $myinfo->about_description }}</textarea>
        <div class="form-text text-danger">@error('about_description') {{ $message }} @enderror</div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش
        </button>
    </div>
</form>


@endsection
