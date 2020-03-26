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

namespace CyrildeWit\LaravelFlow;

use CyrildeWit\LaravelFlow\Stage\StageInterface;
use CyrildeWit\LaravelFlow\Exceptions\StageDoesNotExists;
use CyrildeWit\LaravelFlow\Exceptions\StageAlreadyExists;

class Flow implements FlowInterface
{
    /**
     * List of stages that are part of the flow.
     *
     * Structure: [index => StageInterface]
     *
     * @var \CyrildeWit\LaravelFlow\StageInterface[]
     */
    protected $stages = [];

    /**
     * Ordered collection of stages.
     *
     * Structure: [key => StageInterface]
     *
     * @var \CyrildeWit\LaravelFlow\StageInterface[]
     */
    protected $orderedStages;

    /**
     * {@inheritdoc}
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * {@inheritdoc}
     */
    public function setStages(array $stages)
    {
        foreach($stages as $name => $stage) {
            $this->addStage($name, $stage);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function countStages()
    {
        return count($this->stages);
    }

    /**
     * {@inheritdoc}
     */
    public function getStage(string $name)
    {
        if(! $this->hasStage($name)) {
            throw StageDoesNotExists::named($name);
        }

        return $this->stages[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasStage(string $name)
    {
        return isset($this->stages[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderedStages()
    {
        return $this->orderedStages;
    }

    /**
     * {@inheritdoc}
     */
    public function getStageByIndex(int $index)
    {
        if(! $this->hasStageByIndex($index)) {
            throw StageDoesNotExists::withIndex($index);
        }

        return $this->orderedStages[$index];
    }

    /**
     * {@inheritdoc}
     */
    public function hasStageByIndex(int $index)
    {
        return isset($this->orderedStages[$index]);
    }

    /**
     * {@inheritdoc}
     */
    public function getStageBySlug(string $slug)
    {
        foreach($this->getStages() as $stage) {
            if ($slug === $stage->getSlug()) {
                return $stage;
            }
        }

        throw StageDoesNotExists::withSlug($slug);
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstStage()
    {
        return $this->getStageByIndex(0);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastStage()
    {
        return $this->getStageByIndex($this->countStages() - 1);
    }

    /**
     * {@inheritdoc}
     */
    public function addStage(string $name, StageInterface $stage)
    {
        if ($this->hasStage($name)) {
            throw StageAlreadyExists::named($name);
        }

        // if (null === $stage->getName()) {
        //     //
        // }

        $this->stages[$name] = $this->orderedStages[] = $stage;
    }

    /**
     * {@inheritdoc}
     */
    public function removeStage(string $name)
    {
        if(! $this->hasStage($name)) {
            throw StageDoesNotExists::named($name);
        }

        $index = array_search($this->stages[$name], $this->orderedStages);
        unset($this->stages[$name], $this->orderedStages[$index]);
        $this->orderedStages = array_values($this->orderedStages); //keep sequential index intact
    }

    public function firstOrLastProcessed()
    {
        return $this->getFirstStage();
    }
}
