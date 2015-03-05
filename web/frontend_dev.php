<?php

require_once(dirname(__FILE__) . '/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', TRUE);
sfContext::createInstance($configuration)->dispatch();
