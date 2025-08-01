<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
 
class Role extends Model
{
    use HasFactory;

     protected $table = 'roles';
 
    protected $fillable = [
        'name',
    ];
 
    public function users()
    {
        return $this->hasMany(User::class);
    }
}