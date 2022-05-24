<template>

  <div class="character-list">
    <title>
        Characters | Genshin World Records
    </title>
    <h1>Character List</h1>
    <hr />
    <div class="row">
      <div style="margin-left:7px" class="search-wrapper panel-heading col-sm-2 mb-1">
        <div class="input-container" v-on:click="startSearch">
          <input v-model="searchQuery" type="text" required />
          <label>
            <i class="fas fa-search"></i> Search
          </label>
        </div>
      </div>
      <div class="col-lg-8 col-md-12">
        <img
          v-on:click="startFilterElement('Pyro')"
          v-if="!pyro"
          class="filter-element pyro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/e/e8/Element_Pyro.png"
        />
        <img
          v-on:click="startFilterElement('Pyro')"
          v-if="pyro"
          class="active-filter pyro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/e/e8/Element_Pyro.png"
        />
        <img
          v-on:click="startFilterElement('Electro')"
          v-if="!electro"
          class="filter-element electro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/7/73/Element_Electro.png"
        />
        <img
          v-on:click="startFilterElement('Electro')"
          v-if="electro"
          class="active-filter electro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/7/73/Element_Electro.png"
        />
        <img
          v-on:click="startFilterElement('Hydro')"
          v-if="!hydro"
          class="filter-element hydro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/3/35/Element_Hydro.png"
        />
        <img
          v-on:click="startFilterElement('Hydro')"
          v-if="hydro"
          class="active-filter hydro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/3/35/Element_Hydro.png"
        />

        <img
          v-on:click="startFilterElement('Cryo')"
          v-if="!cryo"
          class="filter-element cryo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/8/88/Element_Cryo.png"
        />
        <img
          v-on:click="startFilterElement('Cryo')"
          v-if="cryo"
          class="active-filter cryo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/8/88/Element_Cryo.png"
        />

        <img
          v-on:click="startFilterElement('Anemo')"
          v-if="!anemo"
          class="filter-element anemo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/a/a4/Element_Anemo.png"
        />
        <img
          v-on:click="startFilterElement('Anemo')"
          v-if="anemo"
          class="active-filter anemo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/a/a4/Element_Anemo.png"
        />

        <img
          v-on:click="startFilterElement('Geo')"
          v-if="!geo"
          class="filter-element geo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/4/4a/Element_Geo.png"
        />
        <img
          v-on:click="startFilterElement('Geo')"
          v-if="geo"
          class="active-filter geo-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/4/4a/Element_Geo.png"
        />

        <img
          v-on:click="startFilterElement('Dendro')"
          v-if="!dendro"
          class="filter-element dendro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/f/f4/Element_Dendro.png"
        />
        <img
          v-on:click="startFilterElement('Dendro')"
          v-if="dendro"
          class="active-filter dendro-element"
          src="https://static.wikia.nocookie.net/gensin-impact/images/f/f4/Element_Dendro.png"
        />
      </div>
      <div class="col-2" style="margin-right:7px"></div>
    </div>
    <!-- <div
      v-if="deletedItem"
    class="alert alert-success">{{ deletedItem['@id'] }} deleted.</div>-->
    <!-- <div
      v-if="error"
    class="alert alert-danger">{{ error }}</div>-->

    <!-- p>
      <router-link
        :to="{ name: 'CharacterCreate' }"
        class="btn btn-primary">Create</router-link>
    </p>-->

    <div class="row" data-aos="fade-up" data-aos-duration="4000">
      <div
        class="col-md-4 col-lg-3 col-sm-6 col-card"
        v-for="item in resultQuery"
        :key="item['@id']"
      >
        <router-link :to="{ name: 'CharacterShow', params: { id: item['@id'] } }">
          <div
            class="card"
            id="CharacterCard"
            v-bind:style="{ border: getElementBorderColor(item['element']['name']) }"
          >
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
                v-bind:style="{ border: getElementBorderColor(item['element']['name']) }"
              />
              <img
                class="card-img-top"
                id="CharacterElement"
                v-bind:src="item['element']['img']"
                alt="Card image cap"
                v-bind:style="{ border: getElementBorderColor(item['element']['name']) }"
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
              <h7
                class="card-body"
                style="color: #111111;text-decoration: underline;"
              >{{ item["name"] }}</h7>
            </div>
          </div>
        </router-link>
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
  data() {
    return {
      geo: false,
      pyro: false,
      cryo: false,
      hydro: false,
      electro: false,
      anemo: false,
      dendro: false,
      search: false,
      element: false,
      searchQuery: null,
    };
  },
  created() {
    console.log(this.items)
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
    resultQuery() {
      if (this.searchQuery && this.search) {
        return this.items.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
        })
      }
      if (this.searchQuery && this.element) {
        return this.items.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.element.name.toLowerCase().includes(v))
        })
      }
      else {
        return this.items;
      }
    }
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
    startSearch() {
      this.search = true;
      this.element = false;
      this.geo = false,
        this.pyro = false,
        this.cryo = false,
        this.hydro = false,
        this.electro = false,
        this.anemo = false,
        this.dendro = false,
        this.searchQuery = ''
    },
    startFilterElement(element) {
      this.geo = false,
        this.pyro = false,
        this.cryo = false,
        this.hydro = false,
        this.electro = false,
        this.anemo = false,
        this.dendro = false,
        this.search = false
      this.element = true
      this.searchQuery = element
      if (element == "Geo") {
        this.geo = true;
      }
      if (element == "Hydro") {
        this.hydro = true;
      }
      if (element == "Cryo") {
        this.cryo = true;
      }
      if (element == "Pyro") {
        this.pyro = true;
      }
      if (element == "Dendro") {
        this.dendro = true;
      }
      if (element == "Electro") {
        this.electro = true;
      }
      if (element == "Anemo") {
        this.anemo = true;
      }
    }
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
  width: 33%;
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
.search-box {
  width: fit-content;
  height: fit-content;
  position: relative;
}
.filter-element {
  height: 47px;
  margin: 5px;
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  transition: ease-out 0.3s;
}
.filter-element:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
  -webkit-filter: none; /* Safari 6.0 - 9.0 */
  filter: none;
}
.active-filter {
  height: 47px;
  margin: 5px;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}


.pyro-element {
  border: 2px solid #f08445;
  border-radius: 50%;
}
.electro-element {
  border: 2px solid #dfbafc;
  border-radius: 50%;
}
.hydro-element {
  border: 2px solid #04e3fc;
  border-radius: 50%;
}
.cryo-element {
  border: 2px solid #97edf3;
  border-radius: 50%;
}
.anemo-element {
  border: 2px solid #95ecc2;
  border-radius: 50%;
}
.geo-element {
  border: 2px solid #e0ba4f;
  border-radius: 50%;
}
.dendro-element {
  border: 2px solid #a7dc25;
  border-radius: 50%;
}
</style>
