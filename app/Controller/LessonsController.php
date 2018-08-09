<?php
/**
 * Created by PhpStorm.
 * User: IAB
 * Date: 07/08/2018
 * Time: 21:01
 */

class LessonsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    /**
     * @param $mark
     * @return mixed
     * Check exist ROW
     */
    private function _existRow($lesson)
    {
        $conditions = array(
            'Lesson.libelle' => $lesson['Lesson']['libelle']
        );
        return $this->Lesson->hasAny($conditions);
    }


    /**
     * Afficher la liste des unités d'enseignements
     */
    public function index()
    {
        $this->set('lessons', $this->Lesson->find('all',array('order' => array('Lesson.libelle'))));
    }


    /**
     * @return CakeResponse|null
     * Ajouter une unité d'enseinement
     */
    public function add()
    {
        if ($this->request->is('post')) {
            if($this->_existRow($this->request->data)){
                $this->Flash->error(__('Exist déjà ! '));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Lesson->create();
            if ($this->Lesson->save($this->request->data)) {
                $this->Flash->success(__('Ajout unité d\'enseignement avec succès '));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Erreur ajout unité d\'enseignement ! '));
        }
    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Mise à jour unité d'enseignement
     */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid unité d\'enseignement'));
        }
        $lesson = $this->Lesson->findById($id);
        if (!$lesson) {
            throw new NotFoundException(__('Invalid unité d\'enseignement'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Lesson->id = $id;
            if ($this->Lesson->save($this->request->data)) {
                $this->Flash->success(__('Mise à jour unité d\'enseignement avec succès'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Echec Mise à jour unité d\'enseignement ! '));
        }
        if (!$this->request->data) {
            $this->request->data = $lesson;
        }
    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Supprimer une unité d'enseignement
     */
    public function delete($id = null){
        if(!$id){
            throw new NotFoundException(__('Unité d\'enseignement introuvable'));
        }
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Lesson->delete($id)){
            $this->Flash->success(__('Unité d\'enseignement supprimé avec succès'));
        }else{
            $this->Flash->error(__('Echec suppression unité d\'enseignement'));
        }
        return $this->redirect(array('action'=>'index'));
    }
}