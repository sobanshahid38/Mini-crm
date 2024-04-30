<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;
    protected $fillable=['name','email','logo','website'];

    public function employees()
    {
      return $this->hasMany(Employee::class);
    }


    public function LogoUrl()
    {
     
     return Storage::exists($this->logo != null ? $this->logo:"" )? Storage::url($this->logo): "http://via.placeholder.com/150x150" ;
     
    }

    public static function companyList()
    {
     return self::withoutGlobalScopes()->orderBy('name')->pluck('name','id')->prepend('Select Company','');
    }
}
