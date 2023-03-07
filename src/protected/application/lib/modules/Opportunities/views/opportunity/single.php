<?php
use MapasCulturais\i;
$this->layout = 'entity';

$this->import('
    entity-actions
    entity-files-list
    entity-gallery
    entity-gallery-video
    entity-header
    entity-links
    entity-owner
    entity-related-agents
    entity-request-ownership
    entity-seals
    entity-social-media
    entity-terms
    mapas-breadcrumb
    opportunity-subscription
    opportunity-subscription-list
    opportunity-timeline-phases
    share-links
    tabs
');
$this->breadcrumb = [
  ['label' => i::__('Inicio'), 'url' => $app->createUrl('panel', 'index')],
  ['label' => i::__('Minhas oportunidades'), 'url' => $app->createUrl('panel', 'opportunity')],
  ['label' => $entity->name, 'url' => $app->createUrl('opportunity', 'single', [$entity->id])],
];
?>

<div class="main-app single">
  <mapas-breadcrumb></mapas-breadcrumb>
  <entity-header :entity="entity"></entity-header>

    <tabs class="tabs">

        <tab label="<?= i::__('Informações') ?>" slug="info">
            <mapas-container class="opportunity">
                <main class="grid-12">
                    <opportunity-subscription class="col-12" :entity="entity"></opportunity-subscription>
                    <opportunity-subscription-list class="col-12"></opportunity-subscription-list>
                </main>
                <aside>
                    <div class="grid-12">
                        <opportunity-timeline-phases></opportunity-timeline-phases>
                        <div class="col-12">
                            <button class="button button--primary-outline">
                            <?= i::__("Baixar regulamento") ?>
                            </button>
                        </div>
                    </div>
                </aside>
            </mapas-container>

            <mapas-container>
                <main>
                    <div class="grid-12">
                        <div class="col-12">
                            <h3><?= i::__("Apresentação") ?></h3>
                            <p>{{ entity.shortDescription }}</p>
                        </div>
                        <entity-files-list :entity="entity" classes="col-12" group="downloads"  title="<?php i::esc_attr_e('Arquivos para download');?>"></entity-files-list>
                        <div class="col-12">
                            <entity-links :entity="entity" title="<?php i::esc_attr_e('Links'); ?>"></entity-links>
                        </div>
                        <entity-gallery-video :entity="entity" classes="col-12"></entity-gallery-video>
                        <entity-gallery :entity="entity" classes="col-12"></entity-gallery>
                        <div class="col-12">
                            <entity-request-ownership></entity-request-ownership>
                        </div>
                        <div class="col-12 controller-opportunity__helpers">
                            <button class="button button--primary-outline">Denúncia</button>
                            <button class="button button--primary">Contato</button>
                        </div>
                    </div>
                </main>
                <aside>
                    <div class="grid-12">
                        <entity-terms :entity="entity" taxonomy="area" classes="col-12" title="<?php i::esc_attr_e('Áreas de interesse'); ?>"></entity-terms>
                        <entity-social-media :entity="entity" classes="col-12"></entity-social-media>
                        <entity-seals :entity="entity" classes="col-12" title="<?php i::esc_attr_e('Verificações');?>"></entity-seals>
                        <entity-terms :entity="entity" classes="col-12" taxonomy="tag" title="<?php i::_e('Tags')?>"></entity-terms>
                        <entity-related-agents :entity="entity" classes="col-12" title="<?php i::esc_attr_e('Agentes Relacionados');?>"></entity-related-agents>
                        <entity-owner classes="col-12" title="<?php i::esc_attr_e('Publicado por');?>" :entity="entity"></entity-owner>
                        <share-links  classes="col-12" title="<?php i::esc_attr_e('Compartilhar');?>" text="<?php i::esc_attr_e('Veja este link:');?>"></share-links>
                    </div>
                </aside>
            </mapas-container>
        </tab>

        <tab label="<?= i::__('Projetos contemplados') ?>" slug="project">
        </tab>

        <tab label="<?= i::__('Suporte') ?>" slug="support">
        </tab>

    </tabs>
    <entity-actions :entity="entity"></entity-actions>
</div>