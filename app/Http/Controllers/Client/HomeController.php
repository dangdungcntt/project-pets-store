<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory; 
use App\Models\ProductCategory;
use App\Models\Product; 
use App\Models\Cart;  
use App\Models\Post;
use App\Models\Comment;
use App\Models\SiteConfig;
use Session;
   
class HomeController extends Controller 
{

    function __construct()
    {
        $this->dog          = new Dog();
    }
    public function index() 
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        // $dogs                = Dog::all();
        $blogs               = Post::all();
        $slider              = Post::where('type','post_top')->first();
        $about_us            = Post::where('type','about-us')->first();
        // dd($about_us);
        $sale_dogs           = Dog::where('sale','<>',0)->get();
        $new_dogs            = $this->dog->new_dog()->get();
        // dd($new_dogs);

    	return view('client.layouts.home',compact(
            'dogCategories','productCategories','dogs','blogs','slider','about_us',
            'site_phone','site_address','sale_dogs','new_dogs'
        ));
    }

    public function dog_category()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        // dd($site_phone);
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.dog-category.index', compact('dogCategories','productCategories','site_phone','site_address'))   ;
    }
    public function dog_home() 
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::all();
        $dogs_sale            = Dog::where('sale','<>',0)->get();
        // dd($dog_sale);
        return view('client.dog.dog_home',compact('dogCategories','productCategories','dogs','dogs_sale','site_phone','site_address'));
    }

    public function dog($idCate = null)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogs                = Dog::where('id_dog_cate',$idCate)->paginate(6);
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $cate                = DogCategory::where('id',$idCate)->first();
        // dd($cate);
        return view('client.dog.dog',compact('dogs','dog_id','dogCategories','product','productCategories','cate','site_phone','site_address'));
    }
    public function detail_dog($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::where('id',$id)->first();
        $dog_orther          = Dog::where('id_dog_cate',$dogs->id_dog_cate)->get();
        $comment_dog         = Comment::where('id_dog', '<>', '')->get();

        return view('client.dog.detail_dog',compact('dogCategories','dogs','productCategories','dog_orther','site_phone','site_address', 'comment_dog'));
    }
//product
    public function product_category()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::all();
        return view('client.product-category.index', compact('dogCategories','productCategories','products','site_phone','site_address'))   ;
    }
      public function product($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $products            = Product::where('id_product_cate',$id)->paginate(6);
        $dogCategories       = DogCategory::all();
        // $product             = Product::where('id_product_cate',$id)->get();
        $productCategories   = ProductCategory::all();
        $cate                = ProductCategory::where('id',$id)->first();
        return view('client.product.product',compact('dogs','products','dogCategories','productCategories','site_phone','site_address','cate'));
    }
    public function detail_product($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::where('id',$id)->first();
        $product_other       = Product::where('id_product_cate',$products->id_product_cate)->paginate(3);
        $comment_product     = Comment::where('id_product', '<>', '')->get();

        return view('client.product.detail_product',compact('dogCategories','products','productCategories','product_other','site_phone','site_address', 'comment_product'));
    }

    public function blog()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $blogs               = Post::paginate(3);
        
        
    	return view('client.blog.blog',compact('dogCategories','productCategories','blogs','site_phone','site_address'));
    }

    public function detail_blog($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();

        $blog                = Post::where('id',$id)->first();
        $blogs_other         = Post::where('id','<>',$id)->get();
        $comment_post        = Comment::where('id_post', '<>', '')->get();
        // dd($blogs_other);
    	return view('client.blog.detail_blog', compact('dogCategories','productCategories','blog','blogs_other','site_phone','site_address', 'comment_post'));
    }

     public function addtocart(Request $req,$id){
                    
        $dog_add             = Dog::find($id);          
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);                   
        $cart->add($dog_add, $id);
        //dd($cart);            
        $req->session()->put('cart',$cart);
        return redirect()->back();         
    } 

     public function addtoproduct(Request $req,$id){
                    
        $product_add         = Product::find($id);
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);                   
        $cart->add($product_add,$id);
        //dd($cart);            
        $req->session()->put('cart',$cart);
        return redirect()->back();         
    } 
    public function delitem($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function viewcart(){
        $product_add         = Product::all();
        $dog_add             = Dog::all();
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        if(!Session::has('cart')){
            return view('client.cart.viewcart',['dog_add'=>null,'product_add'=>null],compact('site_phone','site_address','dogCategories','productCategories'));

        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view ('client.cart.viewcart',['dog_add'=> $cart->items,'product_add'=> $cart->items,
            'totalPrice'=>$cart->totalPrice],compact('site_phone','site_address','dogCategories','productCategories'));

    }
    public function getcheckout(){
        if(Session::has('cart'))
        {
            $site_phone          = SiteConfig::where('label','site_phone')->get();
            $site_address        = SiteConfig::where('label','site_address')->get();
           
            $dogCategories       = DogCategory::all();
            $productCategories   = ProductCategory::all();

            return view('client.cart.checkout',compact('dogCategories','productCategories','site_address','site_phone'));
        }
        else{
            return redirect()->back()->with('error', 'Ban chua co san pham trong gio hang');
        }
        
    }

    public function search(Request $request)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();

        $value     = $request->input('search');
        $dogs      = Dog::join('dog_categories','dog_categories.id','=','dog.id_dog_cate')
                        ->where('name','like',"%$value%")
                        ->orWhere('price','$value')
                        ->orWhere('sale','$value')
                        ->orWhere('dog_categories.name','like',"%$value%")
                        ->orWhere('description','like',"%$value%")->get();
                        // dd($dogs);
        $products  = Product::where('name','like',"%$value%")
                        ->orWhere('price','$value')
                        ->orWhere('sale','$value')
                        ->orWhere('description','like',"%$value%")->get();
        $posts     = Post::where('title','like',"%$value%")
                        ->orWhere('summary','like',"%$value%")
                        ->orWhere('type','like',"%$value%")
                        ->orWhere('source','like',"%$value%")
                        ->orWhere('author','like',"%$value%")                      
                        ->orWhere('content','like',"%$value%")->get();
        return view('client.layouts.search',compact('site_address','site_phone','dogCategories','productCategories','value','dogs','products'));

    }
}
