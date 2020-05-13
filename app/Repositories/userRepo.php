<?php
    namespace App\Repositories;

    use App\Models\Entities\userModel as u_m;

    class userRepo
    {
        private $u_m;
        function __construct(u_m $u_m)
        {
            $this->u_m = $u_m;
        }

        public function getData()
        {
            $phone = $this->u_m::query()->find(1)->phone;
            return $phone;
        }
    }
