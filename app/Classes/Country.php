<?php
class Country extends BaseClass
{

    private $id;
    private $name;
    private $population;
    private $shortname;
    private $description;
    private $image_url;
    private $x;
    private $y;
    private $isShowed;
    private $language;
    private $language_id;

    public function __construct($id, $name, $population, $language, $language_id, $shortname, $description, $image_url, $x, $y, $isShowed)
    {
        $this->id = $id;
        $this->name = $name;
        $this->population = $population;
        $this->language = $language;
        $this->language_id = $language_id;
        $this->shortname = $shortname;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->x = $x;
        $this->y = $y;
        $this->isShowed = $isShowed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPopulation()
    {
        return $this->population;
    }

    public function getShortname()
    {
        return $this->shortname;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImageUrl()
    {
        return $this->image_url;
    }

    public function getCordinates()
    {
        return [$this->x, $this->y];
    }

    public function language()
    {
        return $this->language;
    }

    public function languageId()
    {
        return $this->language_id;
    }

    public static function allShowed()
    {
        $sql = "SELECT * FROM countries
                    WHERE is_showed = 1";
        self::$db->query($sql);
        self::$db->execute();

        $result = self::$db->results();
        $countries = [];
        foreach ($result as $country) {
            $countries[] = new self($country["id"], $country["name"], $country["population"], null, $country["id_language"], $country["shortname"], $country["description"], $country["image_url"], $country["x"], $country["y"], $country["is_showed"]);
        }
        return $countries;  
    }

    public static function allUnshowed()
    {
        $sql = "SELECT * FROM countries
                    WHERE is_showed = 0";
        self::$db->query($sql);
        self::$db->execute();

        $result = self::$db->results();
        $countries = [];
        foreach ($result as $country) {
            $countries[] = new self($country->id, $country->name, $country->population, null ,$country->id_language, $country->shortname, $country->description, $country->image_url, $country->x, $country->y, $country->is_showed);
        }
    }

    public static function findWithLanguages(int $id)
    {
        $sql = "SELECT countries.*, l.id as id_language, l.name as language
                    FROM countries
                    JOIN languages l ON l.id = countries.id_language
                    WHERE countries.id = :id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        $result = self::$db->single();

        $language = new Language($result->id_language, $result->language);
        return new self($result->id, $result->name, $result->population, $language, $language->getId(), $result->shortname, $result->description, $result->image_url, $result->x, $result->y, $result->is_showed);
    }
}
