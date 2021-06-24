<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioImage;
use Illuminate\Support\Facades\File;

class PortfolioImageController extends Controller
{
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $port_image = PortfolioImage::find($id);
        if (!is_null($port_image)){
            if (File::exists('backend/portfolio/images/' .$port_image->image)){
                File::delete('backend/portfolio/images/' .$port_image->image);
            }
            $port_image->delete();
            toastr()->success('Image deleted successfully ', 'Delete');
        }else{
            toastr()->warning('No data found with that name', 'Warning!');
        }
        return back();
    }
}
