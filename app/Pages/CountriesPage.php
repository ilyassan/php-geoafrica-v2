<?php

class CountriesPage extends BasePage
{
    public function about()
    {
        $this->render("countries");
    }

    public function createCountry()
    {
        $this->render("addCountry");
    }
};
