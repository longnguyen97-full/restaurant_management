<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_list = session()->has('id_list') ? session('id_list') : [];
        $quantity_list = !empty($id_list) ? array_count_values($id_list) : [];
        $item_list = !empty($id_list) ? Item::whereIn('id', $id_list)->get() : [];
        // phase 1: count total amount of items
        $price = $quantity = $original_total = $sub_total = 0;
        // phase 2: add discount amount to total
        $discount = $total_discount = $total_each_item = 0;
        // phase 3: final total
        $delivery = 3;
        $total = 0;

        $items = [];
        foreach ($item_list as $key => $item) {
            // phase 1: count total amount of items
            $price = $item->price;
            $quantity_key = array_keys($quantity_list)[$key];
            $quantity = $quantity_list[$quantity_key];
            $original_total = $price * $quantity;
            $sub_total += $original_total;
            // phase 2: add discount amount to total
            $discount = $item->voucher->discount;
            $total_discount += $discount;
            $total_each_item = $original_total - $discount;
            // phase 3: final total
            $total = $sub_total - $total_discount + $delivery;
            // put data to items array
            $items[$key]['id'] = $item->id;
            $items[$key]['name'] = $item->name;
            $items[$key]['description'] = $item->description;
            $items[$key]['price'] = $price;
            $items[$key]['thumbnail'] = $item->thumbnail;
            $items[$key]['quantity'] = $quantity;
            $items[$key]['discount'] = $discount;
            $items[$key]['total_each_item'] = $total_each_item;
        }
        // Put data to storage
        $card_totals = session()->has('card_totals') ? session('card_totals') : [];
        $card_totals['sub_total'] = $sub_total;
        $card_totals['delivery'] = $delivery;
        $card_totals['total_discount'] = $total_discount;
        $card_totals['total'] = $total;
        session()->put('card_totals', $card_totals);

        return view('cart', compact('items', 'card_totals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Put id to storage
        $id_list = session()->has('id_list') ? session('id_list') : [];
        array_push($id_list, $request->id);
        session()->put('id_list', $id_list);

        // Return a JSON response
        return response()->json($id_list);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_list = session()->has('id_list') ? session('id_list') : [];
        $filtered_id_list = array_filter($id_list, function ($id) use ($request) {
            return $id !== $request->id;
        });
        $quantity = $request->quantity;
        for ($i = 0; $i < $quantity; $i++) {
            array_push($filtered_id_list, $request->id);
        }
        session()->put('id_list', $filtered_id_list);

        // Return a JSON response
        return response()->json($filtered_id_list);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_list = session()->has('id_list') ? session('id_list') : [];
        $filtered_id_list = array_filter($id_list, function ($id) use ($request) {
            return $id !== $request->id;
        });
        session()->put('id_list', $filtered_id_list);

        // Return a JSON response
        return response()->json($filtered_id_list);
    }

    /**
     * Checkout order.
     */
    public function checkout()
    {
        $card_totals = session()->has('card_totals') ? session('card_totals') : [];
        $categories = Category::withCount('blogs')->withCount('items')->get();

        return view("checkout", compact('card_totals', 'categories'));
    }
}
