<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceDescription;
use Illuminate\Http\Request;

class ServiceDescriptionController extends Controller
{
    public function index(Service $Service)
    {
        $descriptions = $Service->descriptions;

        return view('servicesDescription.index', compact('descriptions', 'Service'));
    }

    public function create(Service $Service)
    {
        return view('servicesDescription.create', compact('Service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'service_id' => 'required|integer'
        ]);

        ServiceDescription::create([
            'description' => $request->description,
            'service_id' => $request->service_id
        ]);

        return redirect()->route('service.description.index', ['Service' => $request->service_id])->with('success', 'توضیح با موفقیت ایجاد شد');
    }

    public function edit(ServiceDescription $ServiceDescription)
    {
        return view('servicesDescription.edit', compact('ServiceDescription'));
    }

    public function update(Request $request, ServiceDescription $ServiceDescription)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $ServiceDescription->update([
            'description' => $request->description
        ]);

        return redirect()->route('service.description.index', ['Service' => $ServiceDescription->service_id])->with('success', 'توضیح با موفقیت ویرایش شد');
    }

    public function destroy(ServiceDescription $ServiceDescription)
    {
        $ServiceDescription->delete();

        return redirect()->route('service.description.index', ['Service' => $ServiceDescription->service_id])->with('warning', 'توضیح با موفقیت حذف شد');
    }
}
