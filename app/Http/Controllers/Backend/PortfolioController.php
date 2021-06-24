<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{

    public function index()
    {
        return view('backend.pages.portfolio.index');
    }


    public function create()
    {
        //
    }


    public function store(StorePortfolioRequest $request)
    {
        $port = Portfolio::create($request->validated());
        $count = count($request->images);
        if ($count > 0){
            $i=0;
            foreach ($request->images as $image){
                $port_img = new PortfolioImage();
                $file =  time().$i.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('backend/portfolio/images'), $file);
                $port_img->portfolio_id = $port->id;
                $port_img->image = $file;
                $port_img->save();
                $i++;
            }
        }else {
            return back()->with('sticky_error', 'Image quantity should greater than one');
        }
        toastr()->success('Added Successfully', 'Success');
        return redirect()->route('admin.portfolio.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('backend.pages.portfolio.edit', compact('portfolio'));
    }


    public function update(StorePortfolioRequest $request, $id)
    {
        $port = Portfolio::find($id);
        $port->update($request->validated());
        if ($request->hasFile('images')){
            if (count($request->images) > 0) {
                $i = 0;
                foreach ($request->images as $image) {
                    $port_img = new PortfolioImage();
                    $file = time() . $i . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('backend/portfolio/images'), $file);
                    $port_img->portfolio_id = $port->id;
                    $port_img->image = $file;
                    $port_img->save();
                    $i++;
                }
            }else {
                return back()->with('sticky_error', 'Image quantity should greater than one');
            }
        }
        toastr()->success('Updated Successfully', 'Success');
        return redirect()->route('admin.portfolio.index');
    }

    public function destroy($id)
    {
        $port = Portfolio::find($id);
        $imageCount = PortfolioImage::where('portfolio_id', $port->id)->get();
        foreach ($imageCount as $deleteImg){
            if (File::exists('backend/portfolio/images/' .$deleteImg->image)){
                File::delete('backend/portfolio/images/' .$deleteImg->image);
            }
        }
        if (!is_null($port)){
            $port->portfolioImages()->delete();
            $port->delete();
            toastr()->success('Portfolio deleted successfully ', 'Delete');
        }else{
            toastr()->warning('No data found with that name', 'Warning!');
        }

        return back();
    }
}
