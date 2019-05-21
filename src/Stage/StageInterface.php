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
    public function display();

    /**
     * Display stage.
     *
     * @param  \CyrildeWit\LaravelFlow\Context\FlowContextInterface  $context
     * @return mixed
     */
    public function process();
}
