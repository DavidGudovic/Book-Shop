<?php

namespace App\Services\Cart;

use Illuminate\Support\Facades\Facade;

/*
Went with Facade pattern instead of Type hint, Dependency injection like with the other Services,
to differentiate it from services for Eloquent Models, since Cart isn't an actual Model
And Cart::add makes more sense then CartService $cartService->add
*/
class CartFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'Cart';
    }
}
