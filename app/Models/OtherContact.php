<?php

namespace App\Models;

use App\Trait\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherContact extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $fillable = ['resourceName', 'etag'];

}
