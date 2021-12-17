<?php

declare(strict_types=1);

namespace Adana\Libs;

use Adana\Exceptions\MultipleCharactersException;
use Adana\Exceptions\NotHiraganaException;

class Str
{
    private const HIRAGANA_VOWEL_MAP = [
        'a' => 'あかさたなはまやらわ',
        'i' => 'いきしちにひみ',
        'u' => 'うくすつぬふむゆ',
        'e' => 'えけせてねへめ',
        'o' => 'おこそとのほもよを',
    ];

    /**
     * @throws MultipleCharactersException
     * @throws NotHiraganaException
     */
    public static function getVowel(string $character): string
    {
        if (mb_strlen($character) !== 1) {
            throw new MultipleCharactersException();
        }

        foreach (self::HIRAGANA_VOWEL_MAP as $vowel => $hiragana) {
            if (mb_strpos($hiragana, $character) !== false) {
                return $vowel;
            }
        }

        throw new NotHiraganaException();
    }

    public static function getInitialTwoLetters(string $string): string
    {
        return mb_substr($string, 0, 2);
    }

    public static function getInitialLetter(string $string): string
    {
        return mb_substr($string, 0, 1);
    }

    public static function getTailTowLetters(string $string): string
    {
        return mb_substr($string, -2);
    }

    public static function getTailLetter(string $string): string
    {
        return mb_substr($string, -1);
    }
}
