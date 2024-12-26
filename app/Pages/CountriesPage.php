<?php

class CountriesPage extends BasePage
{
    public function index()
    {
        $this->render("countries");
    }
    public function details($countryId)
    {

        $country = Country::findWithLanguages($countryId);

        $cities = City::findCitiesByCountryId($countryId);
        $showedCities = [];
        $unShowedCities = [];
        foreach($cities as $city){
            if ($city["is_showed"]) {
                $showedCities[] = $city;
            }else{
                $unShowedCities[] = $city;
            }
        }

        $languages = Language::all();
        
        $this->render("country-details", compact("country", "showedCities", "unShowedCities", "languages"));
    }
    public function create()
    {
        $this->render("addCountry");
    }
};
