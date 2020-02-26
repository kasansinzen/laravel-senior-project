<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use App\Models\ShopModel;
use App\Cart;
use App\Models\CartModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\CustomerModel;
use App\Models\DealerModel;
use App\Models\DiscountModel;
use App\Models\PaymentModel;
use Session;
use Socialize;

class ShopController extends Controller
{

    public function selectProductType($userID, $producttypeID)
    {
        $products = ProductModel::where('producttype_id', $producttypeID)->where('user_id', $userID)->paginate(9);
        //dd($products);
        //return json_encode($products);

        /*return view('shop.selected-producttype-shop')
            ->with('products', $products)
            ->render();*/

        return Respone()->json($products);
    }

    public function searchProduct(Request $request, $userID)
    {
        $products = ProductModel::where('user_id', $userID)
            ->where('product_name', 'LIKE', '%'.$request['search_product'].'%')->get();

        return view('shop.searched-home')
            ->with('products', $products);
    }

    public function getIndexShop(Request $request) 
    {

       /* $products = ProductModel::paginate(9);
        $producttypes = ProductTypeModel::get();

        return view('shop.index-shop')
            ->with('products', $products)
            ->with('producttypes', $producttypes);*/

        if($userID){
            $request->session()->put('user', $userID);
            $products = ProductModel::where('user_id', $userID)->paginate(9);
            $producttypes = ProductTypeModel::where('user_id', $userID)->get();
            
            return view('shop.index-shop')
            ->with('products', $products)
            ->with('producttypes', $producttypes);
        }
    }

    public function paymenting($userID) 
    {
        $payments = PaymentModel::where('user_id', $userID)->get();

        return view('shop.paymenting-shop')
            ->with('payments', $payments);
    }

    public function getShowShop($userID, $id)
    {
    	$view = ProductModel::find($id);
    
    	return view('shop.show-shop')
            ->with('view', $view);
    }

    public function getAddToCart(Request $request, $userID, $id)
    {
        if($request->cart_unit < 1){
            Session::flash('error', '1 more');
            return redirect()->back();
        }
        $product = ProductModel::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $request['cart_unit'], $product->product_id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart', $cart));
        return redirect()->back()
            ->with('message', 'Product added');
    }

    public function getCartAsOrder($userID)
    {
        if(!Session::has('cart')){
            return view('shop.cart-order-shop')
                ->with('product', null);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.cart-order-shop')
            ->with('product', $cart->items)
            ->with('totalPrice', $cart->totalPrice)
            ->with('userID', $userID);
    }

    public function cleanCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->back();
    }

    public function fillToCustomer()
    {
        /*$fb = new Socialize([
            'app_id' => '765625186948704',
            'app_secret' => '3dda5e9b85ce118622b90b5faab0a2f5',
            'default_graph_version' => 'v2.2',
        ]);   

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name', '{access-token}');
        }catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        }catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        dd($user);*/

        return view('shop.fill-customer-shop');
    }

    public function getOrderConfirming(Request $request)
    {
        try{
            $customer = $request->all();
            $request->session()->put('customer', $customer);
            $discounts = null;
            
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $discount_total = 0;
            
            $dealers = DealerModel::get();

            foreach ($dealers as $dealer) {
                if($dealer->dealer_email == $request['customer_email']){
                    $discounts = DiscountModel::where('dealer_id', $dealer->dealer_id)->get();
                    foreach ($discounts as $discount) {
                        foreach ($cart->items as $product) {
                            //dd($product['item']['product_id']);
                            if($discount->product_id == $product['item']['product_id']){
                                //dd($sum = $sum + $discount->discount_result);
                                if($product['qty'] >= $discount->discount_unit){
                                    $discount_total = $discount_total + $discount->discount_result;
                                    Session::put('discount_total', $discount_total);
                                }
                            }
                        }
                    }
                }
            }
            
            return view('shop.confirm-order-shop')
                ->with('product', $cart->items)
                ->with('totalPrice', $cart->totalPrice)
                ->with('discount_total', $discount_total);
        }
        catch(Exeption $e){
            return redirect()->back();
        }
        
    }

    public function checkIsDealer($user, $customerEmail)
    {
        $dealers = DealerModel::where('user_id', $user)->get();
        $isDealer = 0;

        foreach ($dealers as $dealer) {
            if($dealer->dealer_email == $customerEmail){
                $isDealer = 1;
            }
        }

        return $isDealer;
    }

    public function getOrderConfirmed(Request $request)
    {
        $user = session()->get('user');
        $getCustomer = $request->session()->get('customer');
        $checkCustomer = CustomerModel::where('customer_email', $getCustomer['customer_email'])->first();

        try{
            if($checkCustomer == null){
                $customer = new CustomerModel();
                $customer->customer_name = $getCustomer['customer_name'];
                $customer->customer_address = $getCustomer['customer_address'];
                $customer->customer_postcode = $getCustomer['customer_postcode'];
                $customer->customer_email = $getCustomer['customer_email'];
                $customer->customer_tel = $getCustomer['customer_tel'];
                $customer->user_id = $user;
                $customer->save();

                $checkCustomer = CustomerModel::where('customer_email', $customer->customer_email)->first();
            }

            if($checkCustomer->customer_email == $getCustomer['customer_email']){
                $findCustomer = CustomerModel::where('customer_email', $getCustomer['customer_email'])->first();
                $totalPrice = Session::get('cart')->totalPrice;
                $discountTotal = Session::get('discount_total');

                $order = new OrderModel();
                $isDealer = $this->checkIsDealer($user ,$getCustomer['customer_email']);

                $order->customer_id = $findCustomer->customer_id;
                $order->order_totalprice = $totalPrice - $discountTotal;
                $order->order_totaldiscount = $discountTotal + 0;
                $order->orderstatus_id = 1;
                $order->isDealer = $isDealer;
                $order->user_id = $user;
                $order->save();

                if($order->customer_id == $findCustomer->customer_id){
                    if(Session::has('cart')){
                        $oldCart = Session::get('cart');
                        $getCarts = new Cart($oldCart);
                        foreach($getCarts->items as $getCart){
                            $orderdetail = new OrderDetailModel([
                                'order_no' => $order->order_no,
                                'product_id' => $getCart['item']['product_id'],
                                'unit' => $getCart['qty'],
                                'user_id' => $user,
                            ]);
                            $orderdetail->save();
                        }

                        if($orderdetail->order_no == $order->order_no){
                            $request->session()->forget('cart');
                            $request->session()->forget('discount_total');

                            Session::flash('success', 'ทำการสั่งซื้อสินค้าเรียบร้อบ');
                            $orderSuccess = OrderModel::find($order->order_no);

                            return view('shop.success-order-shop')
                                ->with('orderSuccess', $orderSuccess);
                        } // end if($cart->order_no == $findOrder->order_no)
                    } // end if(Session::has('cart'))
                } // end if($order->customer_id == $findCustomer->customer_id)
            }  // end if($customer->customer_email == $getCustomer['customer_email'])
        }catch(Exeption $e){
            return redirect('/shop/'+ $user); 
        }
        
    }

    public function reportOrder($customerID, $orderNo)
    {
        try{
            $customer = CustomerModel::find($customerID);
            $order = OrderModel::find($orderNo);
            $orderDetails = OrderDetailModel::where('order_no', $orderNo);
            dd($order->order_totaldiscount);
            return view('shop.report-order-shop')
                ->with('customer', $customer)
                ->with('order', $order)
                ->with('orderDetail', $orderDetail);
        }
        catch(Exeption $e){
            return redirect()->back();
        }
    } 

}
