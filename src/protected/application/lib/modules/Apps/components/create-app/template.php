 <?php 
use MapasCulturais\i;
 
$this->import('
    app-card-content
    entity-field 
    entity-terms
    mc-link
    modal 
'); 
?>


<modal :title="modalTitle" classes="create-modal create-app" button-label="Criar app" @open="createEntity()" @close="destroyEntity()">
    <template v-if="entity && !entity.publicKey" #default>
        <label><?php i::_e('Crie um aplicativo com informações básicas')?><br><?php i::_e('e de forma rápida')?></label>
        <div class="create-modal__fields">
            <entity-field :entity="entity" hide-required label=<?php i::esc_attr_e("Nome ou título")?>  prop="name"></entity-field>
            <small class="field__error" v-if="areaErrors">{{areaErrors.join(', ')}}</small>
            <entity-field :entity="entity" hide-required v-for="field in fields" :prop="field"></entity-field>
        </div>
    </template>

    <template v-if="entity?.id" #default>
        <label><?php i::_e('{{entity.name}}');?></label>
        <app-card-content :entity="entity"></app-card-content>
    </template>

    <template #button="modal">
        <slot :modal="modal">
            <button @click="modal.open()" class="button button--primary button--icon"><mc-icon name="add"></mc-icon> <?= i::_e('Criar Aplicativo') ?></button>
        </slot>
    </template>
    <template v-if="!entity?.id" #actions="modal">
        <button class="button button--primary" @click="createPublic(modal)"><?php i::_e('Criar aplicativo')?></button>
        <button class="button button--text button--text-del " @click="modal.close()"><?php i::_e('Cancelar')?></button>
    </template>

    <template v-if="entity?.id && entity.status==1" #actions="modal">
        <mc-link :entity="entity" class="button button--primary-outline button--icon"><?php i::_e('ok');?></mc-link>
    </template>
</modal>
