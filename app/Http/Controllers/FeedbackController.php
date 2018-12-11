<?php

namespace App\Http\Controllers;

use Cache;
use Redis;
use App\User;
use App\Product;
use App\Feedback;
use App\Mail\SendEmail;
use App\Events\FeedbackEvent;
use App\Repositories\Repository;

use Yajra\Datatables\Datatables;
use Pusher\Pusher;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
        return view('admin.feedback_list');
    }

    public function json()
    {
        // get all user but dont get current user
        if (!Redis::get('feedback:all')) {
            // $name, $with from repository
            $this->feedbackModel->setRedisAll('feedback:all', ['user', 'product']);
        }

        // set true to return array
        $data = json_decode(Redis::get('feedback:all'), true);

        return datatables($data)->make(true);
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

        $data = $this->feedbackModel->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'content' => $request->contents,
            'status' => 0,
        ]);

        // $name, $with
        $this->feedbackModel->setRedisAll('feedback:all', ['user', 'product']);
        // $name, $id, $data
        $this->feedbackModel->setRedisById('feedback:' . $data->id, $data);

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
        $data = $this->feedbackModel->update(
            [
                'status' => $feedback->status == 1 ? 0 : 1
            ],
            $feedback->id
        );

        // $name, $with
        $this->feedbackModel->setRedisAll('feedback:all', ['user', 'product']);
        // $name, $id, $data
        $this->feedbackModel->setRedisById('feedback:' . $feedback->id, Feedback::where('id', $feedback->id));
    }
}
