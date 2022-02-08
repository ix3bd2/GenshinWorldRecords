<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="weapon_name"
        class="form-control-label">name</label>
        <input
          id="weapon_name"
          v-model="item.name"
          :class="['form-control', !isValid('name') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('name')"
        class="invalid-feedback">{{ violations.name }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_img"
        class="form-control-label">img</label>
        <input
          id="weapon_img"
          v-model="item.img"
          :class="['form-control', !isValid('img') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('img')"
        class="invalid-feedback">{{ violations.img }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_character"
        class="form-control-label">character</label>
        <select
          v-model="item.character"
          id="weapon_character"
          multiple
          class="form-control"
        >
          <option v-for="selectItem in characterSelectItems"
                  :key="selectItem['@id']"
                  :value="selectItem['@id']"
                  :selected="isSelected('character', selectItem['@id'])">{{ selectItem.name }}
          </option>
        </select>
      <div
        v-if="!isValid('character')"
        class="invalid-feedback">{{ violations.character }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_teams"
        class="form-control-label">teams</label>
        <select
          v-model="item.teams"
          id="weapon_teams"
          multiple
          class="form-control"
        >
          <option v-for="selectItem in teamsSelectItems"
                  :key="selectItem['@id']"
                  :value="selectItem['@id']"
                  :selected="isSelected('teams', selectItem['@id'])">{{ selectItem.name }}
          </option>
        </select>
      <div
        v-if="!isValid('teams')"
        class="invalid-feedback">{{ violations.teams }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_rarity"
        class="form-control-label">rarity</label>
        <input
          id="weapon_rarity"
          v-model="item.rarity"
          :class="['form-control', !isValid('rarity') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('rarity')"
        class="invalid-feedback">{{ violations.rarity }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_atk"
        class="form-control-label">atk</label>
        <input
          id="weapon_atk"
          v-model="item.atk"
          :class="['form-control', !isValid('atk') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('atk')"
        class="invalid-feedback">{{ violations.atk }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_substate"
        class="form-control-label">substate</label>
        <input
          id="weapon_substate"
          v-model="item.substate"
          :class="['form-control', !isValid('substate') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('substate')"
        class="invalid-feedback">{{ violations.substate }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_passive"
        class="form-control-label">passive</label>
        <input
          id="weapon_passive"
          v-model="item.passive"
          :class="['form-control', !isValid('passive') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('passive')"
        class="invalid-feedback">{{ violations.passive }}</div>
    </div>
    <div class="form-group">
      <label
        for="weapon_type"
        class="form-control-label">type</label>
        <input
          id="weapon_type"
          v-model="item.type"
          :class="['form-control', !isValid('type') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('type')"
        class="invalid-feedback">{{ violations.type }}</div>
    </div>

    <button
      type="submit"
      class="btn btn-success">Submit</button>
  </form>
</template>

<script>
  import { find, get, isUndefined } from 'lodash';
  import { mapFields } from 'vuex-map-fields';
  import { mapActions } from 'vuex';

  export default {
  props: {
    handleSubmit: {
      type: Function,
      required: true,
    },

    values: {
      type: Object,
      required: true,
    },

    errors: {
      type: Object,
      default: () => {},
    },

    initialValues: {
      type: Object,
      default: () => {},
    }
  },

  mounted() {
    this.characterGetSelectItems();
    this.teamsGetSelectItems();
  },

  computed: {
    ...mapFields('character/list', {
      'characterSelectItems': 'selectItems',
    }),
    ...mapFields('teams/list', {
      'teamsSelectItems': 'selectItems',
    }),

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    violations() {
      return this.errors || {};
    },
  },

  methods: {
    ...mapActions({
        characterGetSelectItems: 'character/list/getSelectItems',
        teamsGetSelectItems: 'teams/list/getSelectItems',
    }),

    isSelected(collection, id) {
      return find(this.item[collection], ['@id', id]) !== undefined;
    },

    isValid(key) {
      return isUndefined(get(this.violations, key));
    },
  },
};
</script>
