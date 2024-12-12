@extends('layout.master')

@section('title', 'Product Show')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">نمایش اطلاعات من</h4>
        <a href="{{ route('myInfo.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
    </form>
</div>

<div class="row gy-4 mb-4">

    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4"">
                <img src="{{ asset("images/photos/$myinfo->primary_image") }}" class="rounded" width=300 height=300 alt="primary-image">
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ $myinfo->name }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">دسته بندی</label>
        <input name="email" value="{{ $myinfo->email }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">شماره تماس</label>
        <input name="cellphone" value="{{ $myinfo->cellphone }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">حوزه کاری</label>
        <input name="work_area" value="{{ $myinfo->work_area }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان درباری من (1)</label>
        <input name="about_title" value="{{ $myinfo->about_title }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">عنوان درباری من (2)</label>
        <input name="about_title2" value="{{ $myinfo->about_title2 }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس اینستاگرام</label>
        <input name="instagram_address" value="{{ $myinfo->instagram_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس تلگرام</label>
        <input name="telegram_address" value="{{ $myinfo->telegram_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس واتس آپ</label>
        <input name="whatsapp_address" value="{{ $myinfo->whatsapp_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس گیت هاب</label>
        <input name="github_address" value="{{ $myinfo->github_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس لینکدین</label>
        <input name="linkedin_address" value="{{ $myinfo->linkedin_address }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">آدرس دیسکورد</label>
        <input name="discord_address" value="{{ $myinfo->discord_address }}" type="text" class="form-control" />
    </div>

    <div class="col-md-3">
        <label class="form-label">تجربه کاری (سال)</label>
        <input name="work_history" value="{{ $myinfo->work_history }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">تعداد مشتری</label>
        <input name="Number_of_customers" value="{{ $myinfo->Number_of_customers }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-3">
        <label class="form-label">تعداد پروژه ها</label>
        <input name="Number_of_projects" value="{{ $myinfo->Number_of_projects }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-6">
        <label class="form-label">توضیحات درباره من</label>
        <textarea name="about_description"  class="form-control" disabled />{{ $myinfo->about_description }}</textarea>
    </div>

</div>
@endsection
