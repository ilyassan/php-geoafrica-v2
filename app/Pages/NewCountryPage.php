<?php

class NewCountryPage extends BasePage
{
    public function index()
    {
        if (user()->isVisitor()) {
            redirect("");
        }

        $continents = Continent::all();
        $unShowedCountries = Country::allUnshowed();
        $languages = Language::all();
        
        $this->render("addCountry", compact("continents", "unShowedCountries", "languages"));
    }

    public function countryCities($id) {
        $countryCities = City::findCitiesByCountryId($id);
        echo json_encode($countryCities);
    }

    public function create()
    {
        if (user()->isVisitor()) {
            redirect("");
        }

        $data = [
            "continentId" => filter_input(INPUT_POST, 'id_continent', FILTER_SANITIZE_NUMBER_INT),
            "countryId" => filter_input(INPUT_POST, 'id_country', FILTER_SANITIZE_NUMBER_INT),
            "population" => filter_input(INPUT_POST, 'population', FILTER_SANITIZE_NUMBER_INT),
            "languageId" => filter_input(INPUT_POST, 'id_language', FILTER_SANITIZE_NUMBER_INT),
            "citiesIds" => array_map('intval', json_decode($_POST['ids_cities'], true))
        ];

        $errors = [
            "continentId_err" => "",
            "countryId_err" => "",
            "population_err" => "",
            "languageId_err" => ""
        ];

        if (empty($data['continentId'])) {
            $errors['continentId_err'] = 'Please select a continent.';
        }
        if (empty($data['countryId'])) {
            $errors['countryId_err'] = 'Please select a country.';
        }
        if (!empty($data['population']) && $data['population'] <= 0) {
            $errors['population_err'] = 'Please enter a valid country population.';
        }
        if (empty($data['languageId'])) {
            $errors['languageId_err'] = 'Please select the country language.';
        }

        if (empty($errors['continentId_err']) && empty($errors['countryId_err']) && empty($errors['population_err']) && empty($errors['languageId_err'])) {
            
            $country = Country::find($data['countryId']);
            if (!empty($data['population'])) {
                $country->setPopulation($data['population']);
            }
            $country->setLanguageId($data['languageId']);
            $country->setIsShowed(1);

            if ($country->update() && City::showCities($data['citiesIds'])) {
                flash("success", "Country created successfully.");
                redirect("");
            }else{
                die("Someting went wrong");
            }
        }else{
            flash("error", array_first_not_null_value($errors));
            redirect('country/create');
        }
    }
};
