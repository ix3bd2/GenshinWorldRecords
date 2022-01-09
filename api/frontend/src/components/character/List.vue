<template>
  <div>
    <h1>Character List</h1>

    <div v-if="isLoading" class="alert alert-info">Loading...</div>
    <!-- <div
      v-if="deletedItem"
      class="alert alert-success">{{ deletedItem['@id'] }} deleted.</div> -->
    <!-- <div
      v-if="error"
      class="alert alert-danger">{{ error }}</div> -->

    <!-- p>
      <router-link
        :to="{ name: 'CharacterCreate' }"
        class="btn btn-primary">Create</router-link>
    </p> -->

    <div class="row">
      <div
        class="col-md-4 col-sm-12 col-card"
        v-for="item in items"
        :key="item['@id']"
      >
        <div class="card">
          <div>
            <img
              class="card-img-top"
              v-bind:src="item['banner']"
              alt="Card image cap"
            />
            <img
              class="card-img-top char-pp"
              v-bind:src="item['img']"
              alt="Card image cap"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ item['name'] }}</h5>
              </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";

export default {
  computed: {
    ...mapFields("character/del", {
      deletedItem: "deleted",
    }),
    ...mapFields("character/list", {
      error: "error",
      items: "items",
      isLoading: "isLoading",
      view: "view",
    }),
  },

  mounted() {
    this.getPage();
  },

  methods: {
    ...mapActions({
      getPage: "character/list/default",
    }),
  },
};
</script>
<style>
.card {
  margin: 3%;
}
.char-pp {
  position: initial;
  width: 25%;

  transform: translate(-0%, -40%);
}

</style>
