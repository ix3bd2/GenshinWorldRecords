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
        class="col-md-4 col-lg-3 col-sm-6 col-card"
        v-for="item in items"
        :key="item['@id']"
      >
        <div>{{ changeColor(item["element"]["name"]) }}</div>

        <div class="card" v-bind:style="{ border: color }">
          <div>
            <img
              class="card-img-top"
              :src="require('@/assets/img/miniBanners/' + item['name'] + '.jpg')"
            />
            <img
              class="card-img-top char-pp"
              :src="require('@/assets/img/pPicture/' + item['name'] + '.jpg')"
              alt="Card image cap"
              v-bind:style="{ border: color }"
            />
            <img
              class="card-img-top char-element"
              v-bind:src="item['element']['img']"
              alt="Card image cap"
              v-bind:style="{ border: color }"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ filterName(item["name"]) }}</h5>
            <h7 class="card-body" style="color: #212529">{{ item["name"] }}</h7>
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
  data: {
    color: "",
  },
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
    filterName(name){
      console.log(name)
      return name.replace('-'," ")
    },
    changeColor(element) {
      if (element == "Geo") {
        this.color = "2px solid #e0ba4f";
      }
      if (element == "Hydro") {
        this.color = "2px solid #04e3fc";
      }
      if (element == "Cryo") {
        this.color = "2px solid #97edf3";
      }
      if (element == "Pyro") {
        this.color = "2px solid #f08445";
      }
      if (element == "Dendro") {
        this.color = "2px solid #dfbafc";
      }
      if (element == "Electro") {
        this.color = "2px solid #dfbafc";
      }
      if (element == "Anemo") {
        this.color = "2px solid #95ecc2";
      }
    },
  },
};
</script>
<style>
.card {
  margin: 3%;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
  transition: ease-out 0.3s;
  background-color: #1a2430;
}
.char-pp {
  position: initial;
  width: 25%;
  border-radius: 50%;
  transform: translate(-0%, -40%)scale(1.05);

}
.char-element {
  width: 9%;
  background-color: #19232f;
  position: absolute;
  transform: translate(-300%, -120%);
  border-radius: 50%;
}
.card-body {
  padding: 1px;
}
.card-title {
  color: white;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%);
}
.card:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
</style>
