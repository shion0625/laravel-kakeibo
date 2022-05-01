<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Book extends Model
{
    use HasFactory;
    static $categories = ["趣味","光熱費","家賃・ローン","交際費","教育費","給料","副業","臨時収入"];
    protected $fillable = ["inout", "year","month", "category", "amount", "memo"];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
