<?php

/**
 * FormatType filter form base class.
 *
 * @package    mediaSCORE
 * @subpackage filter
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFormatTypeFormFilter extends BaseFormFilterDoctrine {

    public function setup() {
        $this->setWidgets(array(
            'quantity' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'generation' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'year_recorded' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'copies' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'stock_brand' => new sfWidgetFormFilterInput(),
            'off_brand' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'fungus' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'other_contaminants' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'duration' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'duration_type' => new sfWidgetFormFilterInput(),
            'duration_type_methodology' => new sfWidgetFormFilterInput(),
            'format_notes' => new sfWidgetFormFilterInput(),
//      'asset_score'                     => new sfWidgetFormFilterInput(),
            'type' => new sfWidgetFormFilterInput(),
            'material' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'oxidationCorrosion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'pack_deformation' => new sfWidgetFormFilterInput(),
            'noise_reduction' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'tape_type' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'thin_tape' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'slow_speed' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'sound_field' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'soft_binder_syndrome' => new sfWidgetFormFilterInput(),
            'gauge' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'color' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'colorFade' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'soundtrackFormat' => new sfWidgetFormFilterInput(),
            'substrate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'strongOdor' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'vinegarOdor' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'ADStripLevel' => new sfWidgetFormFilterInput(),
            'shrinkage' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'levelOfShrinkage' => new sfWidgetFormFilterInput(),
            'rust' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'discoloration' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'surfaceBlisteringBubbling' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'thinTape' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            '1993OrEarlier' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'dataGradeTape' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'longPlay32K96K' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'corrosionRustOxidation' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'composition' => new sfWidgetFormFilterInput(),
            'nonStandardBrand' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'trackConfiguration' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'tapeThickness' => new sfWidgetFormFilterInput(),
            'speed' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'softBinderSyndrome' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'materialsBreakdown' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'physicalDamage' => new sfWidgetFormFilterInput(),
            'delamination' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'plasticizerExudation' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'recordingLayer' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'recordingSpeed' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cylinderType' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'reflectiveLayer' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'dataLayer' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'opticalDiscType' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'format' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'recordingStandard' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'publicationYear' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'capacityLayers' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'codec' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'dataRate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'sheddingSoftBinder' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'formatVersion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'oxide' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'binderSystem' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'reelSize' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'whiteResidue' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'size' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'formatTypedVideoRecordingFormat' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'bitrate' => new sfWidgetFormFilterInput(),
            'scanning' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'quantity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'generation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'year_recorded' => new sfValidatorPass(array('required' => false)),
            'copies' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'stock_brand' => new sfValidatorPass(array('required' => false)),
            'off_brand' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'fungus' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'other_contaminants' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'duration' => new sfValidatorPass(array('required' => false)),
            'duration_type' => new sfValidatorPass(array('required' => false)),
            'duration_type_methodology' => new sfValidatorPass(array('required' => false)),
            'format_notes' => new sfValidatorPass(array('required' => false)),
//      'asset_score'                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
            'type' => new sfValidatorPass(array('required' => false)),
            'material' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'oxidationCorrosion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'pack_deformation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'noise_reduction' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'tape_type' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'thin_tape' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'slow_speed' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'sound_field' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'soft_binder_syndrome' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'gauge' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'color' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'colorFade' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'soundtrackFormat' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'substrate' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'strongOdor' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'vinegarOdor' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'ADStripLevel' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'shrinkage' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'levelOfShrinkage' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'rust' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'discoloration' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'surfaceBlisteringBubbling' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'thinTape' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            '1993OrEarlier' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'dataGradeTape' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'longPlay32K96K' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'corrosionRustOxidation' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'composition' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'nonStandardBrand' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'trackConfiguration' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'tapeThickness' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'speed' => new sfValidatorPass(array('required' => false)),
            'softBinderSyndrome' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'materialsBreakdown' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'physicalDamage' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'delamination' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'plasticizerExudation' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'recordingLayer' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'recordingSpeed' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'cylinderType' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'reflectiveLayer' => new sfValidatorPass(array('required' => false)),
            'dataLayer' => new sfValidatorPass(array('required' => false)),
            'opticalDiscType' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'format' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'recordingStandard' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'publicationYear' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
            'capacityLayers' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'codec' => new sfValidatorPass(array('required' => false)),
            'dataRate' => new sfValidatorPass(array('required' => false)),
            'sheddingSoftBinder' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'formatVersion' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'oxide' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'binderSystem' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'reelSize' => new sfValidatorPass(array('required' => false)),
            'whiteResidue' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'size' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'formatTypedVideoRecordingFormat' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'bitrate' => new sfValidatorPass(array('required' => false)),
            'scanning' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('format_type_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

        parent::setup();
    }

    public function getModelName() {
        return 'FormatType';
    }

    public function getFields() {
        return array(
            'id' => 'Number',
            'quantity' => 'Number',
            'generation' => 'Number',
            'year_recorded' => 'Text',
            'copies' => 'Boolean',
            'stock_brand' => 'Text',
            'off_brand' => 'Boolean',
            'fungus' => 'Boolean',
            'other_contaminants' => 'Boolean',
            'duration' => 'Text',
            'duration_type' => 'Text',
            'duration_type_methodology' => 'Text',
            'format_notes' => 'Text',
//      'asset_score'                     => 'Number',
            'type' => 'Text',
            'material' => 'Number',
            'oxidationCorrosion' => 'Boolean',
            'pack_deformation' => 'Number',
            'noise_reduction' => 'Boolean',
            'tape_type' => 'Number',
            'thin_tape' => 'Boolean',
            'slow_speed' => 'Boolean',
            'sound_field' => 'Number',
            'soft_binder_syndrome' => 'Number',
            'gauge' => 'Number',
            'color' => 'Number',
            'colorFade' => 'Boolean',
            'soundtrackFormat' => 'Number',
            'substrate' => 'Number',
            'strongOdor' => 'Boolean',
            'vinegarOdor' => 'Boolean',
            'ADStripLevel' => 'Number',
            'shrinkage' => 'Boolean',
            'levelOfShrinkage' => 'Number',
            'rust' => 'Boolean',
            'discoloration' => 'Boolean',
            'surfaceBlisteringBubbling' => 'Boolean',
            'thinTape' => 'Boolean',
            '1993OrEarlier' => 'Boolean',
            'dataGradeTape' => 'Boolean',
            'longPlay32K96K' => 'Boolean',
            'corrosionRustOxidation' => 'Boolean',
            'composition' => 'Number',
            'nonStandardBrand' => 'Boolean',
            'trackConfiguration' => 'Number',
            'tapeThickness' => 'Number',
            'speed' => 'Text',
            'softBinderSyndrome' => 'Boolean',
            'materialsBreakdown' => 'Boolean',
            'physicalDamage' => 'Number',
            'delamination' => 'Boolean',
            'plasticizerExudation' => 'Boolean',
            'recordingLayer' => 'Number',
            'recordingSpeed' => 'Number',
            'cylinderType' => 'Number',
            'reflectiveLayer' => 'Text',
            'dataLayer' => 'Text',
            'opticalDiscType' => 'Number',
            'format' => 'Number',
            'recordingStandard' => 'Number',
            'publicationYear' => 'Date',
            'capacityLayers' => 'Number',
            'codec' => 'Text',
            'dataRate' => 'Text',
            'sheddingSoftBinder' => 'Boolean',
            'formatVersion' => 'Number',
            'oxide' => 'Number',
            'binderSystem' => 'Number',
            'reelSize' => 'Text',
            'whiteResidue' => 'Boolean',
            'size' => 'Number',
            'formatTypedVideoRecordingFormat' => 'Number',
            'bitrate' => 'Text',
            'scanning' => 'Number',
            'created_at' => 'Date',
            'updated_at' => 'Date',
        );
    }

}
