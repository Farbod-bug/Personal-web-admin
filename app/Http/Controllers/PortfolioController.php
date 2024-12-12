<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(4);

        return view('portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function show(Portfolio $Portfolio)
    {
        return view('portfolio.show', compact('Portfolio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'primary_image' => 'required|image',
            'title' => 'required|string',
            'tag' => 'required|string',
            'description' => 'required',
            'customer' => 'nullable|string',
            'category' => 'required|string',
            'web_address' => 'nullable|string',
            'date' => 'required|date_format:Y/m/d',
            'images.*' => 'nullable|image',
        ]);

        $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
        $request->primary_image->storeAs('images/photos/', $primaryImageName);

        if ($request->has('images') && $request->images !== null) {
            $fileNameImages = [];
            foreach($request->images as $image) {
                $fileNameImage = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                $image->storeAs('images/photos/', $fileNameImage);

                array_push($fileNameImages, $fileNameImage);
            }
        }

        $portfolio = Portfolio::create([
            'primary_image' => $primaryImageName,
            'title' => $request->title,
            'tag' => $request->tag,
            'customer' => $request->customer !== null ? $request->customer : null,
            'category' => $request->category,
            'web_address' => $request->web_address !== null ? $request->web_address : null,
            'date' => getMiladiDate($request->date),
            'description' => $request->description,
        ]);

        if ($request->has('images') && $request->images !== null) {
            foreach($fileNameImages as $fileNameImage) {
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'name' => $fileNameImage
                ]);
            }
        }

        return redirect()->route('portfolio.index')->with('success', 'نمونه کار با موفقیت ایجاد شد');
    }

    public function edit(Portfolio $Portfolio)
    {
        return view('portfolio.edit', compact('Portfolio'));
    }

    public function update(Request $request, Portfolio $Portfolio)
    {
        $request->validate([
            'primary_image' => 'nullable|image',
            'title' => 'required|string',
            'tag' => 'required|string',
            'customer' => 'nullable|string',
            'category' => 'required|string',
            'web_address' => 'nullable|string',
            'date' => 'required|date_format:Y/m/d',
            'description' => 'required',
            'images.*' => 'nullable|image',
        ]);

        if ($request->has('primary_image') && $request->primary_image !== null) {
            Storage::delete('images/photos/' . $Portfolio->primary_image);

            $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
            $request->primary_image->storeAs('images/photos/', $primaryImageName);
        }

        if ($request->has('images') && $request->images !== null) {
            $fileNameImages = [];
            foreach($request->images as $image) {
                $fileNameImage = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                $image->storeAs('images/photos/', $fileNameImage);

                array_push($fileNameImages, $fileNameImage);
            }
        }

        $Portfolio->update([
            'primary_image' => $request->primary_image !== null ? $primaryImageName : $Portfolio->primary_image,
            'title' => $request->title,
            'tag' => $request->tag,
            'customer' => $request->customer !== null ? $request->customer : null,
            'category' => $request->category,
            'web_address' => $request->web_address !== null ? $request->web_address : null,
            'date' => getMiladiDate($request->date),
            'description' => $request->description,
        ]);

        if ($request->has('images') && $request->images !== null) {
            foreach($fileNameImages as $fileNameImage) {
                PortfolioImage::create([
                    'portfolio_id' => $Portfolio->id,
                    'name' => $fileNameImage
                ]);
            }
        }

        return redirect()->route('portfolio.index')->with('success', 'نمونه کار با موفقیت ویرایش شد');
    }

    public function deleteImage(PortfolioImage $image)
    {
        Storage::delete('images/photos/' . $image->name);
        $image->delete();
        return redirect()->back()->with('warning', 'تصویر با موفقیت حذف شد');
    }

    public function destroy(Portfolio $Portfolio)
    {
        $images = $Portfolio->images;

        foreach ($images as $image) {
            Storage::delete('images/photos/' . $image->name);
            $image->delete();
        }

        Storage::delete('images/photos/' . $Portfolio->primary_image);
        $Portfolio->delete();

        return redirect()->route('portfolio.index')->with('warning', 'نمونه کار با موفقیت حذف شد');
    }
}
