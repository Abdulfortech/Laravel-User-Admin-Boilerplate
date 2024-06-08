<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Business;
use App\Models\Category;
use App\Models\SlideShow;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
    //
    public function index()
    {
        return view('admin.components.index');
    }

    public function slideshows()
    {
        $slideshows = SlideShow::whereNotNull('status')->orderBy('id', 'desc')->get();
        // dd($slideshows);
        return view('admin.components.slideshow', compact('slideshows'));
    }

    public function addSlideshow(Request $request)
    {
        $credentials = $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'placement' => 'required',
        ]);

        $credentials['adminID'] = auth()->user()->id;
        $credentials['status'] = 'Active';
        // Store the uploaded files
        $imagePath = $request->file('picture')->store('slideshows', 'public');
        $credentials['picture'] = $imagePath;
        $credentials['placement'] = $request->placement;

        $SlideShow = SlideShow::create($credentials);

        return redirect()->route('admin.slideshows')->with('message', 'SlideShow has been added');
    }

    public function updateSlideshow(Request $request, SlideShow $slideshow)
    {
        $credentials = $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'placement' => 'required',
        ]);


        $imagePath = $request->file('picture')->store('slideshows', 'public');

        $slideshow->update([
            'picture' => $imagePath,
            'placement' => $request->placement
        ]);

        return redirect()->route('admin.slideshowView', [$slideshow->id])->with('message', 'SlideShow has been added');
    }

    public function slideshowView(Request $request, SlideShow $slideshow)
    {
        return view('admin.components.slideshowView', ["slideshow"=> $slideshow]);
    }

    public function slideshowDelete(Request $request, SlideShow $slideshow)
    {
        $slideshow->update([
            'status' => null
        ]);
        return redirect()->route('admin.slideshows')->with('message', 'SlideShow has been deleted');
    }

    // search products
    public function search(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'term' => 'required',
        ]);
        // search term
        $term = $request->term;
        // products
        $products = Product::where('status', 'Active')
                    ->where('title', 'like', "%$request->term%")
                    ->orWhere('category', 'like', "%$request->term%")
                    ->orWhere('subcategory', 'like', "%$request->term%")
                    ->orWhere('brand', 'like', "%$request->term%")
                    ->orWhere('body', 'like', "%$request->term%")
                    ->limit(100)->orderBy('id','desc')->get();

        return view('admin.components.search', compact('term', 'products'));
    }

    public function companyProfile()
    {
        return view('admin.components.company');
    }

    public function companyMedia()
    {
        return view('admin.components.media');
    }

    public function updateCompany(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required'],
            'industry' => ['required'],
            'motto' => ['required'],
            'abbr' => 'required',
            'reg_no' => 'required',
            'tax_no' => 'required',
            'phone1' => 'required|min:11|max:15',
            'phone2' => 'required|min:11|max:15',
            'website' => 'required',
            'email' => 'required',
            'address' => 'required',
            'state' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_bank' => 'required',
        ]);

        if(isset(auth()->user()->businessID))
        {
            $business = Business::find(auth()->user()->businessID)->update($credentials);
            return redirect()->route('admin.company')->with('message', 'Company profile has been updated');
        }
        else
        {
            $credentials['adminID'] = auth()->user()->id;
            $credentials['status'] = 'Active';

            $business = Business::create($credentials);
            $admin = Admin::where('id',auth()->user()->id)->update(['businessID' => $business->id]);
            return redirect()->route('admin.company')->with('message', 'Company profile has been created');
        }

    }

    public function updateLogo(Request $request)
    {
        // validation
        $credentials = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Store the uploaded files
        $imagePath = $request->file('image')->store('business', 'public');
        // update the records
        $business = Business::find(auth()->user()->businessID)->update([
            "logo" => $imagePath,
        ]);
        // route
        return redirect()->route('admin.companyMedia')->with('message', 'Company logo has been updated');

    }

    public function updateBanner(Request $request)
    {
        // validation
        $credentials = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Store the uploaded files
        $imagePath = $request->file('image')->store('business', 'public');
        // update the records
        $business = Business::find(auth()->user()->businessID)->update([
            "banner" => $imagePath,
        ]);
        // route
        return redirect()->route('admin.companyMedia')->with('message', 'Company banner has been updated');

    }

    // categories
    public function categories()
    {
        $categories = Category::whereNotNull('status')->get();
        return view('admin.components.category ', ['categories' => $categories]);
    }

    public function addCategory(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required'],
        ]);

        $credentials['adminID'] = auth()->user()->id;
        $credentials['status'] = 'Active';

        $category = Category::create($credentials);

        return redirect()->route('admin.categories')->with('message', 'Category has been added');
    }

    public function categoryDelete(Request $request, Category $category)
    {
        $category->update([
            'status' => null
        ]);
        return redirect()->route('admin.categories')->with('message', 'Category has been deleted');
    }

    //  subcategory
    public function subcategories()
    {
        $subcategories = SubCategory::whereNotNull('status')->get();
        return view('admin.components.subcategory ', ['subcategories' => $subcategories]);
    }

    public function addSubcategory(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required'],
        ]);

        $credentials['adminID'] = auth()->user()->id;
        $credentials['status'] = 'Active';

        $category = SubCategory::create($credentials);

        return redirect()->route('admin.subcategories')->with('message', 'Subcategory has been added');
    }

    public function subcategoryDelete(Request $request, SubCategory $subcategory)
    {
        $subcategory->update([
            'status' => null
        ]);
        return redirect()->route('admin.subcategories')->with('message', 'Subcategory has been deleted');
    }

    // brands
    public function brands()
    {
        $brands = Brand::whereNotNull('status')->get();
        return view('admin.components.brand ', ['brands' => $brands]);
    }

    public function addBrand(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required'],
        ]);

        $credentials['adminID'] = auth()->user()->id;
        $credentials['status'] = 'Active';

        $brand = Brand::create($credentials);

        return redirect()->route('admin.brands')->with('message', 'Brand has been added');
    }

    public function brandDelete(Request $request, Brand $brand)
    {
        $brand->update([
            'status' => null
        ]);
        return redirect()->route('admin.brands')->with('message', 'Brand has been deleted');
    }

}
