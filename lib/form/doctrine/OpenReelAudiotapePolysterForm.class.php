<?php

/**
 * OpenReelAudiotapePolyster form.
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OpenReelAudiotapePolysterForm extends BaseOpenReelAudiotapePolysterForm {

    /**
     * @see OpenReelAudioTapeFormatTypeForm
     */
    public function configure() {
        parent::configure();

        $this->setWidget('type', new sfWidgetFormInputHidden(array(), array('value' => $this->getObject()->getTypeValue())));
        $this->setWidget('speed', new sfWidgetFormChoice(array('choices' => OpenReelAudioTapeFormatType::$constants[2], 'multiple' => true), array('class' => 'override_required')));
//        $this->setWidget('speed',new sfWidgetFormChoice(array('choices' => OpenReelAudioTapeFormatType::$constants[2],'multiple'=>true)));
        $this->setWidget('tapeThickness', new sfWidgetFormChoice(array('choices' => OpenReelAudioTapeFormatType::$constants[3]), array('class' => 'override_required')));
        $this->setWidget('noise_reduction', new sfWidgetFormInputCheckbox());

//        $this->setValidator('speed', new sfValidatorChoice(array('required' => true,'multiple'=>true,'choices' => OpenReelAudioTapeFormatType::$constants[2])));
        $this->setValidator('speed', new sfValidatorString(array('required' => true)));
        $this->setValidator('tapeThickness', new sfValidatorString(array('required' => false)));
        $this->setValidator('noise_reduction', new sfValidatorBoolean());

        $this->getWidget('speed')->setLabel('<span class="required">*</span>Speed:&nbsp;');
        $this->getWidget('tapeThickness')->setLabel('Tape Thickness:&nbsp;');
        $this->getWidget('noise_reduction')->setLabel('Noise Reduction:&nbsp;');

// Constraints applyed for score 
        $this->setWidget('trackConfiguration', new sfWidgetFormChoice(array('choices' => array('' => 'Select', 0 => 'Full Track', 2 => 'Half-Track Mono', 3 => 'Half-Track Stereo', 4 => 'Quarter-Track Mono', 5 => 'Quarter-Track Stereo', 6 => 'Unknown')), array('class' => 'override_required')));
        $this->setValidator('trackConfiguration', new sfValidatorString(array('required' => true)));
//        $this->setWidget('asset_score', new sfWidgetFormInputCheckbox());
        $this->widgetSchema->moveField('asset_score', 'last', 'tapeThickness');
        

        foreach (array('tape_type',
    'duration_type_methodology',
    'format_notes',
    'slow_speed',
    'sound_field',
    'soft_binder_syndrome',
    'thinTape',
    'corrosionRustOxidation',
    'composition',
    'nonStandardBrand',
    'materialsBreakdown',
    'delamination',
    'plasticizerExudation',
    'recordingLayer',
    'recordingSpeed',
    'cylinderType',
    'reflectiveLayer',
    'dataLayer',
    'opticalDiscType',
    'format',
    'recordingStandard',
    'publicationYear',
    'capacityLayers',
    'codec',
    'dataRate',
    'sheddingSoftBinder',
    'formatVersion',
    'oxide',
    'binderSystem',
    'reelSize',
    'whiteResidue',
    'size',
    'formatTypedVideoRecordingFormat',
    'bitrate',
    'scanning',
    'created_at',
    'updated_at',
    'generation',
    'year_recorded',
    'copies',
    'stock_brand',
    'off_brand',
    'fungus',
    'other_contaminants',
    'duration',
    'duration_type',
    'material',
    'oxidationCorrosion',
    'physicalDamage',
    'quantity') as $voidField) {
            unset($this->widgetSchema[$voidField]);
            unset($this->validatorSchema[$voidField]);
        }
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null) {
//        if (isset($taintedValues['softBinderSyndrome']) && $taintedValues['softBinderSyndrome'] != null) {
//            $softBinderSyndrome = implode(',', $taintedValues['softBinderSyndrome']);
//            $taintedValues['softBinderSyndrome'] = $softBinderSyndrome;
//        }
        if (isset($taintedValues['speed']) && $taintedValues['speed'] != null) {
            $speed = implode(',', $taintedValues['speed']);
            $taintedValues['speed'] = $speed;
        }

        parent::bind($taintedValues, $taintedFiles);
    }

}
