<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 12.40
 */

namespace App\Libraries\LanguageProcess;


class ObtainGiver extends AbstractObtainer implements Obtainer
{

    public function startKey(): array
    {
        return ['dari'];
    }

    public function stopKey(): array
    {
        return ['ke','sebesar'];
    }

    public function patterns(): array
    {
        return [
            'dari ... ke',
            'dari ... sebesar',

        ];
    }
}
