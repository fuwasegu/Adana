<?php

declare(strict_types=1);

namespace Adana;

use Exception;

class Generator
{
    private FullName $fullName;

    private string $nickName;

    public function generateRandomAdana(): string
    {
        $nickName = Format::pattern()[array_rand(Format::pattern())]($this->fullName);

        if ($nickName === null) {
            $nickName = $this->generateRandomAdana();
        }

        $this->nickName = $nickName;

        return $this->nickName;
    }

    /**
     * @throws Exception
     */
    public function setFullName(
        string $firstName,
        string $firstKana,
        string $lastName,
        string $lastKana,
        ?string $middleName = null,
        ?string $middleKana = null
    ): static {
        $this->fullName = new FullName(
            firstName: $firstName,
            firstKana: $firstKana,
            lastName: $lastName,
            lastKana: $lastKana,
            middleName: $middleName,
            middleKana: $middleKana
        );

        return $this;
    }

    public function nickName(): string
    {
        return $this->nickName;
    }
}
