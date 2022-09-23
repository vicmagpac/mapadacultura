<?php
use MapasCulturais\i;

$this->import('panel--entity-tabs panel--entity-card mc-icon');
?>

<div class="panel-page">
    <header class="panel-page__header">
        <div class="panel-page__header-title">
            <div class="title">
                <div class="title__icon space__background"> <mc-icon name="space"></mc-icon> </div>
                <div class="title__title"> <?= i::_e('Meus espaços') ?> </div>
            </div>
            <div class="help">
                <a class="panel__help-link" href="#"><?=i::__('Ajuda?')?></a>
            </div>
        </div>
        <p class="panel-page__header-subtitle">
            <?= i::_e('Nesta seção você pode adicionar e gerenciar seus espaços culturais') ?>
        </p>
        <div class="panel-page__header-actions">
            <button class="button button--primary button--icon"><mc-icon name="add"></mc-icon> <?= i::_e('Criar espaço') ?> </button>
        </div>
    </header>
    
    <panel--entity-tabs type="space"></panel--entity-tabs>
</div>