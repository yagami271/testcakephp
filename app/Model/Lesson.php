<?php
/**
 * Created by PhpStorm.
 * User: IAB
 * Date: 07/08/2018
 * Time: 21:00
 */

class Lesson extends AppModel
{
    public $validate = array(
        'libelle' => array(
            'rule' => 'notBlank'
        )
    );

    public $hasMany = array(
        'Mark'=>array('className'=>'Mark','dependent'=>true)
    );
}