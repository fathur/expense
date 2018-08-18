<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 13.22
 */

namespace App\Libraries\LanguageProcess;


class ObtainReason extends AbstractObtainer implements Obtainer
{

    public function startKey(): array
    {
        return [
            'karena'
        ];
    }

    public function stopKey(): array
    {
        return [];
    }
}
