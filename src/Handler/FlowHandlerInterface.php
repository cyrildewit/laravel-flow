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

use CyrildeWit\LaravelFlow\Stage\StageInterface;

interface FlowHandlerInterface
{
    /**
     * Display the flow's stage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function display(Request $request, string $slug = nul);

    /**
     * Process the flows's stage.
     */
    public function process();
}
