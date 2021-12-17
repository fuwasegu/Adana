<?php
namespace Adana\Tests;

use Adana\Generator;
use Exception;
use PHPUnit\Framework\TestCase;

class AdanaTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     * @throws Exception
     */
    public function canCreateRandomAdana(): void
    {
        $generator = new Generator();

        $name = $generator->setFullName(
            firstName: '世紀',
            firstKana: 'せいき',
            lastName: '堀田',
            lastKana: 'ほりた',
            middleName: 'アントニー',
            middleKana: 'あんとにー',
        );

        $nickname = $name->generateRandomAdana();

        dump($nickname);
        $this->assertTrue(true);
    }
}
