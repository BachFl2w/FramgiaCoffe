<?php

namespace App\Console\Commands;

use App\OrderDetail;
use App\Product;
use Illuminate\Console\Command;

class UpdateDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_discount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update discount in special day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = OrderDetail::with('product.images')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get(['product_id']);
        if (count($products)) {
            foreach ($products as $element) {
                Product::findOrFail($element->product_id)->update(['discount' => 5]);
            }
        }
    }
}
