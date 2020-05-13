<?php

namespace App\Http\Controllers;

use Scriptotek\GoogleBooks\GoogleBooks;

class googleBooksController extends Controller
{
    public function index()
    {
        $books = new GoogleBooks(['key' => 'AIzaSyAffD71XmrVDYHpotrSTOBsWfomGYMrYGo']);

        $volume = $books->volumes->byIsbn('9789577432995');

        $data = json_decode($volume, true);

        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
