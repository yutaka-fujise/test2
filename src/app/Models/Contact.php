<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // contactsテーブルのカラムで、操作可能とするものをモデルで指定
    use HasFactory;
    protected $fillable = [
     'name',
     'email',
     'tel',
     'content'
    ];
}
