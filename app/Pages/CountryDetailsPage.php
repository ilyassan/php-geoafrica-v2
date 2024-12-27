<?php
    class CountryDetailsPage extends BasePage
    {
        public function index($countryId)
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
    
        public function addCityToCountry() {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            
            $cityId = intval($data["id"]);

            if (City::attachCityToCountry($cityId)) {
                echo json_encode(["success" => true, "id_received" => $cityId]);
            }else{
                echo json_encode(["error" => true, "id_received" => $cityId]);
            }
        }

        public function removeCityFromCountry() {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            
            $cityId = intval($data["id"]);

            if (City::unattachCityToCountry($cityId)) {
                echo json_encode(["success" => true, "id_received" => $cityId]);
            }else{
                echo json_encode(["error" => true, "id_received" => $cityId]);
            }
        }
    }