<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

declare(strict_types=1);

namespace Vinkla\Hashids;

use GrahamCampbell\Manager\AbstractManager;
use Hashids\Hashids;
use Illuminate\Contracts\Config\Repository;

/**
 * @method \Hashids\Hashids encode(mixed ...$numbers)
 * @method \Hashids\Hashids decode(string $hash)
 * @method \Hashids\Hashids encodeHex(string $str)
 * @method \Hashids\Hashids decodeHex(string $hash)
 */
class HashidsManager extends AbstractManager
{
    protected HashidsFactory $factory;

    public function __construct(Repository $config, HashidsFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    protected function createConnection(array $config): Hashids
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return 'hashids';
    }

    public function getFactory(): HashidsFactory
    {
        return $this->factory;
    }
}
