<?php


class Format {

    public function formatDate($data) {

        if ($data == NULL){
            return NULL;
        }

        $originalDate = $data;

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        return strftime('%A, %d de %B de %Y', strtotime($originalDate));

        

        
        
    }

    public function formatTime($data) {

        if ($data == NULL){
            return NULL;
        }

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

    public function roundTripValidate($data, $sourceDate, $destinyDate, $destinyHour) {

        if ($sourceDate == $destinyDate) {
            $data = "Volta no mesmo dia.";
            return $data;
        } else {
            return $this->roundTripFormat($data);
        }
    }

    public function formatEvaluation($data) {
        if ($data == 0 || $data == NULL){
            return "0 avaliações";
        } elseif ($data == 1) {
            return $data . " avaliação";
        } else {
            return $data . " avaliações";
        }
    }



}

