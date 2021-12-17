<?php

declare(strict_types=1);

namespace Adana\NameComponents;

use Adana\Exceptions\NotHiraganaException;
use Adana\Exceptions\NotJapaneseCharacterException;

class Name
{
    /**
     * 日本語文字列（全角ひらがな・カタカナ・漢字）
     * なお，漢字の正規表現は厳密なものではない．
     */
    private const PATTERN_JAPANESE = '/^[ぁ-んァ-ン一-龠]/';

    /**
     * 日本語文字列（全角ひらがな）
     */
    private const PATTERN_ONLY_HIRAGANA = '/^[ぁ-ん]/';

    /**
     * @throws NotJapaneseCharacterException
     * @throws NotHiraganaException
     */
    public function __construct(
        private string $name,
        private string $kana
    ) {
        if (! preg_match(self::PATTERN_JAPANESE, $name)) {
            throw new NotJapaneseCharacterException($name);
        }
        if (! preg_match(self::PATTERN_ONLY_HIRAGANA, $kana)) {
            throw new NotHiraganaException($kana);
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function kana(): string
    {
        return $this->kana;
    }
}
