<template>
  <div class="character-list">
    <h1>Character List</h1>
    <div class="row">
      <div style="margin-left:7px" class="search-wrapper panel-heading col-sm-12 mb-1">
        <div v-on:click="startSearch" class="search-box">
          <button  class="btn-search">
            <i class="fas fa-search"></i>
          </button>
          <input
            type="text"
            v-model="searchQuery"
            class="input-search"
            placeholder="Type to Search..."
          />
          
        </div>
        
      </div>
        <img v-on:click="startFilterElement('Pyro')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/e/e8/Element_Pyro.png" />
        <img v-on:click="startFilterElement('Electro')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/7/73/Element_Electro.png" />
        <img v-on:click="startFilterElement('Hydro')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/3/35/Element_Hydro.png" />
        <img v-on:click="startFilterElement('Cryo')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/8/88/Element_Cryo.png" />
        <img v-on:click="startFilterElement('Anemo')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/a/a4/Element_Anemo.png" />
        <img v-on:click="startFilterElement('Geo')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/4/4a/Element_Geo.png" />
        <img v-on:click="startFilterElement('Dendro')" class="filter-element" src="https://static.wikia.nocookie.net/gensin-impact/images/f/f4/Element_Dendro.png" />
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
      search: false,
      element:false,
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
      this.element =false
      this.searchQuery = ''
    },
    startFilterElement(element){
      this.search = false
      this.element = true
      this.searchQuery = element
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
.input-search {
  height: 50px;
  width: 50px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  transition: all 0.5s ease-in-out;
  background-color: #22a6b3;
  padding-right: 40px;
  color: #fff;
}
.input-search::placeholder {
  color: rgba(255, 255, 255, 0.5);
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}
.btn-search {
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color: #ffffff;
  background-color: transparent;
  pointer-events: painted;
}
.btn-search:focus ~ .input-search {
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
}
.input-search:focus {
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
}
.filter-element{
  width: 71px;
}
</style>
