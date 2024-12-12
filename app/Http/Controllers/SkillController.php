<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(7);

        return view('skills.index', compact('skills'));
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'icon' => 'image',
            'title' => 'required',
            'progress' => 'required'
        ]);

        if ($request->has('icon') && $request->icon !== null) {
            Storage::delete('images/photos/' . $skill->icon);

            $primaryImageName = Carbon::now()->microsecond . '-' . $request->icon->getClientOriginalName();
            $request->icon->storeAs('images/photos/', $primaryImageName);
        }

        $skill->update([
            'icon' => $request->icon !== null ? $primaryImageName : $skill->icon,
            'title' => $request->title,
            'progress' => $request->progress
        ]);

        return redirect()->route('skills.index')->with('success', 'مهارت با موفقیت ویرایش شد');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image',
            'title' => 'required',
            'progress' => 'required'
        ]);

            $primaryImageName = Carbon::now()->microsecond . '-' . $request->icon->getClientOriginalName();
            $request->icon->storeAs('images/photos/', $primaryImageName);

        $skill = Skill::create([
            'icon' => $request->icon ,
            'title' => $request->title,
            'progress' => $request->progress
        ]);

        return redirect()->route('skills.index')->with('success', 'مهارت با موفقیت ایجاد شد');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('warning', 'مهارت با موفقیت حذف شد');
    }
}
