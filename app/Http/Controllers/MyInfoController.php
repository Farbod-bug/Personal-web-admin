<?php

namespace App\Http\Controllers;

use App\Models\MyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class MyInfoController extends Controller
{
    public function index()
    {
        $myinfo = MyInfo::firstOrFail();

        return view('myInfo.index', compact('myinfo'));
    }

    public function edit(MyInfo $myinfo)
    {
        return view('myInfo.edit', compact('myinfo'));
    }

    public function update(Request $request, MyInfo $myinfo)
    {
        $request->validate([
            'primary_image' => 'image',
            'name' => 'required|string',
            'email' => 'required|email',
            'cellphone' => ['required', 'regex:/^09[0|1|2|3][0-9]{8}$/'],
            'work_area' => 'required',
            'work_history' => 'required|integer',
            'Number_of_customers' => 'required|integer',
            'Number_of_projects' => 'nullable|integer',
            'about_title' => 'required|string',
            'about_title2' => 'required|string',
            'instagram_address' => 'required|string',
            'telegram_address' => 'required|string',
            'whatsapp_address' => 'required|string',
            'github_address' => 'required|string',
            'linkedin_address' => 'required|string',
            'discord_address' => 'required|string',
            'about_description' => 'required|string',
        ]);

        if ($request->has('primary_image') && $request->primary_image !== null) {
            Storage::delete('images/photos/' . $myinfo->primary_image);

            $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
            $request->primary_image->storeAs('images/photos/', $primaryImageName);
        }

        $myinfo->update([
            'primary_image' => $request->primary_image !== null ? $primaryImageName : $myinfo->primary_image,
            'name' => $request->name,
            'email' => $request->email,
            'cellphone' => $request->cellphone,
            'work_area' => $request->work_area,
            'work_history' => $request->work_history,
            'Number_of_customers' => $request->Number_of_customers,
            'Number_of_projects' => $request->Number_of_projects,
            'about_title' => $request->about_title,
            'about_title2' => $request->about_title2,
            'instagram_address' => $request->instagram_address,
            'telegram_address' => $request->telegram_address,
            'whatsapp_address' => $request->whatsapp_address,
            'github_address' => $request->github_address,
            'linkedin_address' => $request->linkedin_address,
            'discord_address' => $request->discord_address,
            'about_description' => $request->about_description,
        ]);

        return redirect()->route('myInfo.index')->with('success', 'اطلاعات با موفقیت ویرایش شد');
    }

    public function show(MyInfo $myinfo)
    {
        return view('myInfo.show', compact('myinfo'));
    }
}
