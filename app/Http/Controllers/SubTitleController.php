<?php

namespace App\Http\Controllers;

use App\Models\SubTitle;
use Illuminate\Http\Request;

class SubTitleController extends Controller
{
    public function index()
    {
        $subTitles = SubTitle::paginate(8);

        return view('subtitle.index', compact('subTitles'));
    }

    public function edit(SubTitle $SubTitle)
    {
        return view('subtitle.edit', compact('SubTitle'));
    }

    public function create()
    {
        return view('subtitle.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $subTitle = SubTitle::create([
            'title' => $request->title,
        ]);

        return redirect()->route('subtitle.index')->with('success', 'مهارت با موفقیت ایجاد شد');
    }

    public function update(Request $request, SubTitle $SubTitle)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $SubTitle->update([
            'title' => $request->title,
        ]);

        return redirect()->route('subtitle.index')->with('success', 'مهارت با موفقیت ویرایش شد');
    }

    public function destroy(SubTitle $SubTitle)
    {
        $SubTitle->delete();

        return redirect()->route('subtitle.index')->with('warning', 'مهارت با موفقیت حذف شد');
    }
}
