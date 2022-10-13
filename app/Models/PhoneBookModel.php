<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneBookModel extends Model
{
    protected $table = 'phonebook';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
