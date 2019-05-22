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

interface FlowInterface
{
    /**
     * Get the stages.
     *
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface[]
     */
    public function getStages();

    /**
     * Set the stages.
     *
     * @param \CyrildeWit\LaravelFlow\Stage\StageInterface[]  $stages
     */
    public function setStages(array $stages);

    /**
     * Count all the stages.
     *
     * @return int
     */
    public function countStages();

    /**
     * Get stage by name.
     *
     * @param  string  $name
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface
     */
    public function getStage(string $name);

    /**
     * Determine if stage by name exists in the flow.
     *
     * @param  string  $name
     * @return boolean
     */
    public function hasStage(string $name);

    /**
     * Get stages ordered.
     *
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface[]
     */
    public function getOrderedStages();

    /**
     * Get stage by index.
     *
     * @param  int  $index
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface
     */
    public function getStageByIndex(int $index);

    /**
     * Determine if stage by index exists in the flow.
     *
     * @param  int  $index
     * @return boolean
     */
    public function hasStageByIndex(int $index);

    /**
     * Get stage by slug.
     *
     * @param  int  $index
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface
     */
    public function getStageBySlug(string $slug);

    /**
     * Get first process stage.
     *
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface
     */
    public function getFirstStage();

    /**
     * Get last stage.
     *
     * @return \CyrildeWit\LaravelFlow\Stage\StageInterface
     */
    public function getLastStage();

    /**
     * Add stage with name.
     *
     * @param string  $name
     * @param \CyrildeWit\LaravelFlow\Stage\StageInterface  $stage
     */
    public function addStage(string $name, StageInterface $stage);

    /**
     * Remove stage.
     *
     * @param string $name
     */
    public function removeStage(string $name);
}
