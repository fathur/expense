<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 12.30
 */

namespace App\Libraries\LanguageProcess;


use App\Model\Verb;

class ObtainLocation extends AbstractObtainer implements Obtainer
{
    public function startKey(): array
    {
        return ['di'];
    }

    public function stopKey(): array
    {
        $verbs = Verb::pluck('name')->toArray();

        $stopKeys = ['mengeluarkan','mendapatkan'];

        return array_merge($verbs, $stopKeys);
    }
}
