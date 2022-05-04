<?php

namespace App\Models;

use App\Trait\TraitUuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use TraitUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'access_token',
        'refresh_token',
        'social_id',
        'social_type',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//relationship
    public function contactgroups()
    {
        return $this->hasMany(ContactGroup::class);
    }

    //for access token
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $userSocialAccount = SocialAccount::where('provider_id', $socialUser->id)->where('provider_name', $provider)->first();

        /*
        if account exist, return the social account user
        else create the user account, then return the new user
         */
        if ($userSocialAccount) {

            // generate access token for use
            $token = $socialUser->createToken('********')->accessToken;

            // return access token & user data
            return response()->json([
                'token' => $token,
                'user' => (new UserResource($userSocialAccount)),
            ]);

        } else {

            $user = User::create([
                'firstname' => $socialUser->name,
                'lastname' => $socialUser->name,
                'username' => $socialUser->email,
                'email_verified_at' => now(),
            ]);

            if ($user) {

                SocialAccount::create([
                    'provider_id' => $socialUser->id,
                    'provider_name' => $provider,
                    'user_id' => $user->id,
                ]);
            }

            // assign passport token to user
            $token = $user->createToken('********')->accessToken;

            return response()->json(['token' => $token, 'user' => new UserResource($user)]);

        }
    }

}
