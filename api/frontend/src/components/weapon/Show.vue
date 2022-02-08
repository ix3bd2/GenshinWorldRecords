<template>
  <div>
    <h1>Show {{ item && item['@id'] }}</h1>

    <div
      v-if="isLoading"
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
    <div
      v-if="item"
      class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Field</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">name</th>
            <td>{{ item['name'] }}</td>
          </tr>
          <tr>
            <th scope="row">img</th>
            <td>{{ item['img'] }}</td>
          </tr>
          <tr>
            <th scope="row">character</th>
            <td>{{ item['character'] }}</td>
          </tr>
          <tr>
            <th scope="row">teams</th>
            <td>{{ item['teams'] }}</td>
          </tr>
          <tr>
            <th scope="row">rarity</th>
            <td>{{ item['rarity'] }}</td>
          </tr>
          <tr>
            <th scope="row">atk</th>
            <td>{{ item['atk'] }}</td>
          </tr>
          <tr>
            <th scope="row">substate</th>
            <td>{{ item['substate'] }}</td>
          </tr>
          <tr>
            <th scope="row">passive</th>
            <td>{{ item['passive'] }}</td>
          </tr>
          <tr>
            <th scope="row">type</th>
            <td>{{ item['type'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <router-link
      :to="{ name: 'WeaponList' }"
      class="btn btn-primary">
      Back to list
    </router-link>
    <router-link
      v-if="item"
      :to="{ name: 'WeaponUpdate', params: { id: item['@id'] } }"
      class="btn btn-warning">
      Edit
    </router-link>
    <button
      class="btn btn-danger"
      @click="deleteItem(item)">Delete</button>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';

export default {
  computed: {
    ...mapFields('weapon/del', {
      deleteError: 'error',
    }),
    ...mapFields('weapon/show', {
      error: 'error',
      isLoading: 'isLoading',
      item: 'retrieved',
    }),
  },

  beforeDestroy () {
    this.reset();
  },

  created () {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: 'weapon/del/del',
      reset: 'weapon/show/reset',
      retrieve: 'weapon/show/retrieve',
    }),

    deleteItem (item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'WeaponList' }));
      }
    },
  },
};
</script>
