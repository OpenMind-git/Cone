<?php

namespace Erjon\Cone\App\Repositories;

use Erjon\Cone\App\Models\Key;

class KeyRepository
{
    public function getUnusedKey($key): ?Key
    {
        return Key::where('user_email', auth()->user()->email)
            ->where('key' , $key)
            ->notActivated()
            ->first();
    }

    public function getUserActiveKey(): ?Key
    {
        return Key::where('user_email', \Auth::user()->email)->activated()->notDeactivated()->first();
    }

    public function activateKey(Key $key): bool
    {
        return $key->update([
            'used' => true,
            'last_active' => now()
        ]);
    }

    public function keyUsed(Key $key): bool
    {
        return $key->update([
            'last_active' => now()
        ]);
    }
}
