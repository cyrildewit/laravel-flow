<?php

namespace CyrildeWit\LaravelFlow\Tests\Support\TestStages;

use Illuminate\Http\Request;
use CyrildeWit\LaravelFlow\Stage\AbstractStage;

class AccountInformation extends AbstractStage
{
    /**
     * Display the account information stage.
     *
     * @return \Illuminate\Http\Response
     */
    public function display(Request $request) {
        //
    }

    /**
     *
     */
    public function process(Request $request)
    {
        //
    }

    public function isValid(Request $request)
    {
        return false;
    }
}
