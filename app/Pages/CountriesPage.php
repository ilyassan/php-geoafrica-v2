<?php

class CountriesPage extends BasePage
{
    public function index()
    {
        $countries = Country::allShowed();
        $languages = Language::all();
        $this->render("countries", compact("countries", "languages"));
    }
};
