<?php

declare(strict_types=1);

/*
 * This file is part of the Laravel Flow package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\LaravelFlow\Exceptions;

use InvalidArgumentException;

class StageAlreadyExists extends InvalidArgumentException
{
    public static function named(string $stageName)
    {
        return new static("Stage with name `{$stageName}` already exists.");
    }
}
