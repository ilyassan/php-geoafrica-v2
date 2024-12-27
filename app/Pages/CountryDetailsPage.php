<?php
class CountryDetailsPage extends BasePage
{
    public function index($countryId)
    {

        $country = Country::findWithLanguages($countryId);

        $cities = City::findCitiesByCountryId($countryId);
        $showedCities = [];
        $unShowedCities = [];
        foreach ($cities as $city) {
            if ($city["is_showed"]) {
                $showedCities[] = $city;
            } else {
                $unShowedCities[] = $city;
            }
        }

        $languages = Language::all();

        $this->render("country-details", compact("country", "showedCities", "unShowedCities", "languages"));
    }

    public function update($countryId)
    {

        if (user()->isVisitor()) {
            redirect("");
        }

        $population = filter_input(INPUT_POST, "population", FILTER_SANITIZE_SPECIAL_CHARS);
        $language_id = filter_input(INPUT_POST, "id_language", FILTER_SANITIZE_NUMBER_INT);

        $population = trim($population);
        $language_id = trim($language_id);

        if (empty($population) || empty($language_id)) {
            flash("error", "All field are required");
            redirect("country/$countryId");
        }
        $country = Country::find($countryId);
        if (!$country) {
            flash("error", "No Country found with this id");
            redirect("");
        }
        $country->setPopulation($population);
        $country->setLanguageId($language_id);
        if ($country->update()) {
            flash("success", "Country updated successfully");
            redirect("country/$countryId");
        }
    }

    public function delete($countryId)
    {
        $countryId = htmlspecialchars($countryId);
        $country = Country::find($countryId);
        if (!$country) {
            flash("error", "Country does not exist!");
            redirect("");
        }
        $country->setIsShowed(0);
        if ($country->update()) {
            flash("success", "Country delete successfully!");
            redirect("");
        }
    }

    public function addCityToCountry()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $cityId = intval($data["id"]);

        if (City::attachCityToCountry($cityId)) {
            echo json_encode(["success" => true, "id_received" => $cityId]);
        } else {
            echo json_encode(["error" => true, "id_received" => $cityId]);
        }
    }

    public function removeCityFromCountry()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $cityId = intval($data["id"]);

        if (City::unattachCityToCountry($cityId)) {
            echo json_encode(["success" => true, "id_received" => $cityId]);
        } else {
            echo json_encode(["error" => true, "id_received" => $cityId]);
        }
    }
}
