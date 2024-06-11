<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function filter(Request $request)
    {
    try {
        //dd($request);
        $query = Product::query();

        // Filter by category
        if ($request->main_category) {
            $query->whereIn('category_id', explode(',', $request->main_category));
        }

        if ($request->subcategory) {
            $query->whereIn('sub_category_id', explode(',', $request->subcategory));
        }

        if ($request->childcategory) {
            $query->whereIn('child_category_id', explode(',', $request->childcategory));
        }

        // Filter by price range
        if ($request->minPrice) {
            $query->where('sort_price', '>=', $request->minPrice);
        }

        if ($request->maxPrice) {
            $query->where('sort_price', '<=', $request->maxPrice);
        }

        // Filter by stock status
        if ($request->stock == 'in_stock') {
            $query->where('stock', '>', 0);
        } elseif ($request->stock == 'out_stock') {
            $query->where('stock', '=', 0);
        }

        // Sort by
        if ($request->sortby == 'price_asc') {
            $query->orderBy('sort_price', 'asc');
        } elseif ($request->sortby == 'price_desc') {
            $query->orderBy('sort_price', 'desc');
        } elseif ($request->sortby == 'newest') {
            $query->orderBy('created_at', 'desc');
        }

        // Filter by rating
        // if ($request->rating) {
        //     $query->where('rating', '>=', $request->rating);
        // }

        // Filter by header search
        if ($request->header_search) {
            $query->where('title', 'like', '%' . $request->header_search . '%');
        }

        $query->with('variants');

        $products = $query->get();

        $result = [];

        foreach ($products as $product) {
            if ($product->product_price_type == 1) {
                $variant = $product->variants->first();
                $result[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'category_id' => $product->category_id,
                    'sub_category_id' => $product->sub_category_id,
                    'child_category_id' => $product->child_category_id,
                    'sort_price' => $product->sort_price,
                    'product_price_type' => $product->product_price_type,
                    'product_variant_detail' => [
                        'product_variant_id' => $variant->id,
                        'price' => $variant->price,
                        'discount' => $variant->discount,
                        'discount_id' => $variant->discount_id,
                        'selling_price' => $variant->selling_price,
                        'variant_name' => $variant->variant_name,
                        'sub_variant_name' => $variant->sub_variant_name,
                        'single_image' => $variant->single_image,
                        'wishlistExist' => 0,
                        'rating_average' => 0.0,
                        'rating_count' => 0,
                    ],
                ];
            } else {
                $result[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'category_id' => $product->category_id,
                    'sub_category_id' => $product->sub_category_id,
                    'child_category_id' => $product->child_category_id,
                    'sort_price' => $product->sort_price,
                    'price' => $product->sort_price,
                    'discount' => 0,
                    'discount_id' => 0,
                    'selling_price' => $product->sort_price,
                    'product_price_type' => $product->product_price_type,
                    'wishlistExist' => 0,
                    'single_image' => $product->single_image,
                    'rating_average' => '',
                    'rating_count' => 0,
                ];
            }
        }

        return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
 }
 
}