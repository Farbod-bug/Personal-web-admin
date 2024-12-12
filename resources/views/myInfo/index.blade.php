@extends('layout.master')

@section('title', 'Product')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">اطلاعات من</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>شماره تماس</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <img class="rounded" src="{{ asset("images/photos/$myinfo->primary_image") }}" width="100" alt="">
                    </th>
                    <td>{{ $myinfo->name }}</td>
                    <td>{{ $myinfo->email }}</td>
                    <td>{{ $myinfo->cellphone }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('myInfo.show', ['myinfo' => $myinfo->id]) }}" class="btn btn-sm btn-outline-primary me-2">نمایش</a>
                            <a href="{{ route('myInfo.edit', ['myinfo' => $myinfo->id]) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
