<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Order;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');

            }
            else
            {
                return redirect()->back();
            }
            

        }
        else
        {
            return redirect('login');
        }
        
    }

    public function uploadproduct(Request $request)
    {
        $data = new product; // Capitalize if model name is Product
        $image = $request->file('file'); // Ensure 'file' matches the input name in your form

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename); // Use $image->move instead of $request->file->move

        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }


    public function showproduct()
    {

        $data = product::all();

        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {

        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Product Deleted');
    }

    public function updateview($id)
    {

        $data=product::find($id);

        

        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request, $id)
    {
        $data=product::find($id);

        $image = $request->file('file'); // Ensure 'file' matches the input name in your form


        if($image)
        {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('productimage', $imagename); // Use $image->move instead of $request->file->move

            $data->image = $imagename;
        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();
        return redirect()->back()->with('message','Product Updated Successfully');

    }

    public function showorder()
    {
        $order=order::all();

        return view('admin.showorder', compact('order'));
    }

    public function updatestatus($id)
    {

        $order=order::find($id);

        $order->status='delivered';

        $order->save();

        return redirect()->back();

    }

    

}
