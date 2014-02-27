<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PeticionesWebService {

    /**
     * A traeUsuarioDesdeSI method.
     * @param string username
     * @param string dv
     * @return string respuesta
     */
    public static function traeUsuarioDesdeSI($username, $dv) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            return $client->traeUsuarioDesdeSI(utf8_encode($username), utf8_encode($dv));
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return string[] datos
     */
    public static function obtieneParametrosGenerales($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            return $client->obtieneParametrosGenerales($campus);
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return mixed[] datos
     */
    public static function obtieneNoticias($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            $categoria = "2"; //actividad de titulacion
            return $client->obtieneNoticia($categoria, $campus);
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return string
     */
    public static function obtieneCorreoSecretaria($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            $arreglo = $client->obtieneParametrosGenerales($campus);
            return $arreglo['correo_secretaria'];
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return string
     */
    public static function obtieneCorreoJefe($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            $arreglo = $client->obtieneParametrosGenerales($campus);
            return $arreglo['correo_jefe_carrera'];
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return string
     */
    public static function obtieneNombreJefe($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            $arreglo = $client->obtieneParametrosGenerales($campus);
            return $arreglo['nombre_jefe_carrera'];
        } catch (Exception $r) {
            return $r;
        }
    }

    /**
     * A obtieneParametrosGenerales method.
     * @param string campus
     * @return string
     */
    public static function obtieneNombreDirectorDep($campus) {
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        try {
            $client = new SoapClient(Yii::app()->params['urlWebService']);
            $arreglo = $client->obtieneParametrosGenerales($campus);
            return $arreglo['nombre_director_departamento'];
        } catch (Exception $r) {
            return $r;
        }
    }

}

?>
