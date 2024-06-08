<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Report;
use App\Models\Review;
use App\Models\Message;
use App\Models\Product;
use App\Models\Category;
use App\Models\SlideShow;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    //
    public function index()
    {
        $bags = Product::where('status', 'Active')->where('category', 'Bags')->orderBy('id','desc')->limit(6)->orderBy('id','desc')->get();
        $watches = Product::where('status', 'Active')->where('category', 'Watches')->orderBy('id','desc')->limit(6)->orderBy('id','desc')->get();
        $jewellery = Product::where('status', 'Active')->where('category', 'Jewellery')->orderBy('id','desc')->limit(6)->orderBy('id','desc')->get();
        $latest = Product::where('status', 'Active')->orderBy('id','desc')->limit(6)->orderBy('id','desc')->get();
        $slideshows = SlideShow::where('placement', 'Other')->whereNotNull('status')->orderBy('id', 'desc')->get();
        $active = SlideShow::where('placement', 'First')->whereNotNull('status')->orderBy('id', 'desc')->first();
        return view('index', compact('bags', 'watches', 'jewellery', 'latest', 'slideshows', 'active'));
    }

    // featured products
    public function allProducts()
    {
        $products = Product::where('status', 'Active')->orderBy('id','desc')->get();
        $categories = Category::where('status', 'Active')->orderBy('id','desc')->get();
        $subcategories = SubCategory::where('status', 'Active')->orderBy('id','desc')->get();
        $brands = Brand::where('status', 'Active')->orderBy('id','desc')->get();
        return view('products', compact('products', 'categories', 'subcategories', 'brands'));
    }

    // latest products
    public function latest()
    {
        $latest = Product::where('status', 'Active')->limit(10)->orderBy('id','desc')->get();
        $categories = Category::where('status', 'Active')->orderBy('id','desc')->get();
        $subcategories = SubCategory::where('status', 'Active')->orderBy('id','desc')->get();
        $brands = Brand::where('status', 'Active')->orderBy('id','desc')->get();
        return view('latest', compact('latest', 'categories', 'subcategories', 'brands'));
    }

    // featured products
    public function featured()
    {
        $featured = Product::where('status', 'Active')->limit(10)->orderBy('id','desc')->get();
        $categories = Category::where('status', 'Active')->orderBy('id','desc')->get();
        $subcategories = SubCategory::where('status', 'Active')->orderBy('id','desc')->get();
        $brands = Brand::where('status', 'Active')->orderBy('id','desc')->get();
        return view('featured', compact('featured', 'categories', 'subcategories', 'brands'));
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
                    ->orWhere('body', 'like', "%$request->term%")->where('status', 'Active')
                    ->limit(100)->orderBy('id','desc')->get();

        $categories = Category::where('status', 'Active')->orderBy('id','desc')->get();
        $subcategories = SubCategory::where('status', 'Active')->orderBy('id','desc')->get();
        $brands = Brand::where('status', 'Active')->orderBy('id','desc')->get();
        return view('search', compact('term', 'products', 'categories', 'subcategories', 'brands'));
    }


    // category
    public function category(Request $request, $category)
    {
        $products = Product::where('status', 'Active')
                    ->where('title', 'like', "%$category%")
                    ->orWhere('category', 'like', "%$category%")
                    ->orWhere('subcategory', 'like', "%$category%")
                    ->orWhere('brand', 'like', "%$category%")
                    ->orWhere('body', 'like', "%$category%")
                    ->limit(100)->where('status', 'Active')->orderBy('id','desc')->get();

        $categories = Category::where('status', 'Active')->orderBy('id','desc')->get();
        $subcategories = SubCategory::where('status', 'Active')->orderBy('id','desc')->get();
        $brands = Brand::where('status', 'Active')->orderBy('id','desc')->get();
        return view('category', compact('category', 'products', 'categories', 'subcategories', 'brands'));
    }

    // productView
    public function productView(Request $request, Product $product)
    {
        $products = Product::where('status', 'Active')
                    ->where('category', 'like', "%$product->category%")
                    ->orWhere('subcategory', 'like', "%$product->subcategory%")
                    ->limit(4)->orderBy('id','desc')->get();

        return view('product', compact('product', 'products'));
    }

    // place order
    public function placeOrder(Request $request)
    {
        $credentials = $request->validate([
            'productID' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'deliveryType' => 'required',
            'quantity' => 'required',
            'description' => 'nullable',
            'subtotal' => 'required',
            'total' => 'required',
        ]);

        $credentials['status'] = 'Active';
        $credentials['userID'] = Auth::check() ? auth()->user()->id : 0;
        $credentials['paymentStatus'] = 'Unpaid';
        $credentials['orderCode'] = $this->generateOrderCode();
        // create order
        $order = Order::create($credentials);

        // // Redirect to the order complete
        return redirect()->route('orderComplete', [$order->id])->with('message', 'Your successfully place order.');
    }

    public function orderComplete(Request $request, Order $order)
    {
        $orderCode = $order->orderCode;
        return view('order-complete', compact('orderCode'));
    }

    // add review
    public function reviewStore(Request $request)
    {
        $credentials = $request->validate([
            'productID' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'review' => 'required',
        ]);

        $credentials['status'] = 'Active';
        $credentials['userID'] = Auth::check() ? auth()->user()->id : 0;
        // create review
        $review = Review::create($credentials);

        // // Redirect to the order complete
        return redirect()->route('product.view', [$request->productID])->with('message', 'Your successfully add a review.');
    }

    // add review
    public function reportStore(Request $request)
    {
        $credentials = $request->validate([
            'productID' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'body' => 'required',
        ]);

        $credentials['status'] = 'Active';
        $credentials['userID'] = Auth::check() ? auth()->user()->id : 0;
        // create report
        $report = Report::create($credentials);

        // // Redirect to the order complete
        return redirect()->route('product.view', [$request->productID])->with('message', 'Your successfully add a report.');
    }

    // add message
    public function messageStore(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'body' => 'required',
            'contact' => 'required',
        ]);

        $credentials['status'] = 'Active';
        $credentials['userID'] = Auth::check() ? auth()->user()->id : 0;
        // create message
        $message = Message::create($credentials);

        // // Redirect to the order complete
        return redirect()->route('contact')->with('message', 'Your successfully send a message.');
    }

    public function accountDeletion()
    {
        return view('account-deletion');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
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
