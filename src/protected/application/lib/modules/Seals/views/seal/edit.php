<?php
use MapasCulturais\i;
$this->layout = 'entity';

$this->import('
    entity-actions
    entity-admins
    entity-cover
    entity-field
    entity-files-list
    entity-header
    entity-owner
    entity-profile
    mapas-breadcrumb
    mapas-card
    mapas-container
    form-valid-period
');

$this->breadcramb = [
  ['label'=> i::__('Painel'), 'url' => $app->createUrl('panel', 'index')],
  ['label'=> i::__('Meus Selos'), 'url' => $app->createUrl('panel', 'seals')],
  ['label'=> $entity->name, 'url' => $app->createUrl('seal', 'edit', [$entity->id])],
];
?>

<div class="main-app">
  <mapas-breadcrumb></mapas-breadcrumb>
  <entity-header :entity="entity" editable></entity-header>
  <mapas-container>
    <main>
      <mapas-card class="feature">
        <template #title>
          <label><?php i::_e("Informações de selos")?></label>
          <p><?php i::_e("Texto exemplo de texto")?></p>
        </template>
        <template #content>
          <div class="left">
            <div class="grid-12">
              <entity-field :entity="entity" classes="col-9 sm:col-12" prop="name"></entity-field>
              <div class="col-12">
                <h2>Validade do certificado do selo</h2>
                <form-valid-period classes="col-12" :entity="entity"></form-valid-period>
              </div>
              <entity-field :entity="entity" classes="col-12" prop="shortDescription"></entity-field>
            </div>
          </div>
        </template>
      </mapas-card>
    </main>
    <aside>
      <mapas-card>
        <template #content>
          <div class="grid-12">
            <entity-admins :entity="entity" classes="col-12" editable></entity-admins>
            <entity-owner :entity="entity" classes="col-12" title="<?php i::_e('Publicado por')?>" editable></entity-owner>
            <entity-parent-edit :entity="entity" classes="col-12" type="project" ></entity-parent-edit>
          </div>
        </template>
      </mapas-card>
    </aside>
  </mapas-container>
  <entity-actions :entity="entity" editable></entity-actions>
</div>