<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

        // Récupérer ou créer une commande non confirmée
        public function getOrCreateUnconfirmedOrder()
        {
            $order = $this->orders()->where('is_confirmed', false)->first();
    
            if (!$order) {
                $order = $this->orders()->create([
                    'total_price' => 0,
                    'total_quantity' => 0,
                    'is_confirmed' => false,
                ]);
            }
    
            return $order;
        }
    // Récupérer la commande active
    public function activeOrder()
    {
        return $this->orders()->where('is_confirmed', false)->first();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relation avec les catégories
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
