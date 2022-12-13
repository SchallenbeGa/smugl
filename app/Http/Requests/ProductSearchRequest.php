<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Product;
use App\Category;
class ProductSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
    /**
     * Perform a job search and return the result
     *
     * @param Int $cat_id
     * @return Collection
     */
    public function search($category_id = null)
    {
        $productQuery = Product::with('category_id')->opened()->latest();
        $productQuery->where(function ($q) use ($category_id) {
                $q->where('category_id', 'LIKE', '%' . $category_id . '%');
            });
        return $productQuery->get();
    }
}