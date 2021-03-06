<?php

/*
 * This file is part of the JsFormValidationBundle.
 *
 * (c) Abhoryo <abhoryo@free.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace APY\JsFormValidationBundle\Listener;

use APY\JsFormValidationBundle\Generator\PreProcessEvent;
use Symfony\Component\Form\FormView;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class ValidationGroupsListener
{
    public function onJsfvPreProcess(PreProcessEvent $event)
    {
        $formView = $event->getFormView();
        $formValidationGroups = $formView->get('validation_groups', array('Default'));

        $formFields = array_keys($formView->getChildren());
        $metadata = $event->getMetaData();

        foreach ($formFields as $fieldName) {
            if (isset($metadata->properties[$fieldName])) {
                foreach ($metadata->properties[$fieldName]->constraints as $key => $contraint) {
                    $contraintParameters = get_object_vars($contraint);

                    // Check validation groups for each contraint of each property
                    foreach ($contraintParameters['groups'] as $validationGroup) {
                        if (in_array($validationGroup, $formValidationGroups)) {
                            continue 2;
                        }
                    }

                    // Unset constraint which is not in the validation groups
                    unset($metadata->properties[$fieldName]->constraints[$key]);
                }
            }
        }
    }
}
