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

class StageDoesNotExists extends InvalidArgumentException
{
    public static function named(string $stageName)
    {
        return new static("There is no stage with name `{$stageName}`.");
    }

    public static function withIndex(int $stageIndex)
    {
        return new static("There is no stage with index `{$stageIndex}`.");
    }

    public static function withSlug(string $stageSlug)
    {
        return new static("There is no stage with slug `{$stageSlug}`.");
    }
}
