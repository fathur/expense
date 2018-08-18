<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 13.04
 */

namespace App\Libraries\LanguageProcess;


class ObtainDateTime extends AbstractObtainer implements Obtainer
{

    public function startKey(): array
    {
        return ['tanggal'];
    }

    public function stopKey(): array
    {
        return ['karena'];
    }
}
