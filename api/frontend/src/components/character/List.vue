<template>
  <div class="character-list">
    <h1>Character List</h1>

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
        data-aos="fade-up"
     data-aos-duration="4000"
      >

        <div class="card"  id="CharacterCard" v-bind:style="{ border: getElementBorderColor(item['element']['name']) }">
          <div>
            <img
              class="card-img-top"
              :src="
                require('@/assets/img/miniBanners/' + item['name'] + '.jpg')
              "
            />
            <img
              class="card-img-top char-pp"
              :src="require('@/assets/img/pPicture/' + item['name'] + '.jpg')"
              alt="Card image cap"
              v-bind:style="{  border: getElementBorderColor(item['element']['name'])  }"
            />
            <img
              class="card-img-top" id="CharacterElement"
              v-bind:src="item['element']['img']"
              alt="Card image cap"
              v-bind:style="{  border: getElementBorderColor(item['element']['name'])  }"
            />
            <img
              class="card-img-top char-nation"
              :src="require('@/assets/img/nations/' + item['nation'] + '.png')"
            />
            <img
              v-if="item['rarity'] == 5"
              class="character-list-rarity"
              src="https://static.wikia.nocookie.net/gensin-impact/images/2/2b/Icon_5_Stars.png"
            />
            <img
              v-if="item['rarity'] == 4"
              class="character-list-rarity"
              src="https://static.wikia.nocookie.net/gensin-impact/images/7/77/Icon_4_Stars.png"
            />
          </div>
          <div class="card-body" id="CharacterCardBody">
            <h5 id="CharacterCardTitle" class="card-title">{{ filterName(item["name"]) }}</h5>
            <h7 class="card-body" style="color: #111111">{{ item["name"] }}</h7>
            
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";
import { charactersMixin } from "../../mixins/charactersMixin";
export default {
  mixins: [charactersMixin],
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
    filterName(name) {
      return name.replace("-", " ");
    },
  },
};
</script>
<style>
#CharacterCard {
  margin: 3%;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
  transition: ease-out 0.3s;
  background-color: #111111;
}
.char-pp {
  position: initial;
  width: 25%;
  border-radius: 50%;
  transform: translate(-0%, -40%) scale(1.05);
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
#CharacterElement {
  width: 9%;
  background-color: #19232f;
  position: absolute;
  transform: translate(-300%, -120%);
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
#CharacterCardBody {
  padding: 1px;
}
.char-nation {
  position: absolute;
  width: 36%;
  left: 0%;
}
#CharacterCardTitle {
  color: white;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%);
}
#CharacterCard:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
.character-list {
  padding: 4%;
}
.character-list-rarity {
  position: absolute;
  width: 30%;
  right: -10%;
  bottom: 15%;
  transform: rotate(90deg);
}
</style>
