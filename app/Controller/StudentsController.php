<?php
/**
 * Created by PhpStorm.
 * User: IAB
 * Date: 07/08/2018
 * Time: 21:01
 */

class StudentsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    /**
     * Afficher la liste des étudiants
     */
    public function index()
    {
        $this->set('students', $this->Student->find('all',array('order' => array('Student.nom'))));
    }

    /**
     * @return CakeResponse|null
     * Ajouter un étudiant
     */
    public function add()
    {

        if ($this->request->is('post')) {
            $this->Student->create();

            if($this->request->data['Student']['date_naissance']['year']>2000 || $this->request->data['Student']['date_naissance']['year']<1938 ){
                $this->Flash->error(__('Erreur date ! '));
                return $this->redirect(array('action' => 'index'));
            }
            if ($this->Student->save($this->request->data)) {
                $this->Flash->success(__('Ajout étudiant avec succès '));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Erreur ajout étudiant ! '));
        }
    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Mise à jour étudiant
     */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid étudiant'));
        }
        $student = $this->Student->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid étudiant'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if($this->request->data['Student']['date_naissance']['year']>2000 || $this->request->data['Student']['date_naissance']['year']<1938 ){
                $this->Flash->error(__('Erreur date ! '));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Student->id = $id;
            if ($this->Student->save($this->request->data)) {
                $this->Flash->success(__('Mise à jour étudiant avec succès'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Echec Mise à jour étudiant ! '));
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
    }

    /**
     * @param null $id
     * @return CakeResponse|null
     * Suppression étudiant
     */
    public function delete($id = null){
        if(!$id){
            throw new NotFoundException(__('Etudiant introuvable'));
        }
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Student->delete($id)){
            $this->Flash->success(__('Etudiant supprimé avec succès'));
        }else{
            $this->Flash->error(__('Echec suppression étudiant'));
        }
        return $this->redirect(array('action'=>'index'));
    }


}