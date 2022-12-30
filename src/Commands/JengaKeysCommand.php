<?php

namespace NjoguAmos\Jenga\Commands;

use Illuminate\Console\Command;
use Spatie\Crypto\Rsa\KeyPair;

class JengaKeysCommand extends Command
{
    protected $signature = 'jenga:keys
                                      {--force : Overwrite keys they already exist}
                                      {--env=/.env : The environment variable file to be used}';

    protected $description = 'Create the encryption keys for Jenga API signature.';

    public function handle(): int
    {
        [$privateKey, $publicKey] = [
            config('jenga.public_key'),
            config('jenga.private_key'),
        ];


        if ((! empty($publicKey) || !empty($privateKey)) && ! $this->option('force')) {
            $this->error(trans('jenga::jenga.keys.exists'));

            return self::FAILURE;
        } else {
            [$privateKey, $publicKey] = (new KeyPair())->generate();


            $this->info(trans('jenga::jenga.keys.generated'));

            return self::SUCCESS;
        }
    }
}
