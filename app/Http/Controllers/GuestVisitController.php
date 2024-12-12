<?php

namespace App\Http\Controllers;

use App\Models\GuestVisit;
use Illuminate\Http\Request;

class GuestVisitController extends Controller
{
    public function index()
    {
        $guests = GuestVisit::paginate(10);

        return view('usersInfo.index', compact('guests'));
    }

    public function destroy(GuestVisit $guest)
    {
        $guest->delete();

        return redirect()->route('usersInfo.index')->with('warning', 'مشخصات بازدید کننده با موفقیت حذف شد');
    }
}
