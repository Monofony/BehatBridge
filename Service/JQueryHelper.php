<?php

/*
 * This file is part of the Monofony package.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Monofony\Bridge\Behat\Service;

use Behat\Mink\Element\DocumentElement;
use Behat\Mink\Session;

abstract class JQueryHelper
{
    public static function waitForAsynchronousActionsToFinish(Session $session): void
    {
        $session->wait(1000, 'typeof jQuery !== "undefined" && 0 === jQuery.active');
    }

    public static function waitForFormToStopLoading(DocumentElement $document, int $timeout = 10): void
    {
        $form = $document->find('css', 'form');
        $document->waitFor($timeout, function () use ($form) {
            return !$form->hasClass('loading');
        });
    }
}
