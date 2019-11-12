<?php


class Format {

    public function formatDate($data) {

        $originalDate = $data;

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        return strftime('%A, %d de %B de %Y', strtotime($originalDate));

        
        
    }

    public function formatTime($data) {

        $originalTime = $data;
        $newTime = date("H:i", strtotime($originalTime));

        return $newTime;
    }

    public function roundTripFormat($data) {
        if ($data == 'on') {
            $data = "Ida e volta";
            return $data;
        }

    }




}

