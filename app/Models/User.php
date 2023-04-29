<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    public $timestamps = false;
protected $table = 'tblteacher';
protected $primaryKey = 'teacherid';
// column sa table
protected $fillable = [
'teacherid', 'lastname', 'firstname', 'middlename', 'bday', 'age'
];
}