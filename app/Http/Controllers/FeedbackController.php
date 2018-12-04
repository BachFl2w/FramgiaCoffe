<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Feedback;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class FeedbackController extends Controller
{
    protected $userModel;
    protected $productModel;
    protected $feedbackModel;

    public function __construct(Feedback $feedbackModel, User $userModel, Product $productModel)
    {
        // set the model
        $this->userModel = new Repository($userModel);
        $this->productModel = new Repository($productModel);
        $this->feedbackModel = new Repository($feedbackModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all()->load('user', 'product');

        return view('admin.feedback_list', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Product $product)
    {
        if ($request == '') {
            return back()->with('fail', __('message.fail.feedback'));
        }

        $this->feedbackModel->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'content' => $request->contents,
            'status' => 0,
        ]);

        return back()->with('success', __('message.success.send'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function active(Feedback $feedback)
    {
        $this->feedbackModel->update(
            [
                'status' => $feedback->status == 1 ? 0 : 1
            ],
            $feedback->id
        );

        return back()->with('success', __('message.success.feedback'));
    }
}
