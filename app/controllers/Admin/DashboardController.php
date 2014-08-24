<?php

namespace Admin;

class DashboardController extends BaseController
{
    public function index()
    {
        $this->layout->content = \View::make('admin.dashboard.index');
    }

}
