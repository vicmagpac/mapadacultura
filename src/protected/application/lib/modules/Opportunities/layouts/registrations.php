<?php

use MapasCulturais\ApiQuery;

$this->import('entity');
$this->addRequestedEntityToJs();
$query = new ApiQuery(\MapasCulturais\Entities\Opportunity::class, [
    'id' => "EQ({$entity->opportunity->id})",
    '@select' => "*"
]);
$this->jsObject['opportunity'] = $query->getFindOneResult();
$this->useOpportunityAPI();
$this->addRegistrationFieldsToJs($entity->opportunity);
?>
<?php $this->part('header', $render_data) ?>
<?php $this->part('main-header', $render_data) ?>
<entity #default="{entity}">
<?= $TEMPLATE_CONTENT ?>
</entity>
<?php $this->part('footer', $render_data); 