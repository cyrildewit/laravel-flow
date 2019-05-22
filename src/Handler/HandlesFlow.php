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

namespace CyrildeWit\LaravelFlow\Handler;

use Illuminate\Http\Request;
use CyrildeWit\LaravelFlow\Stage\StageInterface;
use CyrildeWit\LaravelFlow\Exceptions\StageDoesNotExists;
use CyrildeWit\LaravelFlow\Exceptions\StageAlreadyExists;

trait HandlesFlow
{
    /**
     * Display the flow's stage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function display(Request $request, string $slug = null)
    {
        try {
            if (null === $slug) {
                $stage = $this->flow()->firstOrLastProcessed();
            } else {
                $stage = $this->flow()->getStageBySlug($slug);
            }
        } catch (StageDoesNotExists $e) {
            return $this->sendStageDoesNotExistsResponse($request);
        }

        return $stage->display();
    }

    /**
     * Process the flows's stage.
     */
    public function process() {}

    /**
     * Get the s
     */
    protected function sendStageDoesNotExistsResponse(Request $request)
    {
        abort(404);
    }

    /**
     * Get the flow.
     *
     * @return
     */
    protected function flow()
    {
        throw new \Exception('Method `flow()` is missing from flow handler');
    }
}
