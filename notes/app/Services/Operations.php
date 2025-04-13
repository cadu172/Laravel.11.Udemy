<?php

namespace App\Services;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    /**
     * Encrypt the given ID.
     *
     * @param  int  $id
     * @return string
     */
    public static function decryptId($id) {
        try {
            $id = Crypt::decrypt($id);
        }
        catch (DecryptException $e ) {
            //return redirect()->route("home");
            $id = null;
        }
        return $id;
    }
}
