<?php

class CountriesPage extends BasePage
{
    public function index()
    {
        $countries = Country::allShowed();
        $this->render("countries", compact("countries"));
    }
};
