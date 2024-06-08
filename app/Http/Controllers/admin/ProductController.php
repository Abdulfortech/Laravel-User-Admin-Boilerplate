<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
    }

    //
    public function index()
    {
        $allProducts = Product::whereNotNull('status')->count();
        $activeProducts = Product::where('status', 'active')->count();
        $inactiveProducts = Product::where('status', 'inactive')->count();
        $deletedProducts = Product::where('status', 'deleted')->count();
        $products = Product::whereNotNull('status')->orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products', 'activeProducts', 'inactiveProducts', 'allProducts', 'deletedProducts'));
    }

    public function add()
    {
        $categories = Category::whereNotNull('status')->get();
        $subcategories = SubCategory::whereNotNull('status')->get();
        $brands = Brand::whereNotNull('status')->get();
        $code = $this->generateOrderCode();
        return view('admin.products.add', compact('code', 'categories', 'subcategories', 'brands'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'productCode' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'normal_price' => 'required',
            'price' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_desc' => 'required|string',
            // 'long_desc' => 'required|string',
        ]);
        $status = 'Active';
        // Store the uploade cover image
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('products', 'public');
            $path = storage_path('app/public/' . $image1Path);
            // Crop the image to a specific size (e.g., 500x500)
            $result = $this->cloudinary->uploadApi()->upload($path, [
                'transformation' => [
                    'width' => 500,
                    'height' => 500,
                    'crop' => 'fill',
                    'gravity' => 'auto'
                ]
            ]);
            $picture1 = $path;
            $image1 = $result['secure_url'];
        }else
        {
            $picture1 = null;
            $image1 = null;
        }
        // upload other images
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('products', 'public');
            $path = storage_path('app/public/' . $image2Path);
            // Crop the image to a specific size (e.g., 500x500)
            $result = $this->cloudinary->uploadApi()->upload($path, [
                'transformation' => [
                    'width' => 500,
                    'height' => 500,
                    'crop' => 'fill',
                    'gravity' => 'auto'
                ]
            ]);
            $picture2 = $path;
            $image2 = $result['secure_url'];
        }else{
            $picture2 = null;
            $image2 = null;
        }

        if ($request->hasFile('image3')) {
            $image3Path = $request->file('image3')->store('products', 'public');
            $path = storage_path('app/public/' . $image3Path);
            // Crop the image to a specific size (e.g., 500x500)
            $result = $this->cloudinary->uploadApi()->upload($path, [
                'transformation' => [
                    'width' => 500,
                    'height' => 500,
                    'crop' => 'fill',
                    'gravity' => 'auto'
                ]
            ]);
            $picture3 = $path;
            $image3 = $result['secure_url'];
        }else{
            $picture3 = null;
            $image3 = null;
        }


        // Create a new record in the database
        $product = Product::create([
            'adminID' => auth()->user()->id,
            'title' => $data['title'],
            'productCode' => $data['productCode'],
            'category' => $data['category'],
            'brand' => $data['brand'],
            'subcategory' => $data['subcategory'],
            'body' => $data['body'],
            'normal_price' => $data['normal_price'],
            'price' => $data['price'],
            'main_picture' => $image1Path,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'short_desc' => $data['short_desc'],
            // 'long_desc' => $data['long_desc'],
            'status' => $status,
        ]);


        // Optionally, you can return a response or redirect to another route
        return redirect()->route('admin.products')->with('success', 'product has been created successfully');

    }

    public function view(Request $request, Product $product)
    {
            // $messageCount = $product->messages()->count();
            // $productCount = $product->products()->count();
            $reviewCount = $product->reviews()->count();
            $orderCount = $product->orders()->count();
            return view('admin.products.view', compact('product', 'reviewCount', 'orderCount'));
    }

    public function edit(Request $request, Product $product)
    {
        $categories = Category::whereNotNull('status')->get();
        $subcategories = SubCategory::whereNotNull('status')->get();
        $brands = Brand::whereNotNull('status')->get();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'productCode' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'normal_price' => 'required',
            'price' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_desc' => 'required|string',
        ]);

                // Store the uploade cover image
                if ($request->hasFile('image1')) {
                    $image1Path = $request->file('image1')->store('products', 'public');
                    $path = storage_path('app/public/' . $image1Path);
                    // Crop the image to a specific size (e.g., 500x500)
                    $result = $this->cloudinary->uploadApi()->upload($path, [
                        'transformation' => [
                            'width' => 500,
                            'height' => 500,
                            'crop' => 'fill',
                            'gravity' => 'auto'
                        ]
                    ]);
                    $picture1 = $path;
                    $image1 = $result['secure_url'];
                }else{
                    $picture1 = $product->main_picture;
                    $image1 = $product->image1;
                }
                // upload other images
                if ($request->hasFile('image2')) {
                    $image2Path = $request->file('image2')->store('products', 'public');
                    $path = storage_path('app/public/' . $image2Path);
                    // Crop the image to a specific size (e.g., 500x500)
                    $result = $this->cloudinary->uploadApi()->upload($path, [
                        'transformation' => [
                            'width' => 500,
                            'height' => 500,
                            'crop' => 'fill',
                            'gravity' => 'auto'
                        ]
                    ]);
                    $picture2 = $path;
                    $image2 = $result['secure_url'];
                }else{
                    $image2 = $product->image2;
                }

                if ($request->hasFile('image3')) {
                    $image3Path = $request->file('image3')->store('products', 'public');
                    $path = storage_path('app/public/' . $image3Path);
                    // Crop the image to a specific size (e.g., 500x500)
                    $result = $this->cloudinary->uploadApi()->upload($path, [
                        'transformation' => [
                            'width' => 500,
                            'height' => 500,
                            'crop' => 'fill',
                            'gravity' => 'auto'
                        ]
                    ]);
                    $image3 = $result['secure_url'];
                }else{
                    $image3 = $product->image3;
                }

        // update the record
        $product->update([
            'title' => $data['title'],
            'category' => $data['category'],
            'brand' => $data['brand'],
            'subcategory' => $data['subcategory'],
            'body' => $data['body'],
            'normal_price' => $data['normal_price'],
            'price' => $data['price'],
            'main_picture' => $picture1,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'short_desc' => $data['short_desc'],
        ]);


        return redirect()->route('admin.products.view',[$product->id])->with('success', 'product has been updated successfully');

    }

    public function delete(Request $request, Product $product)
    {
        $product->update([
            "status"=> null
        ]);
        if($product)
        {
            return redirect()->route('admin.products')->with('message', 'You successfully delete the product');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function deactivate(Request $request, Product $product)
    {
        $product->update([
            "status"=> "Inactive"
        ]);

        if($product)
        {
            return redirect()->route('admin.products.view',[$product->id])->with('message', 'You successfully deactivate the product');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function activate(Request $request, Product $product)
    {
        $product->update([
            "status"=> "Active"
        ]);

        if($product)
        {
            return redirect()->route('admin.products.view',[$product->id])->with('message', 'You successfully activate the product');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function generateOrderCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeLength = 8;

        $orderCode = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $codeLength; $i++) {
            $orderCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $orderCode;
    }

}
