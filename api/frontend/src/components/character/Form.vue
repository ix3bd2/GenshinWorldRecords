<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="character_name"
        class="form-control-label">name</label>
        <input
          id="character_name"
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
        for="character_img"
        class="form-control-label">img</label>
        <input
          id="character_img"
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
        for="character_atk"
        class="form-control-label">atk</label>
        <input
          id="character_atk"
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
        for="character_def"
        class="form-control-label">def</label>
        <input
          id="character_def"
          v-model="item.def"
          :class="['form-control', !isValid('def') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('def')"
        class="invalid-feedback">{{ violations.def }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_hp"
        class="form-control-label">hp</label>
        <input
          id="character_hp"
          v-model="item.hp"
          :class="['form-control', !isValid('hp') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('hp')"
        class="invalid-feedback">{{ violations.hp }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_er"
        class="form-control-label">er</label>
        <input
          id="character_er"
          v-model="item.er"
          :class="['form-control', !isValid('er') ? 'is-invalid' : 'is-valid']"
          type="number"
          step="0.1"
          placeholder="">
      <div
        v-if="!isValid('er')"
        class="invalid-feedback">{{ violations.er }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_em"
        class="form-control-label">em</label>
        <input
          id="character_em"
          v-model="item.em"
          :class="['form-control', !isValid('em') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('em')"
        class="invalid-feedback">{{ violations.em }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_cr"
        class="form-control-label">cr</label>
        <input
          id="character_cr"
          v-model="item.cr"
          :class="['form-control', !isValid('cr') ? 'is-invalid' : 'is-valid']"
          type="number"
          step="0.1"
          placeholder="">
      <div
        v-if="!isValid('cr')"
        class="invalid-feedback">{{ violations.cr }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_cd"
        class="form-control-label">cd</label>
        <input
          id="character_cd"
          v-model="item.cd"
          :class="['form-control', !isValid('cd') ? 'is-invalid' : 'is-valid']"
          type="number"
          step="0.1"
          placeholder="">
      <div
        v-if="!isValid('cd')"
        class="invalid-feedback">{{ violations.cd }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_ed"
        class="form-control-label">ed</label>
        <input
          id="character_ed"
          v-model="item.ed"
          :class="['form-control', !isValid('ed') ? 'is-invalid' : 'is-valid']"
          type="number"
          step="0.1"
          placeholder="">
      <div
        v-if="!isValid('ed')"
        class="invalid-feedback">{{ violations.ed }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_talentE"
        class="form-control-label">talentE</label>
        <input
          id="character_talentE"
          v-model="item.talentE"
          :class="['form-control', !isValid('talentE') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('talentE')"
        class="invalid-feedback">{{ violations.talentE }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_talentQ"
        class="form-control-label">talentQ</label>
        <input
          id="character_talentQ"
          v-model="item.talentQ"
          :class="['form-control', !isValid('talentQ') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('talentQ')"
        class="invalid-feedback">{{ violations.talentQ }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_talentAA"
        class="form-control-label">talentAA</label>
        <input
          id="character_talentAA"
          v-model="item.talentAA"
          :class="['form-control', !isValid('talentAA') ? 'is-invalid' : 'is-valid']"
          type="number"
          placeholder="">
      <div
        v-if="!isValid('talentAA')"
        class="invalid-feedback">{{ violations.talentAA }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_weapon"
        class="form-control-label">weapon</label>
        <select
          v-model="item.weapon"
          id="character_weapon"
          class="form-control"
        >
          <option v-for="selectItem in weaponSelectItems"
                  :key="selectItem['@id']"
                  :value="selectItem['@id']"
                  :selected="isSelected('weapon', selectItem['@id'])">{{ selectItem.name }}
          </option>
        </select>
      <div
        v-if="!isValid('weapon')"
        class="invalid-feedback">{{ violations.weapon }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_team"
        class="form-control-label">team</label>
        <select
          v-model="item.team"
          id="character_team"
          multiple
          class="form-control"
        >
          <option v-for="selectItem in teamSelectItems"
                  :key="selectItem['@id']"
                  :value="selectItem['@id']"
                  :selected="isSelected('team', selectItem['@id'])">{{ selectItem.name }}
          </option>
        </select>
      <div
        v-if="!isValid('team')"
        class="invalid-feedback">{{ violations.team }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_videoUrl"
        class="form-control-label">videoUrl</label>
        <input
          id="character_videoUrl"
          v-model="item.videoUrl"
          :class="['form-control', !isValid('videoUrl') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('videoUrl')"
        class="invalid-feedback">{{ violations.videoUrl }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_banner"
        class="form-control-label">banner</label>
        <input
          id="character_banner"
          v-model="item.banner"
          :class="['form-control', !isValid('banner') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('banner')"
        class="invalid-feedback">{{ violations.banner }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_element"
        class="form-control-label">element</label>
        <select
          v-model="item.element"
          id="character_element"
          class="form-control"
        >
          <option v-for="selectItem in elementSelectItems"
                  :key="selectItem['@id']"
                  :value="selectItem['@id']"
                  :selected="isSelected('element', selectItem['@id'])">{{ selectItem.name }}
          </option>
        </select>
      <div
        v-if="!isValid('element')"
        class="invalid-feedback">{{ violations.element }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_weaponRefine"
        class="form-control-label">weaponRefine</label>
        <input
          id="character_weaponRefine"
          v-model="item.weaponRefine"
          :class="['form-control', !isValid('weaponRefine') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('weaponRefine')"
        class="invalid-feedback">{{ violations.weaponRefine }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_bannerBg"
        class="form-control-label">bannerBg</label>
        <input
          id="character_bannerBg"
          v-model="item.bannerBg"
          :class="['form-control', !isValid('bannerBg') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('bannerBg')"
        class="invalid-feedback">{{ violations.bannerBg }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_rarity"
        class="form-control-label">rarity</label>
        <input
          id="character_rarity"
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
        for="character_buff"
        class="form-control-label">buff</label>
        <input
          id="character_buff"
          v-model="item.buff"
          :class="['form-control', !isValid('buff') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('buff')"
        class="invalid-feedback">{{ violations.buff }}</div>
    </div>
    <div class="form-group">
      <label
        for="character_artifact"
        class="form-control-label">artifact</label>
        <input
          id="character_artifact"
          v-model="item.artifact"
          :class="['form-control', !isValid('artifact') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('artifact')"
        class="invalid-feedback">{{ violations.artifact }}</div>
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
    this.weaponGetSelectItems();
    this.teamGetSelectItems();
    this.elementGetSelectItems();
  },

  computed: {
    ...mapFields('weapon/list', {
      'weaponSelectItems': 'selectItems',
    }),
    ...mapFields('team/list', {
      'teamSelectItems': 'selectItems',
    }),
    ...mapFields('element/list', {
      'elementSelectItems': 'selectItems',
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
        weaponGetSelectItems: 'weapon/list/getSelectItems',
        teamGetSelectItems: 'team/list/getSelectItems',
        elementGetSelectItems: 'element/list/getSelectItems',
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
