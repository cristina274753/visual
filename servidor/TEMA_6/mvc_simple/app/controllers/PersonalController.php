<?php

namespace cristina\app\controllers;

use cristina\app\models\PersonalModel;

class PersonalController extends Controller
{
    public function index(): void
    {
        $model = new PersonalModel();
        $personal = $model->getAll();

        $this->view('personal_vista', [
            'personal' => $personal
        ]);
    }
}
