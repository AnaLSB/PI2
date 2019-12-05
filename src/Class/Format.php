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
        if( $data == 0 || $data == null){
            return "Não há avaliações";
        } elseif ($data < 20 || $data == NULL){
            return "BAIXA";
        } elseif ($data >= 20) {
            return "MÉDIA";
        } elseif($data >= 50) {
            return "ALTA";
        }
    }

    public function formatUcWords($data) {
        $UcWords = ucwords($data);

        return $UcWords;
    }

    public function formatPlaces($data) {
        if($data <= 0){
            return "Não há mais vagas";
        } elseif ($data == 1) {
            return $data . " vaga";
        } else {
            return $data . " vagas";
        }
    }

    public function verifyState($data){

        if ($data == 2){

           echo "<div class='right margin-top'>
                 <span style='color: rgb(126, 179, 179); font-size: 18px; font-weight: bold'>Solicitação Pendente</span>
                </div>";

        } elseif($data == 1){
            echo "<div class='right margin-top'>
                 <span style='color: rgb(126, 179, 179); font-size: 18px; font-weight: bold'>Solicitação Aceita</span>
                </div>";

        } elseif($data == 0 && $data != null) {
                
            echo "<div class='right margin-top'>
                    <span style='color: rgb(126, 179, 179); font-size: 18px; font-weight: bold'>Solicitação Recusada</span>
                </div>";

        }
    }



}

