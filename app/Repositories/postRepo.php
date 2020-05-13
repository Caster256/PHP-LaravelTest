<?php
namespace App\Repositories;

use App\Models\Entities\updateModel as u_m;

class postRepo
{
/*    private $u_m;
    function __construct(u_m $u_m)
    {
        $this->u_m = $u_m;
    }*/

    public function storeData($data)
    {
        $affect = u_m::query()->updateOrCreate(
            ['title' => $data['title']],
            ['content' => $data['content']]
        );
        return $affect;
    }
}
