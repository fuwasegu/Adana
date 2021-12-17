<?php

declare(strict_types=1);

namespace Adana;

use Adana\NameComponents\FirstName;
use Adana\NameComponents\LastName;
use Adana\NameComponents\MiddleName;
use Exception;

class FullName
{
    private FirstName $firstName;
    private LastName $lastName;
    private ?MiddleName $middleName;

    /**
     * @throws Exceptions\NotJapaneseCharacterException
     * @throws Exceptions\NotHiraganaException
     * @throws Exception
     */
    public function __construct(
        string $firstName,
        string $firstKana,
        string $lastName,
        string $lastKana,
        ?string $middleName = null,
        ?string $middleKana = null
    ) {
        $this->firstName = new FirstName($firstName, $firstKana);
        $this->lastName = new LastName($lastName, $lastKana);

        if ($middleName !== null and $middleKana !== null) {
            $this->middleName = new MiddleName($middleName, $middleKana);
        } elseif ($middleName !== null xor $middleKana !== null) {
            throw new Exception('Name and kana must both be null or string.');
        } else {
            $this->middleName = null;
        }
    }

    public function firstName(): FirstName
    {
        return $this->firstName;
    }

    public function lastName(): LastName
    {
        return $this->lastName;
    }

    public function middleName(): ?MiddleName
    {
        return $this->middleName;
    }
}
