<?php

namespace App\Http\Controllers;

use App\Models\SubTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        SubTitle::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'success' => 'مهارت با موفقیت ایجاد شد.',
            'redirect' => route('subtitle.index'),
        ]);
    }

    public function update(Request $request, SubTitle $SubTitle)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $SubTitle->update([
            'title' => $request->title,
        ]);

        return response()->json([
            'success' => 'مهارت با موفقیت ویرایش شد.',
            'redirect' => route('subtitle.index'),
        ]);
    }

    public function destroy(SubTitle $SubTitle)
    {
        $SubTitle->delete();

        return redirect()->route('subtitle.index')->with('warning', 'مهارت با موفقیت حذف شد');
    }
}
