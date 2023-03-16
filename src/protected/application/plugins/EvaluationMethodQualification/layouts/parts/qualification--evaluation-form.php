<?php

use MapasCulturais\i;

$plugin = $app->plugins['EvaluationMethodQualification'];

$params = ['registration' => $entity, 'opportunity' => $opportunity];
?>
<?php $this->applyTemplateHook('evaluationForm.qualification', 'before', $params); ?>
<div ng-controller="QualificationEvaluationMethodFormController" class="qualification-evaluation-form">
    <?php $this->applyTemplateHook('evaluationForm.qualification', 'begin', $params); ?>
    <section ng-repeat="section in ::data.sections">
        <table>
            <tr>
                <th colspan="2">
                    {{section.name}}
                </th>
            </tr>

            <tr ng-repeat="cri in ::data.criteria" ng-if="cri.sid == section.id">
                <td>
                    <?php echo $plugin->step ?><label for="{{cri.id}}">{{cri.description}}:</label>
                </td>
                <td>
                    <select>
                        <option ng-repeat="option in ::cri.options">{{option}}</option>
                    </select>
                </td>
            </tr>

            <tr class="subtotal">
                <td><?php i::_e('Subtotal') ?></td>
                <td>{{subtotalSection(section)}}</td>
            </tr>
        </table>
    </section>
    <hr>
    <label>
        <?php i::_e('Parecer Técnico') ?>
        <textarea name="data[obs]" ng-model="evaluation['obs']"></textarea>
    </label>
    <hr>

    <div class='total'>
        <?php i::_e('Pontuação Total'); ?>: <strong>{{total(total)}}</strong><br>
        <?php i::_e('Pontuação Máxima'); ?>: <strong>{{max(total)}}</strong>
    </div>
    <?php $this->applyTemplateHook('evaluationForm.qualification', 'end', $params); ?>
</div>
<?php $this->applyTemplateHook('evaluationForm.qualification', 'after', $params); ?>