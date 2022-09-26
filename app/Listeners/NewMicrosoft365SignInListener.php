<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Partner;
use Dcblogdev\MsGraph\Models\MsGraphToken;
use Illuminate\Support\Facades\Auth;

class NewMicrosoft365SignInListener
{
    public function handle($event)
    {
        $tokenId = $event->token['token_id'];
        $token   = MsGraphToken::find($tokenId)->first();

        if ($token->user_id == null) {
            $partner = Partner::where('email', '=' ,$event->token['info']['mail'])->get();
            $user = User::create([
                'name'     => $event->token['info']['displayName'],
                'email'    => $event->token['info']['mail'],
                'partner_id' => $partner->partner_id,
                'password' => '',
            ]);

            $token->user_id = $user->id;
            $token->save();

            Auth::login($user);
        } else {
            $user = User::findOrFail($token->user_id);
            $user->save();

            Auth::login($user);
        }
    }
}
