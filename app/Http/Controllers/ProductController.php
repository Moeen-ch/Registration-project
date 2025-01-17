<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;

class ProductController extends Controller
{
   public function ProductFormView()
   {
      $users = user::all();
      return view('product\productform', compact('users'));
   }

   // public function ordersView()
   // {

   //    return view('product\orderDetail');
   // }
   public function store(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'order_no' => 'required|string',
         'user_id' => 'required|exists:users,id',
         'price' => 'required|string',
         'category' => 'required|string',
         'status' => 'required|string'
      ]);

      $newUser = new product;
      $newUser->order_no = $request->order_no;
      $newUser->user_id = $request->user_id;
      $newUser->price = $request->price;
      $newUser->category = $request->category;
      $newUser->status = $request->status;
      $newUser->save();


      return redirect()->route('orders');
   }

   public function show()
   {
      $products = product::all();
      // dd($products);
      return view('product.orderDetail', compact('products'));
   }

   public function edit($id)
   {
      $products = product::findOrFail($id);
      $selectedUserId = $products->user_id;
      $users = user::all();
      return view('product.updateProduct', compact('products', 'users','selectedUserId'));
   }

   public function update(Request $request, string $id)
   {

      $validator = validator::make($request->all(), [
         'order_no' => 'required|string',
         'user_id' => 'required|exists:users,id',
         'price' => 'required|string',
         'category' => 'required|string',
         'status' => 'required|string'
      ]);

      $products = product::where('id',$id)->update
      ([
         'order_no' => $request->order_no,
         'user_id' => $request->user_id,
         'price' => $request->price,
         'category' =>$request->category,
         'status' => $request->status
      ]);

      return redirect()->route('orders');
   }

   public function destroy(string $id){
      $products = product::find($id);
      $products->delete();

      return redirect()->route('orders');

   }
}
