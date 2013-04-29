<?php

/**
 * Pressed78RPMDisc filter form base class.
 *
 * @package    mediaSCORE
 * @subpackage filter
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePressed78RPMDiscFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'quantity'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'generation'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'year_recorded'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'copies'                          => new sfWidgetFormFilterInput(),
      'stock_brand'                     => new sfWidgetFormFilterInput(),
      'off_brand'                       => new sfWidgetFormFilterInput(),
      'fungus'                          => new sfWidgetFormFilterInput(),
      'other_contaminants'              => new sfWidgetFormFilterInput(),
      'duration'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'duration_type'                   => new sfWidgetFormFilterInput(),
      'duration_type_methodology'       => new sfWidgetFormFilterInput(),
      'format_notes'                    => new sfWidgetFormFilterInput(),
      'type'                            => new sfWidgetFormFilterInput(),
      'material'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'oxidationcorrosion'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pack_deformation'                => new sfWidgetFormFilterInput(),
      'noise_reduction'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tape_type'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'thin_tape'                       => new sfWidgetFormFilterInput(),
      'slow_speed'                      => new sfWidgetFormFilterInput(),
      'sound_field'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'soft_binder_syndrome'            => new sfWidgetFormFilterInput(),
      'gauge'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'colorfade'                       => new sfWidgetFormFilterInput(),
      'soundtrackformat'                => new sfWidgetFormFilterInput(),
      'substrate'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'strongodor'                      => new sfWidgetFormFilterInput(),
      'vinegarodor'                     => new sfWidgetFormFilterInput(),
      'adstriplevel'                    => new sfWidgetFormFilterInput(),
      'shrinkage'                       => new sfWidgetFormFilterInput(),
      'levelofshrinkage'                => new sfWidgetFormFilterInput(),
      'rust'                            => new sfWidgetFormFilterInput(),
      'discoloration'                   => new sfWidgetFormFilterInput(),
      'surfaceblisteringbubbling'       => new sfWidgetFormFilterInput(),
      'thintape'                        => new sfWidgetFormFilterInput(),
      '1993orearlier'                   => new sfWidgetFormFilterInput(),
      'datagradetape'                   => new sfWidgetFormFilterInput(),
      'longplay32k96k'                  => new sfWidgetFormFilterInput(),
      'corrosionrustoxidation'          => new sfWidgetFormFilterInput(),
      'composition'                     => new sfWidgetFormFilterInput(),
      'nonstandardbrand'                => new sfWidgetFormFilterInput(),
      'trackconfiguration'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tapethickness'                   => new sfWidgetFormFilterInput(),
      'speed'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'softbindersyndrome'              => new sfWidgetFormFilterInput(),
      'materialsbreakdown'              => new sfWidgetFormFilterInput(),
      'physicaldamage'                  => new sfWidgetFormFilterInput(),
      'delamination'                    => new sfWidgetFormFilterInput(),
      'plasticizerexudation'            => new sfWidgetFormFilterInput(),
      'recordinglayer'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recordingspeed'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cylindertype'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reflectivelayer'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datalayer'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'opticaldisctype'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'format'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recordingstandard'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'publicationyear'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'capacitylayers'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codec'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datarate'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sheddingsoftbinder'              => new sfWidgetFormFilterInput(),
      'formatversion'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'oxide'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bindersystem'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reelsize'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'whiteresidue'                    => new sfWidgetFormFilterInput(),
      'size'                            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'formattypedvideorecordingformat' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bitrate'                         => new sfWidgetFormFilterInput(),
      'scanning'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'format_id'                       => new sfWidgetFormFilterInput(),
      'f_c_name'                        => new sfWidgetFormFilterInput(),
      'created_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'quantity'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'generation'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year_recorded'                   => new sfValidatorPass(array('required' => false)),
      'copies'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock_brand'                     => new sfValidatorPass(array('required' => false)),
      'off_brand'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fungus'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'other_contaminants'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'duration'                        => new sfValidatorPass(array('required' => false)),
      'duration_type'                   => new sfValidatorPass(array('required' => false)),
      'duration_type_methodology'       => new sfValidatorPass(array('required' => false)),
      'format_notes'                    => new sfValidatorPass(array('required' => false)),
      'type'                            => new sfValidatorPass(array('required' => false)),
      'material'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oxidationcorrosion'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pack_deformation'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'noise_reduction'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tape_type'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'thin_tape'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slow_speed'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sound_field'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'soft_binder_syndrome'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gauge'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'colorfade'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'soundtrackformat'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'substrate'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'strongodor'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vinegarodor'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adstriplevel'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'shrinkage'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'levelofshrinkage'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rust'                            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'discoloration'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'surfaceblisteringbubbling'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'thintape'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      '1993orearlier'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'datagradetape'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'longplay32k96k'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'corrosionrustoxidation'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'composition'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nonstandardbrand'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trackconfiguration'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tapethickness'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'speed'                           => new sfValidatorPass(array('required' => false)),
      'softbindersyndrome'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'materialsbreakdown'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'physicaldamage'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'delamination'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'plasticizerexudation'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'recordinglayer'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'recordingspeed'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cylindertype'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reflectivelayer'                 => new sfValidatorPass(array('required' => false)),
      'datalayer'                       => new sfValidatorPass(array('required' => false)),
      'opticaldisctype'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'format'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'recordingstandard'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'publicationyear'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'capacitylayers'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codec'                           => new sfValidatorPass(array('required' => false)),
      'datarate'                        => new sfValidatorPass(array('required' => false)),
      'sheddingsoftbinder'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'formatversion'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oxide'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bindersystem'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reelsize'                        => new sfValidatorPass(array('required' => false)),
      'whiteresidue'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'size'                            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'formattypedvideorecordingformat' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bitrate'                         => new sfValidatorPass(array('required' => false)),
      'scanning'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'format_id'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'f_c_name'                        => new sfValidatorPass(array('required' => false)),
      'created_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('pressed78_rpm_disc_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pressed78RPMDisc';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'quantity'                        => 'Number',
      'generation'                      => 'Number',
      'year_recorded'                   => 'Text',
      'copies'                          => 'Number',
      'stock_brand'                     => 'Text',
      'off_brand'                       => 'Number',
      'fungus'                          => 'Number',
      'other_contaminants'              => 'Number',
      'duration'                        => 'Text',
      'duration_type'                   => 'Text',
      'duration_type_methodology'       => 'Text',
      'format_notes'                    => 'Text',
      'type'                            => 'Text',
      'material'                        => 'Number',
      'oxidationcorrosion'              => 'Number',
      'pack_deformation'                => 'Number',
      'noise_reduction'                 => 'Number',
      'tape_type'                       => 'Number',
      'thin_tape'                       => 'Number',
      'slow_speed'                      => 'Number',
      'sound_field'                     => 'Number',
      'soft_binder_syndrome'            => 'Number',
      'gauge'                           => 'Number',
      'color'                           => 'Number',
      'colorfade'                       => 'Number',
      'soundtrackformat'                => 'Number',
      'substrate'                       => 'Number',
      'strongodor'                      => 'Number',
      'vinegarodor'                     => 'Number',
      'adstriplevel'                    => 'Number',
      'shrinkage'                       => 'Number',
      'levelofshrinkage'                => 'Number',
      'rust'                            => 'Number',
      'discoloration'                   => 'Number',
      'surfaceblisteringbubbling'       => 'Number',
      'thintape'                        => 'Number',
      '1993orearlier'                   => 'Number',
      'datagradetape'                   => 'Number',
      'longplay32k96k'                  => 'Number',
      'corrosionrustoxidation'          => 'Number',
      'composition'                     => 'Number',
      'nonstandardbrand'                => 'Number',
      'trackconfiguration'              => 'Number',
      'tapethickness'                   => 'Number',
      'speed'                           => 'Text',
      'softbindersyndrome'              => 'Number',
      'materialsbreakdown'              => 'Number',
      'physicaldamage'                  => 'Number',
      'delamination'                    => 'Number',
      'plasticizerexudation'            => 'Number',
      'recordinglayer'                  => 'Number',
      'recordingspeed'                  => 'Number',
      'cylindertype'                    => 'Number',
      'reflectivelayer'                 => 'Text',
      'datalayer'                       => 'Text',
      'opticaldisctype'                 => 'Number',
      'format'                          => 'Number',
      'recordingstandard'               => 'Number',
      'publicationyear'                 => 'Date',
      'capacitylayers'                  => 'Number',
      'codec'                           => 'Text',
      'datarate'                        => 'Text',
      'sheddingsoftbinder'              => 'Number',
      'formatversion'                   => 'Number',
      'oxide'                           => 'Number',
      'bindersystem'                    => 'Number',
      'reelsize'                        => 'Text',
      'whiteresidue'                    => 'Number',
      'size'                            => 'Number',
      'formattypedvideorecordingformat' => 'Number',
      'bitrate'                         => 'Text',
      'scanning'                        => 'Number',
      'format_id'                       => 'Number',
      'f_c_name'                        => 'Text',
      'created_at'                      => 'Date',
      'updated_at'                      => 'Date',
    );
  }
}
