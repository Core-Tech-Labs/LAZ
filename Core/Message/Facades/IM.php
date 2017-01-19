<?php

namespace Core\Message\Facades;

use Illuminate\Support\Facades\Facade;

class IM extends Facade{

  protected static function getFacadeAccessor(){
    return 'IM';
  }

}