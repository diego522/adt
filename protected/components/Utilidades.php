<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilidades
 *
 * @author w7600
 */
class Utilidades {

    
    public static $cantidadDiasMAXRevisionInformante=15;
    
    //put your code here
    public static $arrayPuntosEvaluacion = array(
        '' => 'Seleccione',
        '0' => 'Sin evaluar',
        '2' => 'Definitivamente no (2)',
        '4' => 'En escasa medida (4)',
        '6' => 'Moderadamente (6)',
        '8' => 'En gran Medida (8)',
        '10' => 'Definitivamente si (10)',);
    public static $arrayPuntosEvaluacionDefensa = array(
        '' => 'Seleccione',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        );
    public static $arrayEquivalenciaNota = array(
        '0' => 0,
        '1' => 1.0,
        '2' => 1.1,
        '3' => 1.1,
        '4' => 1.2,
        '5' => 1.2,
        '6' => 1.3,
        '7' => 1.4,
        '8' => 1.4,
        '9' => 1.5,
        '10' => 1.5,
        '11' => 1.6,
        '12' => 1.7,
        '13' => 1.8,
        '14' => 1.8,
        '15' => 1.9,
        '16' => 1.6,
        '17' => 2.0,
        '18' => 2.0,
        '19' => 2.1,
        '20' => 2.1,
        '21' => 2.2,
        '22' => 2.3,
        '23' => 2.3,
        '24' => 2.4,
        '25' => 2.4,
        '26' => 2.5,
        '27' => 2.6,
        '28' => 2.6,
        '29' => 2.7,
        '30' => 2.7,
        '31' => 2.8,
        '32' => 2.9,
        '33' => 2.9,
        '34' => 3.0,
        '35' => 3.0,
        '36' => 3.1,
        '37' => 3.2,
        '38' => 3.2,
        '39' => 3.3,
        '40' => 3.3,
        '41' => 3.4,
        '42' => 3.5,
        '43' => 3.5,
        '44' => 3.6,
        '45' => 3.6,
        '46' => 3.7,
        '47' => 3.8,
        '48' => 3.8,
        '49' => 3.9,
        '50' => 3.9,
        '51' => 4.0,
        '52' => 4.0,
        '53' => 4.1,
        '54' => 4.2,
        '55' => 4.2,
        '56' => 4.3,
        '57' => 4.4,
        '58' => 4.4,
        '59' => 4.5,
        '60' => 4.6,
        '61' => 4.6,
        '62' => 4.7,
        '63' => 4.7,
        '64' => 4.8,
        '65' => 4.9,
        '66' => 4.9,
        '67' => 5.0,
        '68' => 5.0,
        '69' => 5.1,
        '70' => 5.2,
        '71' => 5.2,
        '72' => 5.3,
        '73' => 5.3,
        '74' => 5.4,
        '75' => 5.5,
        '76' => 5.5,
        '77' => 5.6,
        '78' => 5.7,
        '79' => 5.7,
        '80' => 5.8,
        '81' => 5.8,
        '82' => 5.9,
        '83' => 6.0,
        '84' => 6.0,
        '85' => 6.1,
        '86' => 6.1,
        '87' => 6.2,
        '88' => 6.3,
        '89' => 6.3,
        '90' => 6.4,
        '91' => 6.4,
        '92' => 6.5,
        '93' => 6.6,
        '94' => 6.6,
        '95' => 6.7,
        '96' => 6.8,
        '97' => 6.8,
        '98' => 6.9,
        '99' => 6.9,
        '100' => 7.0,
    );

    public static function sumaDiasHabilesAfecha($fecha, $dias) {
        //0 domingo - 7 sabado
        $contadorDias = 0;
        $nuevafecha;
        while ($dias > 0) {
            $contadorDias++;
            $nuevafecha = strtotime('+' . $contadorDias . ' day', strtotime($fecha));
            if (date('w', $nuevafecha) != 0 && date('w', $nuevafecha) != 7) {
                $dias--;
            }
        }
        return date('Y-m-d H:i:s', $nuevafecha);
    }
    
    public static function SendMail($asunto, $mensaje, $para) {
        $message = new YiiMailMessage;
        $message->subject = $asunto ? $asunto : 'Asunto';
        $mensaje.="<br/>--<br/>Atte.<br/> <b>Administrador de sistemas de Ingeniería Civil en Informática UBB<b/><br/>" . Yii::app()->getBaseUrl(true) . " <br/> Éste correo no debe ser respondido.";
        $message->setBody($mensaje, 'text/html'); //codificar el html de la vista
        $message->from = (Yii::app()->params['adminEmail']); // alias del q envia
        $message->setTo($para); // a quien se le envia
        Yii::app()->mail->send($message);
    }

}

?>
