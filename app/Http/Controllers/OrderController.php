<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Storeorders;
use App\Order;
use App\OrderStatus;
use Dotenv\Result\Success;
class OrderController extends Controller
{

public function index(){
        $orders=Order::all();
        $order_statuses = OrderStatus::all();
        return view('Pages.orders' , ['orders'=>$orders],['order_statuses'=>$order_statuses]);
}
//store the order
public function store(Storeorders $request)
{

    try {
        $validated = $request->validated();
        $Order = new Order();
        $Order->OrderTitle = $request->OrderTitle;
        $Order->order = $request->order;
        $Order->notes = $request->notes;
        $Order->status_id = $request->status_id;
        $Order->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('orders.index');
    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}

//Update the specified resource in storage.
public function update(Storeorders $request)
{
  try {
      $validated = $request->validated();
        $orders = Order::findOrFail($request->id);
        $orders->update([
        $orders->OrderTitle = $request->OrderTitle,
        $orders->order = $request->order,
        $orders->notes = $request->notes,
        $orders->status_id = $request->status_id,
      ]);
      toastr()->success(trans('messages.Update'));
      return redirect()->route('orders.index');
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
}
  // Remove the specified resource from storage.
  public function destroy(Request $request)
  {

    $orders = Order::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('orders.index');

  }
}
