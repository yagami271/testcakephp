<?php


class MarksController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    /**
     * @param $lessons
     * @return array
     * Génère un tableau assosiative pour selectionner une lesson
     */
    private function _customOptions($lessons)
    {
        $options = array();
        foreach ($lessons as $lesson) {
            $options[$lesson['Lesson']['id']] = $lesson['Lesson']['libelle'];
        }
        return $options;
    }

    /**
     * @param $mark
     * @return mixed
     * Vérifie si une note est déjà attribuer pour une matière X
     */
    private function _existRow($mark)
    {
        $conditions = array(
            'Mark.student_id' => $mark['Mark']['student_id'],
            'Mark.lesson_id' => $mark['Mark']['lesson_id']
        );
        return $this->Mark->hasAny($conditions);
    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Attribution de la note a un étudiant X
     */
    public function attribute($id = null)
    {
        $this->loadModel('Student');
        $this->loadModel('Lesson');

        if (!$id) {
            throw new NotFoundException(__('Invalid étudiant'));
        }
        $this->Student->unbindModel(
            array('hasMany' => array('Mark'))
        );
        $student = $this->Student->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid étudiant'));
        }
        $this->set('lessons', $this->_customOptions($this->Lesson->find('all', array('order' => array('Lesson.libelle')))));
        $this->set('student', $student);

        if ($this->request->is('post')) {
            // Ne pas attribuer une note qui existe déjà
            if ($this->_existRow($this->request->data)) {
                $this->Flash->error(__('Une note est déjà attribuée à cet étudiant pour cet matière'));
                return $this->redirect(array('action' => 'attribute', $id));
            }
            $this->Mark->create();
            if ($this->Mark->save($this->request->data)) {
                $this->Flash->success(__('Note attribuée avec succès '));
            } else {
                $this->Flash->error(__('Erreur attribution note ! '));
            }
            return $this->redirect(array('controller' => 'students', 'action' => 'index'));
        }

    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Affichage des notes pour un étudiant X
     */
    public function notes($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid étudiant'));
        }
        $student = $this->Mark->find('all',array('conditions'=>array('Mark.student_id'=>$id)));
        if (!$student) {
            $this->Flash->error(__('Cet étudiant n\'a pas encore de note '));
            return $this->redirect(array( 'action' => 'attribute',$id));
        }
        $this->set('notes', $student);
    }


}