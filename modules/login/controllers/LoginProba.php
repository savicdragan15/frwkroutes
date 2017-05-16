<?php
namespace Modules\login;
use Modules\models\login\loginModel as loginModel;
class LoginProba extends \baseController{
    public function index()
    {
        var_dump(new loginModel());
        echo "Login controller namespace";
    }
}

