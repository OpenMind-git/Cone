<?php

namespace Erjon\Cone\App\Services;

use Erjon\Cone\App\Repositories\KeyRepository;

class KeyService
{
    private $keyRepository;

    public function __construct(KeyRepository $keyRepository)
    {
        $this->keyRepository = $keyRepository;
    }

    public function activate($data): bool
    {
        $key = $this->keyRepository->getUnusedKey($data['key']);

        if (! $key) {
            return false;
        }

        return $this->keyRepository->activateKey($key);
    }
}
