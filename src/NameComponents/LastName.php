<?php

declare(strict_types=1);

namespace Adana\NameComponents;

use Adana\Exceptions\NotHiraganaException;
use Adana\Exceptions\NotJapaneseCharacterException;

class LastName extends Name
{
    /**
     * @throws NotJapaneseCharacterException
     * @throws NotHiraganaException
     */
    public function __construct(
        private string $name,
        private string $kana
    ) {
        parent::__construct($name, $kana);
    }
}
