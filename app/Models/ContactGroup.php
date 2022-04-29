<?php

namespace App\Models;

use App\Trait\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $fillable = ['resourceName', 'etag', 'groupType', 'name', 'formattedName'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
