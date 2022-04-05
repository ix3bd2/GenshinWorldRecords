<template>
  <div>
    <h1>Edit {{ retrieved && retrieved['@id'] }}</h1>

    <div
      v-if="created"
      class="alert alert-success"
      role="status">{{ created['@id'] }} created.</div>
    <div
      v-if="updated"
      class="alert alert-success"
      role="status">{{ updated['@id'] }} updated.</div>
    <div
      v-if="isLoading || deleteLoading"
      class="alert alert-info"
      role="status">Loading...</div>
    <div
      v-if="error"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true">{{ error }}</span>
    </div>
    <div
      v-if="deleteError"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true">{{ deleteError }}</span>
    </div>

    <BuffForm
      v-if="retrieved"
      :handle-submit="onSendForm"
      :values="retrieved"
      :errors="violations"
      :initial-values="retrieved" />

    <router-link
      v-if="retrieved"
      :to="{ name: 'BuffList' }"
      class="btn btn-primary">Back to list</router-link>
    <button
      class="btn btn-danger"
      @click="del">Delete</button>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import BuffForm from './Form.vue';

export default {
  components: {
    BuffForm,
  },

  computed: {
    ...mapFields('buff/del', {
      deleteError: 'error',
      deleteLoading: 'isLoading',
      deleted: 'deleted',
    }),
    ...mapFields('buff/create', {
      created: 'created',
    }),
    ...mapFields('buff/update', {
      isLoading: 'isLoading',
      error: 'error',
      retrieved: 'retrieved',
      updated: 'updated',
      violations: 'violations',
    }),
  },

  watch: {
    // eslint-disable-next-line object-shorthand,func-names
    deleted: function(deleted) {
      if (!deleted) {
        return;
      }

      this.$router.push({ name: 'BuffList' });
    },
  },

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      createReset: 'buff/create/reset',
      deleteItem: 'buff/del/del',
      delReset: 'buff/del/reset',
      retrieve: 'buff/update/retrieve',
      updateReset: 'buff/update/reset',
      update: 'buff/update/update',
      updateRetrieved: 'buff/update/updateRetrieved',
    }),

    del() {
      if (window.confirm('Are you sure you want to delete this buff ?')) {
        this.deleteItem(this.retrieved);
      }
    },

    reset() {
      this.updateReset();
      this.createReset();
    },

    onSendForm() {
      this.update(this.retrieved);
    },
  },
};
</script>
