<?php
// includes/TravelFilter.php

class TravelFilter
{
    private $hotelName;
    private $city;
    private $country;
    private $travelDate;
    private $duration;

    public function __construct($hotelName, $city, $country, $travelDate, $duration)
    {
        $this->hotelName = $hotelName;
        $this->city = $city;
        $this->country = $country;
        $this->travelDate = $travelDate;
        $this->duration = $duration;
    }

    // Métodos Getters
    public function getHotelName()
    {
        return $this->hotelName;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getTravelDate()
    {
        return $this->travelDate;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    // Métodos Setters
    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setTravelDate($travelDate)
    {
        $this->travelDate = $travelDate;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    // Método para realizar búsquedas personalizadas
    public static function searchTrips($filters, $trips)
    {
        return array_filter($trips, function ($trip) use ($filters) {
            $match = true;

            if (!empty($filters['hotelName']) && stripos($trip['hotelName'], $filters['hotelName']) === false) {
                $match = false;
            }
            if (!empty($filters['city']) && stripos($trip['city'], $filters['city']) === false) {
                $match = false;
            }
            if (!empty($filters['country']) && stripos($trip['country'], $filters['country']) === false) {
                $match = false;
            }
            if (!empty($filters['travelDate']) && $trip['travelDate'] != $filters['travelDate']) {
                $match = false;
            }
            if (!empty($filters['duration']) && $trip['duration'] != $filters['duration']) {
                $match = false;
            }

            return $match;
        });
    }
}
?>