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

namespace CyrildeWit\LaravelFlow\Tests\Feature;

use CyrildeWit\LaravelFlow\Flow;
use CyrildeWit\LaravelFlow\Tests\TestCase;
use CyrildeWit\LaravelFlow\Stage\AbstractStage;
use CyrildeWit\LaravelFlow\Tests\Support\TestStages\ConfirmDetails;
use CyrildeWit\LaravelFlow\Tests\Support\TestStages\PaymentInformation;
use CyrildeWit\LaravelFlow\Tests\Support\TestStages\AccountInformation;
use CyrildeWit\LaravelFlow\Tests\Support\TestStages\PersonalInformation;

class FlowTest extends TestCase
{
    /** @test */
    public function it_can_return_the_stages()
    {
        $flow = new Flow();
        $flow->addStage('account-information', $accountInformation = new AccountInformation());
        $flow->addStage('personal-information', $personalInformation = new PersonalInformation());
        $flow->addStage('payment-information', $paymentInformation = new PaymentInformation());
        $flow->addStage('confirm-details', $confirmDetails = new ConfirmDetails());

        $this->assertEquals(
            [
                'account-information' => $accountInformation,
                'personal-information' => $personalInformation,
                'payment-information' => $paymentInformation,
                'confirm-details' => $confirmDetails,
            ],
            $flow->getStages()
        );
    }

    /** @test */
    public function it_can_set_the_stages()
    {
        $flow = new Flow();
        $flow->setStages([
            'account-information' => $accountInformation = new AccountInformation(),
            'personal-information' => $personalInformation = new PersonalInformation(),
            'payment-information' => $paymentInformation = new PaymentInformation(),
            'confirm-details' => $confirmDetails = new ConfirmDetails(),
        ]);

        $this->assertEquals(
            [
                'account-information' => $accountInformation,
                'personal-information' => $personalInformation,
                'payment-information' => $paymentInformation,
                'confirm-details' => $confirmDetails,
            ],
            $flow->getStages()
        );
    }

    /** @test */
    public function it_can_determine_if_a_stage_exists_by_name()
    {
        $flow = new Flow();
        $flow->addStage('account-information', new AccountInformation());

        $this->assertTrue($flow->hasStage('account-information'));
    }

    /** @test */
    public function it_can_count_the_stages()
    {
        $flow = new Flow();
        $flow->addStage('account-information', new AccountInformation());
        $flow->addStage('personal-information', new PersonalInformation());

        $this->assertEquals(2, $flow->countStages());
    }

    /** @test */
    public function it_can_return_the_ordered_stages()
    {
        $flow = new Flow();
        $flow->addStage('account-information', $accountInformation = new AccountInformation());
        $flow->addStage('personal-information', $personalInformation = new PersonalInformation());
        $flow->addStage('payment-information', $paymentInformation = new PaymentInformation());
        $flow->addStage('confirm-details', $confirmDetails = new ConfirmDetails());

        $this->assertEquals(
            [
                0 => $accountInformation,
                1 => $personalInformation,
                2 => $paymentInformation,
                3 => $confirmDetails,
            ],
            $flow->getOrderedStages()
        );
    }
}
