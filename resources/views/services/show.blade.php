@extends('layout.master')

@section('title', 'Product Show')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">نمایش اطلاعات سرویس</h4>
        <a href="{{ route('service.index') }}" class="btn btn-sm btn-outline-primary">بازگشت</a>
    </form>
</div>

<div class="row gy-4 mb-4">

    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ $Service->title }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-6">
        <label class="form-label">قیمت</label>
        <input name="price" value="{{ number_format(intval($Service->price)) }}" type="text" class="form-control" disabled/>
    </div>

    <div class="col-md-6">
        <label class="form-label">توضیحات درباره سرویس</label>
        <textarea name="description"  class="form-control" disabled/>{{ $Service->description }}</textarea>
    </div>

</div>
@endsection
