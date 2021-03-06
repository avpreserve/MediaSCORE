<?php

/**
 * soundopticaldisk actions.
 *
 * @package    mediaSCORE
 * @subpackage soundopticaldisk
 * @author     Nouman Tayyab
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 * @deprecated use soundopticaldisc 
 */
class soundopticaldiskActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sound_optical_disks = Doctrine_Core::getTable('SoundOpticalDisk')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sound_optical_disk = Doctrine_Core::getTable('SoundOpticalDisk')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sound_optical_disk);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SoundOpticalDiskForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SoundOpticalDiskForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sound_optical_disk = Doctrine_Core::getTable('SoundOpticalDisk')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disk does not exist (%s).', $request->getParameter('id')));
    $this->form = new SoundOpticalDiskForm($sound_optical_disk);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sound_optical_disk = Doctrine_Core::getTable('SoundOpticalDisk')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disk does not exist (%s).', $request->getParameter('id')));
    $this->form = new SoundOpticalDiskForm($sound_optical_disk);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sound_optical_disk = Doctrine_Core::getTable('SoundOpticalDisk')->find(array($request->getParameter('id'))), sprintf('Object sound_optical_disk does not exist (%s).', $request->getParameter('id')));
    $sound_optical_disk->delete();

    $this->redirect('soundopticaldisk/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sound_optical_disk = $form->save();

      $this->redirect('soundopticaldisk/edit?id='.$sound_optical_disk->getId());
    }
  }
}
