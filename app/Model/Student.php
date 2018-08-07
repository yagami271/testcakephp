<?php
/**
 * Created by PhpStorm.
 * User: IAB
 * Date: 07/08/2018
 * Time: 21:00
 */

class Student extends AppModel
{
    public $validate = array(
        'prenom' => array(
            'rule' => 'notBlank'
        ),
        'nom' => array(
            'rule' => 'notBlank'
        ),
        'date_naissance' => array(
            'rule' => 'notBlank'
        )
    );


}