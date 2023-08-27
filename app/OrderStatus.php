<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Translatable\HasTranslations;

class OrderStatus extends Model
{
    //
    use HasTranslations;
    public $translatable = ['StatusName'];
    protected $fillable =['StatusName'];
}
?>
