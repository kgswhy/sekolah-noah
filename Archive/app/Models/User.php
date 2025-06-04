<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    /**
     * Get the employee associated with the user.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    
    /**
     * Get the role that belongs to the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    /**
     * Get the approver permissions for this user.
     */
    public function approvers()
    {
        return $this->hasMany(Approver::class);
    }
    
    /**
     * Check if the user is an approver for a specific module and level.
     *
     * @param string $module
     * @param int $level
     * @param string|null $departmentType
     * @return bool
     */
    public function isApproverFor($module = 'cuti', $level = 1, $departmentType = null)
    {
        $query = $this->approvers()
            ->where('module', $module)
            ->where('approval_level', $level)
            ->where('active', true);

        if ($departmentType) {
            $query->where('department_type', $departmentType);
        }

        return $query->exists();
    }
    
    /**
     * Check if the user has admin role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role && $this->role->name === 'admin';
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (!$this->role) {
            return false;
        }

        if (is_array($role)) {
            return in_array($this->role->name, $role);
        }

        return $this->role->name === $role;
    }
}
