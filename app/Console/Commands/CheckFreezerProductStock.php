<?php

namespace App\Console\Commands;

use App\Events\FreezerProductStockDownEvent;
use App\Models\FreezerProduct;
use App\Models\User;
use App\Notifications\FreezerProductStockDownNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CheckFreezerProductStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-freezer-product-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $freezerProducts = FreezerProduct::query()->where('unit', '<=', '5')->get();
        foreach ($freezerProducts as $freezerProduct) {
            $user = User::find($freezerProduct->user_id);
            Notification::send($user, new FreezerProductStockDownNotification($freezerProduct));
        }
    }
}
