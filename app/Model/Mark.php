<?php
/**
 * Created by PhpStorm.
 * User: IAB
 * Date: 07/08/2018
 * Time: 21:00
 */

class Mark extends AppModel
{
    public $validate = array(
        'note' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'required' => true,
                'message' => 'Que des chiffres SVP !'
            ),
            'between' => array(
                'rule' => array('lengthBetween', 0, 20),
                'message' => 'La note peut être en 0 et 20 seulement !'
            )
        ),
        'student_id' => array(
            'rule' => 'notBlank'
        ),
        'lesson_id' => array(
            'rule' => 'notBlank'
        )
    );

    public $belongsTo = array('Lesson' => array(
        'className' => 'Lesson'
    )
    , 'Student' => array(
            'className' => 'Student'));
}