<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 12.52
 */

namespace App\Libraries\LanguageProcess;


class ObtainReceiver extends AbstractObtainer implements Obtainer
{


    public function startKey(): array
    {
        return ['ke'];
    }

    public function stopKey(): array
    {
        return ['sebesar'];

    }
//
//    public function extract()
//    {
//        $splits = explode(' ', $this->string);
//
//        $expectedWords = [];
//        if (in_array($this->startKey(), $splits)) {
//            $indexKey = null;
//
//            foreach ($splits as $i => $item) {
//                if ($item == $this->startKey()) {
//
//                    $indexKey = $i;
//                }
//            }
//
//            for ($i = $indexKey + 1; $i < count($splits); $i++) {
//
//                if (in_array($splits[$i], $this->stopKey()))
//                    break;
//
//                $expectedWords[] = $splits[$i];
//            }
//        }
//
//        return implode(' ', $expectedWords);
//    }
}
