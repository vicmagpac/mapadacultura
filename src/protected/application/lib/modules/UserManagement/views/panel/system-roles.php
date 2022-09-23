<?php
use MapasCulturais\i;
$this->layout = 'panel';

$this->import('
    confirm-button
    mc-icon mc-icon
    system-roles--card
    panel--entity-tabs
    system-roles--modal
');

?>

<div class="panel-page">
    <header class="panel-page__header">
        <div class="panel-page__header-title">
            <div class="title">
                <div class="title__icon default"> <mc-icon name="role"></mc-icon> </div>
                <div class="title__title"> <?= i::_e('Funções de usuários') ?> </div>
            </div>
            <div class="help">
                <a class="panel__help-link" href="#"><?=i::__('Ajuda?')?></a>
            </div>
        </div>
        <p class="panel-page__header-subtitle">
            <?= i::_e('Nesta seção você visualiza e gerencia as funções de usuário customizadas.') ?>
        </p>
        <div class="panel-page__header-actions">
            <system-roles--modal list="system-role:publish"></system-roles--modal>
        </div>
    </header>
    
    <panel--entity-tabs type="system-role" user="" select="id,status,name,slug,permissions" #default={entity}>
        <system-roles--card :entity="entity"></system-roles--card>
    </panel--entity-tabs>
</div>