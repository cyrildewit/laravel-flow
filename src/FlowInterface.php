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
     * @return StageInterface[]
     */
    public function getStages();

    /**
     * Set the stages.
     *
     * @param StageInterface[]  $stages
     */
    public function setStages(array $stages);

    /**
     * Determine if stage by name exists in the flow.
     *
     * @param  string  $name
     * @return boolean
     */
    public function hasStage(string $name);

    /**
     * Count all the stages.
     *
     * @return int
     */
    public function countStages();

    /**
     * Get stages ordered.
     *
     * @return StageInterface[]
     */
    public function getOrderedStages();

    /**
     * Get stage by index.
     *
     * @param  int  $index
     * @return
     */
    public function getStageByIndex(int $index);

    /**
     * Get first process stage.
     *
     * @return StageInterface
     */
    public function getFirstStage();

    /**
     * Get last stage.
     *
     * @return StageInterface
     */
    public function getLastStage();

    /**
     * Add stage with name.
     *
     * @param string  $name
     * @param StageInterface  $stage
     */
    public function addStage(string $name, StageInterface $stage);

    /**
     * Remove stage.
     *
     * @param string $name
     */
    public function removeStage(string $name);
}
