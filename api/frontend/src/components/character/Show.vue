<template>
  <div>
    <h1>Show {{ item && item["@id"] }}</h1>

    <div v-if="isLoading" class="alert alert-info" role="status">
      Loading...
    </div>
    <div v-if="error" class="alert alert-danger" role="alert">
      <span class="fa fa-exclamation-triangle" aria-hidden="true">{{
        error
      }}</span>
    </div>
    <div v-if="deleteError" class="alert alert-danger" role="alert">
      <span class="fa fa-exclamation-triangle" aria-hidden="true">{{
        deleteError
      }}</span>
    </div>
    <div v-if="item" class="table-responsive">
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
            <td>{{ item["name"] }}</td>
          </tr>
          <tr>
            <th scope="row">img</th>
            <td><img v-bind:src="item['img']" /></td>
          </tr>
          <tr>
            <th scope="row">atk</th>
            <td>{{ item["atk"] }}</td>
          </tr>
          <tr>
            <th scope="row">def</th>
            <td>{{ item["def"] }}</td>
          </tr>
          <tr>
            <th scope="row">hp</th>
            <td>{{ item["hp"] }}</td>
          </tr>
          <tr>
            <th scope="row">er</th>
            <td>{{ item["er"] }}</td>
          </tr>
          <tr>
            <th scope="row">em</th>
            <td>{{ item["em"] }}</td>
          </tr>
          <tr>
            <th scope="row">cr</th>
            <td>{{ item["cr"] }}</td>
          </tr>
          <tr>
            <th scope="row">cd</th>
            <td>{{ item["cd"] }}</td>
          </tr>
          <tr>
            <th scope="row">ed</th>
            <td>{{ item["ed"] }}</td>
          </tr>
          <tr>
            <th scope="row">talentE</th>
            <td>{{ item["talentE"] }}</td>
          </tr>
          <tr>
            <th scope="row">talentQ</th>
            <td>{{ item["talentQ"] }}</td>
          </tr>
          <tr>
            <th scope="row">talentAA</th>
            <td>{{ item["talentAA"] }}</td>
          </tr>
          <tr>
            <th scope="row">weapon</th>
            <td>{{ item["weapon"] }}</td>
          </tr>
          <tr>
            <th scope="row">team</th>
            <td>{{ item["team"] }}</td>
          </tr>
          <tr>
            <th scope="row">videoUrl</th>
            <td>{{ item["videoUrl"] }}</td>
          </tr>
          <tr>
            <th scope="row">banner</th>
            <td><img v-bind:src="item['banner']" /></td>
          </tr>
          <tr>
            <th scope="row">element</th>
            <td>{{ item["element"] }}</td>
          </tr>
          <tr>
            <th scope="row">weaponRefine</th>
            <td>{{ item["weaponRefine"] }}</td>
          </tr>
          <tr>
            <th scope="row">bannerBg</th>
            <td>{{ item["bannerBg"] }}</td>
          </tr>
          <tr>
            <th scope="row">rarity</th>
            <td>{{ item["rarity"] }}</td>
          </tr>
          <tr>
            <th scope="row">buff</th>
            <td>{{ item["buff"] }}</td>
          </tr>
          <tr>
            <th scope="row">artifact</th>
            <td>{{ item["artifact"] }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <router-link :to="{ name: 'CharacterList' }" class="btn btn-primary">
      Back to list
    </router-link>
    <router-link
      v-if="item"
      :to="{ name: 'CharacterUpdate', params: { id: item['@id'] } }"
      class="btn btn-warning"
    >
      Edit
    </router-link>
    <button class="btn btn-danger" @click="deleteItem(item)">Delete</button>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";

export default {
  computed: {
    ...mapFields("character/del", {
      deleteError: "error",
    }),
    ...mapFields("character/show", {
      error: "error",
      isLoading: "isLoading",
      item: "retrieved",
    }),
  },

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: "character/del/del",
      reset: "character/show/reset",
      retrieve: "character/show/retrieve",
    }),

    deleteItem(item) {
      if (window.confirm("Are you sure you want to delete this item?")) {
        this.del(item).then(() => this.$router.push({ name: "CharacterList" }));
      }
    },
  },
};
</script>
