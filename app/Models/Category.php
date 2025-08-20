<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }

    public static function autoAssignIdFromTitle($title)
    {
        $keyCategory = [
            'Plumbing' => ['pipa', 'bocor', 'air'],
            'Listrik' => ['listrik', 'lampu', 'arus', 'mati'],
            'Kebersihan' => ['kotor', 'sampah', 'bersih'],
            'Keamanan' => ['aman', 'mencurigakan', 'keamanan', 'pencuri', 'penjaga']
        ];
        $title = strtolower($title);
        foreach ($keyCategory as $categoryName => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($title, $keyword)) {
                    return self::where('name', $categoryName)->value('id');
                }
            }
        }
        return self::first()->id;
    }
}
