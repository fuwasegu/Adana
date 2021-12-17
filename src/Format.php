<?php

declare(strict_types=1);

namespace Adana;

use Adana\Libs\Str;

class Format
{
    /**
     * あだ名の生成パターン
     *
     * @return callable[]
     */
    public static function pattern(): array
    {
        return  [
            function (FullName $name): string {
                // 名前先頭2文字 ＋ ちゃん
                return Str::getInitialTwoLetters($name->firstName()->kana()) . 'ちゃん';
            },
            function (FullName $name): string {
                // 苗字先頭2文字 ＋ ちゃん
                return Str::getInitialTwoLetters($name->lastName()->kana()) . 'ちゃん';
            },
            function (FullName $name): ?string {
                // ミドルネーム先頭2文字 ＋ ちゃん
                if ($name->middleName() === null) {
                    return null;
                }

                return Str::getInitialTwoLetters($name->middleName()->kana()) . 'ちゃん';
            },
            function (FullName $name): string {
                // 名前先頭2文字 ＋ っち
                return Str::getInitialTwoLetters($name->firstName()->kana()) . 'っち';
            },
            function (FullName $name): ?string {
                // 名前(4文字以下) ＋ っち
                if (mb_strlen($name->firstName()->kana()) > 4) {
                    return null;
                }

                return $name->firstName()->kana() . 'っち';
            },
            function (FullName $name): string {
                // 苗字先頭2文字 ＋ っち
                return Str::getInitialTwoLetters($name->lastName()->kana()) . 'っち';
            },
            function (FullName $name): ?string {
                // ミドルネーム先頭2文字 ＋ っち
                if ($name->middleName() === null) {
                    return null;
                }

                return Str::getInitialTwoLetters($name->middleName()->kana()) . 'っち';
            },
            function (FullName $name): ?string {
                // ミキティー
                if (mb_strpos($name->firstName()->kana(), 'みき') === false) {
                    return null;
                }

                return 'ミキティー';
            },
            function (FullName $name): ?string {
                // 金次郎
                if (mb_strpos($name->lastName()->name(), '二宮') === false) {
                    return null;
                }

                return '金次郎';
            },
            function (FullName $name): ?string {
                // 名前の頭文字の母音が「i」だったら「ぃ」をつけて「ちゃん」
                if (Str::getVowel(Str::getInitialLetter($name->firstName()->kana())) !== 'i') {
                    return null;
                }

                return Str::getInitialLetter($name->firstName()->kana()) . 'ぃちゃん';
            },
            function (FullName $name): ?string {
                // ヨネ
                if (Str::getInitialLetter($name->lastName()->name()) !== '米') {
                    return null;
                }

                return 'ヨネ';
            },
            function (FullName $name): string {
                // 苗字頭文字2文字 ＋ 名前頭文字2文字
                return Str::getInitialTwoLetters($name->lastName()->kana()) .
                        Str::getInitialTwoLetters($name->firstName()->kana());
            },
            function (FullName $name): ?string {
                // リンダ
                if ($name->lastName()->name() !== '林田') {
                    return null;
                }

                return 'リンダ';
            },
            function (FullName $name): ?string {
                // もっちゃん
                if (Str::getTailLetter($name->lastName()->name()) !== '本') {
                    return null;
                }

                return 'もっちゃん';
            },
            function (FullName $name): ?string {
                // もっさん
                if (Str::getTailLetter($name->lastName()->name()) !== '本') {
                    return null;
                }

                return 'もっさん';
            },
            function (FullName $name): ?string {
                // うっちー
                if (Str::getInitialLetter($name->lastName()->name()) !== '内') {
                    return null;
                }

                return 'うっちー';
            },
            function (FullName $name): ?string {
                // つっちー
                if (Str::getInitialLetter($name->lastName()->name()) !== '土') {
                    return null;
                }

                return 'つっちー';
            },
        ];
    }
}
