<?php

/**
 * dat actions.
 *
 * @package    mediaSCORE
 * @subpackage dat
 * @author     Nouman Tayyab
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class datActions extends sfActions {

    /**
     * Generate DAT form
     * 
     * @param sfWebRequest $request 
     */
    public function executeNew(sfWebRequest $request) {
        $this->form = new DATForm();
    }

    /**
     * DAT Post form process
     * 
     * @param sfWebRequest $request 
     */
    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new DATForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    /**
     * DAT edit Form
     * 
     * @param sfWebRequest $request 
     */
    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($dat = Doctrine_Core::getTable('DAT')->find(array($request->getParameter('id'))), sprintf('Object dat does not exist (%s).', $request->getParameter('id')));
        $this->form = new DATForm($dat);
    }

    /**
     * DAT Post Edit form Process
     * 
     * @param sfWebRequest $request 
     */
    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($dat = Doctrine_Core::getTable('FormatType')->find(array($request->getParameter('id'))), sprintf('Object dat does not exist (%s).', $request->getParameter('id')));

        $dat->setType(6);
        $dat->save();
        $dat = Doctrine_Core::getTable('DAT')->find(array($request->getParameter('id')));
        $this->form = new DATForm($dat);


        $validateForm = $this->processForm($request, $this->form);

        if ($validateForm && isset($validateForm['form']) && $validateForm['form'] == true) {
            echo $validateForm['id'];
            exit;
        } else {
            $this->setTemplate('edit');
        }
    }

    /**
     * Process and Validate Form
     * 
     * @param sfWebRequest $request
     * @param sfForm $form
     * @return boolean if form is not validated
     * @return integer if form is validated then return id
     */
    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $dat = $form->save();
            $saveReturnId = array('form' => true, 'id' => $dat->getId());
            return $saveReturnId;
        }
        return false;
    }

}
