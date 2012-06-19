<?php

/**
 * soundopticaldisc actions.
 *
 * @package    mediaSCORE
 * @subpackage soundopticaldisc
 * @author     Nouman Tayyab
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class soundopticaldiscActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->sound_optical_discs = Doctrine_Core::getTable('SoundOpticalDisc')
                ->createQuery('a')
                ->execute();
    }

    public function executeShow(sfWebRequest $request) {
        $this->sound_optical_disc = Doctrine_Core::getTable('SoundOpticalDisc')->find(array($request->getParameter('id')));
        $this->forward404Unless($this->sound_optical_disc);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new SoundOpticalDiscForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new SoundOpticalDiscForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($sound_optical_disc = Doctrine_Core::getTable('SoundOpticalDisc')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disc does not exist (%s).', $request->getParameter('id')));
        $this->form = new SoundOpticalDiscForm($sound_optical_disc);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($sound_optical_disc = Doctrine_Core::getTable('FormatType')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disc does not exist (%s).', $request->getParameter('id')));

        $sound_optical_disc->setType(19);
        $sound_optical_disc->save();
        $sound_optical_disc = Doctrine_Core::getTable('SoundOpticalDisc')->find(array($request->getParameter('id')));
        $this->form = new SoundOpticalDiscForm($sound_optical_disc);

        $this->form->disableLocalCSRFProtection();
        $validateForm = $this->processForm($request, $this->form);

        if ($validateForm && isset($validateForm['form']) && $validateForm['form'] == true) {
            echo $validateForm['id'];
            exit;
        } else {
            $this->setTemplate('edit');
        }
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($sound_optical_disc = Doctrine_Core::getTable('SoundOpticalDisc')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disc does not exist (%s).', $request->getParameter('id')));
        $sound_optical_disc->delete();

        $this->redirect('soundopticaldisc/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $sound_optical_disc = $form->save();
            $saveReturnId = array('form' => true, 'id' => $sound_optical_disc->getId());
            return $saveReturnId;
//      $this->redirect('soundopticaldisc/edit?id='.$sound_optical_disc->getId());
        }
    }

}