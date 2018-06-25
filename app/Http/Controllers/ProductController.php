<?php

namespace App\Http\Controllers;


use App\Helpers\Languages;
use App\Services\ProductService;
use App\ViewModels\ProductViewModel;
use DB;
use JavaScript;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends LayoutController
{
    /**
     * @var $product_service
     */
    protected $product_service;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->product_service = $productService;
    }

    /**
     * @param null $slug
     * @param string $language
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ProductViewModel('product', $slug, $language);

        $this->product_service->fill($model);

        $reviews = $this->product_service->fill_reviews($model->product->id, 1);

        $reviews_total_count = $this->product_service->fill_reviews_count($model->product->id);

        \Debugbar::info($model);
        \Debugbar::info($model->product->promotions);

        JavaScript::put([
            'product' => $model->product,
            'similar_products' => $model->similar_products,
            'reviews' => $reviews,
            'reviews_total_count' => $reviews_total_count
        ]);

        // Puts trans for JS
        $this->putJavaScriptTrans($model->view);

        return view('pages.product', compact('model'));
    }

    /**
     * ajax get reviews for product
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_reviews()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }

        $product_id = request('product_id');

        $page = request('page');

        $reviews = $this->product_service->fill_reviews($product_id, $page);

        $reviews_count = $this->product_service->fill_reviews_count($product_id);

        return response()->json([
            'reviews' => $reviews,
            'reviews_count' => $reviews_count
        ]);
    }

    /**
     * add review
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_review()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }

        $productId = request('productId');

        $userId = auth()->check() ? auth()->user()->id : null;

        $review = request('review');

        $name = request('name');

        $email = request('email');

        $rating = request('rating');

        try
        {
            DB::beginTransaction();
            $this->product_service->add_review($productId, $userId, $review, $name, $email, $rating);
//            $this->reviewService->addReview($productId, $userId, $review, $name, $email, $rating);
        }
        catch (\Exception $e)
        {
            DB::rollBack();

            return response()->json([
                'status' => 'error'
            ]);
        }
        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
