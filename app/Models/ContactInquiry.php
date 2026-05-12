<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public static function storeMessage($data)
    {
        return self::create($data);
    }
}
