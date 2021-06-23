<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;

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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $port = Portfolio::find($id);
        if (!is_null($port)){
            $port->delete();
            toastr()->success('Portfolio deleted successfully ', 'Delete');
        }else{
            toastr()->warning('No data found with that name', 'Warning!');
        }
        return back();
    }
}
