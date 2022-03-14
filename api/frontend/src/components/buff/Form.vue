<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="buff_img"
        class="form-control-label">img</label>
        <input
          id="buff_img"
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
        for="buff_description"
        class="form-control-label">description</label>
        <input
          id="buff_description"
          v-model="item.description"
          :class="['form-control', !isValid('description') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('description')"
        class="invalid-feedback">{{ violations.description }}</div>
    </div>
    <div class="form-group">
      <label
        for="buff_character"
        class="form-control-label">character</label>
        <input
          id="buff_character"
          v-model="item.character"
          :class="['form-control', !isValid('character') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('character')"
        class="invalid-feedback">{{ violations.character }}</div>
    </div>
    <div class="form-group">
      <label
        for="buff_weapon"
        class="form-control-label">weapon</label>
        <input
          id="buff_weapon"
          v-model="item.weapon"
          :class="['form-control', !isValid('weapon') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('weapon')"
        class="invalid-feedback">{{ violations.weapon }}</div>
    </div>
    <div class="form-group">
      <label
        for="buff_aritfact"
        class="form-control-label">aritfact</label>
        <input
          id="buff_aritfact"
          v-model="item.aritfact"
          :class="['form-control', !isValid('aritfact') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('aritfact')"
        class="invalid-feedback">{{ violations.aritfact }}</div>
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
  },

  computed: {

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
