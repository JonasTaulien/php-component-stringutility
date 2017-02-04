<?php
namespace JonasRudolph\PHPComponents\StringUtility\Tests\Implementation;

use JonasRudolph\PHPComponents\StringUtility\Implementation\StringUtility;
use JonasRudolph\PHPComponents\StringUtility\Tests\Base\StringUtilityInterfaceTest;


class StringUtilityTest extends StringUtilityInterfaceTest
{
    protected function createNewStringUtilityInstance()
    {
        return new StringUtility();
    }
}