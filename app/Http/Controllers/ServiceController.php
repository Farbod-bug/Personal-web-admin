<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(8);

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        Service::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('service.index')->with('success', 'سرویس با موفقیت ساخته شد');
    }

    public function edit(Service $Service)
    {
        return view('services.edit', compact('Service'));
    }

    public function update(Request $request, Service $Service)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $Service->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('service.index')->with('success', 'سرویس با موفقیت ویرایش شد');
    }

    public function show(Service $Service)
    {
        return view('services.show', compact('Service'));
    }

    public function destroy(Service $Service)
    {
        $Service->delete();

        return redirect()->route('service.index')->with('warning', 'سرویس با موفقیت حذف شد');
    }
}
