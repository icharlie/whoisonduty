<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\Migrator;
use Laracasts\Behat\Context\DatabaseTransactions;
use PHPUnit_Framework_Assert as PHPUnit;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{


    use Migrator, DatabaseTransactions;

    /**
     * @Then I should be able to do something with Laravel
     */
    public function iShouldBeAbleToDoSomethingWithLaravel()
    {
        $environmentFileName = app()->environmentFile();
        $environmentName = env('APP_ENV');
        PHPUnit::assertEquals('.env.behat', $environmentFileName);
        PHPUnit::assertEquals('acceptance', $environmentName);
    }

    /**
     * @Given I create a user :arg1 :arg2
     */
    public function iCreateAUser($name, $email)
    {
        $this->visit('users/create');

        $this->fillField('name', $name);
        $this->fillField('email', $email);

        $this->pressButton('Create');
        // $this->printLastResponse();
    }

    /**
     * @Then I should have a new user
     */
    public function iShouldHaveANewUser()
    {
        PHPUnit::assertTrue(App\User::count() == 1);

        $this->assertPageAddress('users');
    }

    /**
     * @Then I should not have a new user
     */
    public function iShouldNotHaveANewUser()
    {
        PHPUnit::assertTrue(App\User::count() == 1);

        $this->assertPageAddress('users/create');
    }
}
