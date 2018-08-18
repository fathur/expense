<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 12.42
 */

namespace App\Libraries\LanguageProcess;


interface Obtainer
{
    public function startKey(): array;

    public function stopKey(): array;

//    public function patterns(): array;

    public function extract();

}
