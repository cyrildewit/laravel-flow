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

class Flow implements FlowInterface
{
    /**
     * Collection of stages.
     *
     * Structure: ['name' => StageInterface]
     *
     * @var \CyrildeWit\LaravelFlow\StageInterface[]
     */
    protected $stages;

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
    public function hasStage(string $name)
    {
        return isset($this->stages[$name]);
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
    public function getOrderedStages()
    {
        return $this->orderedStages;
    }

    /**
     * {@inheritdoc}
     */
    public function getStageByIndex(int $index)
    {
        if(! $this->hasStageByIndex()) {
            // StageNotFoundException
            throw new InvalidArgumentException(sprintf('Stage with index %d. does not exist', $index));
        }

        return $this->orderedStages[$index];
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
            throw new InvalidArgumentException(sprintf('Stage with name "%s" already exists', $name));
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
        if (! $this->hasStage($name)) {
            throw new InvalidArgumentException(sprintf('Stage with name "%s" does not exist', $name));
        }

        $index = array_search($this->stages[$name], $this->orderedStages);
        unset($this->stages[$name], $this->orderedStages[$index]);
        $this->orderedStages = array_values($this->orderedStages); //keep sequential index intact
    }
}
