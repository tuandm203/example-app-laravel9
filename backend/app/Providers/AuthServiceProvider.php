<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $gateAndPolicy = new PermissionGateAndPolicyAccess();
        $gateAndPolicy->setGateAndPolicyAccess();




        // Gate::define('menu-list', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list_menu'));
        //  });

        //  Gate::define('product-edit', function ($user,$id) {
        //     $product = Product::find($id);
        //     if ( $user->checkPermissionAccess('product_edit') && $user->id=== $product->user_id){
        //         return true;
        //     }
        //     else  return false;
        //    });
        //  Gate::define('product-list', function ($user) {
        //     return $user->checkPermissionAccess('product_list');
        //  });
    }
    public function defineGateCategory()
    {
        
    }
}
