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

namespace CyrildeWit\LaravelFlow\Stage;

use Illuminate\Http\Request;

interface StageInterface
{
    /**
     * Get stage name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set stage name.
     *
     * @param string
     */
    public function setName(string $name);

    /**
     * Get stage slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set stage slug.
     *
     * @param string
     */
    public function setSlug(string $slug);

    /**
     * Display stage.
     *
     * @param  \CyrildeWit\LaravelFlow\Context\FlowContextInterface  $context
     * @return mixed
     */
    public function display(Request $request);

    /**
     * Display stage.
     *
     * @param  \CyrildeWit\LaravelFlow\Context\FlowContextInterface  $context
     * @return mixed
     */
    public function process(Request $request);

    /**
     * Determine if the stage is active.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Determine if the stage is valid.
     *
     * @return bool
     */
    public function isValid(Request $request);
}
