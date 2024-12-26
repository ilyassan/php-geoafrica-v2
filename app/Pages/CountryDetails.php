<?php
    class CountryDetails extends BasePage
    {
        public function index($countryId)
        {
            $this->render("country-details");
        }
    }