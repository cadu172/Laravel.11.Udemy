<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) : void
    {
        echo "Hello from SingleActionController!";
        echo "<br>";
        echo $this->privateMethod();
        echo "<br>";
    }

    private function privateMethod() : String {
        return "This is a private method";
    }
}
