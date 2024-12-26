<?php

class CountriesPage extends BasePage
{
    public function index()
    {
        $this->render("countries");
    }
    public function details($countryId)
    {
        $this->render("country-details");
    }
    public function create()
    {
        $this->render("addCountry");
    }
};
