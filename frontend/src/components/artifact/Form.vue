<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="artifact_name"
        class="form-control-label">name</label>
        <input
          id="artifact_name"
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
        for="artifact_img"
        class="form-control-label">img</label>
        <input
          id="artifact_img"
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
        for="artifact_halfset"
        class="form-control-label">halfset</label>
        <input
          id="artifact_halfset"
          v-model="item.halfset"
          :class="['form-control', !isValid('halfset') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('halfset')"
        class="invalid-feedback">{{ violations.halfset }}</div>
    </div>
    <div class="form-group">
      <label
        for="artifact_fullset"
        class="form-control-label">fullset</label>
        <input
          id="artifact_fullset"
          v-model="item.fullset"
          :class="['form-control', !isValid('fullset') ? 'is-invalid' : 'is-valid']"
          type="text"
          placeholder="">
      <div
        v-if="!isValid('fullset')"
        class="invalid-feedback">{{ violations.fullset }}</div>
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
