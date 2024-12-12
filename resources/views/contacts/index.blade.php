@extends('layout.master')

@section('title', 'Product')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">پیام های ارتباط با ما</h4>
    </div>
@if ($contacts->isNotEmpty())
    <a href="{{ route('contact.checkeds') }}" class="btn btn-sm btn-outline-info me-2">بررسی شده ها</a>
    <a href="{{ route('contact.uncheckeds') }}" class="btn btn-sm btn-outline-secondary me-2">بررسی نشده ها</a>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>عنوان پیام</th>
                    <th>شماره تماس</th>
                    <th>تاریخ</th>
                    <th>وضعیت بررسی</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->cellphone }}</td>
                        <td>{{ getJalaliDate($contact->created_at) }}</td>
                        <td>
                            {{ $contact->status == 0 ? 'بررسی نشده' : 'بررسی شده' }}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('contact.show', ['contact' => $contact->id]) }}" class="btn btn-sm btn-outline-info me-2">نمایش</a>
                                <form method="POST" action="{{ route('contact.destroy', ['contact' => $contact->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $contacts->links('layout.paginate') }}
    </div>
@else
    <div class="text-center mt-5">
        <h5>پیامی یافت نشد</h5>
    </div>
@endif

@endsection
