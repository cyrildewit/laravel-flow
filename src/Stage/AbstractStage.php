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

abstract class AbstractStage implements StageInterface
{
    /**
     * Stage name.
     *
     * @var string
     */
    protected $name;

    /**
     * Stage slug.
     *
     * @var string
     */
    protected $slug;

    /**
     * Activeness of stage.
     *
     * @var bool
     */
    protected $active = true;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function display(Request $request);

    /**
     * {@inheritdoc}
     */
    abstract public function process(Request $request);

    /**
     * {@inheritdoc}
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function isValid(Request $request);
}
