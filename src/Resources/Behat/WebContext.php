<?php

namespace Resources\Behat;

use Behat\MinkExtension\Context\MinkContext;

/**
 * Behat context class.
 */
class WebContext extends MinkContext
{
    /**
     * @When I click :text
     */
    public function iClick(string $text)
    {
        $this->clickLink($text);
    }

    /**
     * @When I visit :arg1
     */
    public function iVisit(string $page)
    {
        $this->visit($page);
    }

}
