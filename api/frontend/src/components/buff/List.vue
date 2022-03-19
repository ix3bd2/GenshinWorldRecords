<template>
  <div class="buffs-list">
    <h1>Buff List</h1>
    <hr />
    <div class="row">
      <div class="col-sm-2 mb-1"></div>
      <div class="col-lg-8 col-md-12">
        <img
          v-if="!weapons"
          class="filter-buff-inactive"
          v-on:click="filters('weapon')"
          :src="require('@/assets/img/weapons-icon.webp')"
        />
        <img
          v-if="weapons"
          class="filter-buff-active"
          :src="require('@/assets/img/weapons-icon.webp')"
        />
        <img
          class="filter-buff-inactive"
          v-if="!characters"
          v-on:click="filters('character')"
          style="width:45px"
          :src="require('@/assets/img/characters-icon.webp')"
        />
        <img
          v-if="characters"
          class="filter-buff-active"
          style="width:45px"
          :src="require('@/assets/img/characters-icon.webp')"
        />
        <img
          v-if="!artifacts"
          class="filter-buff-inactive"
          v-on:click="filters('artifact')"
          :src="require('@/assets/img/artifacts-icon.webp')"
        />
        <img
          v-if="artifacts"
          class="filter-buff-active"
          :src="require('@/assets/img/artifacts-icon.webp')"
        />
      </div>
      <div class="col-2" style="margin-right:7px"></div>
    </div>
    <div class="row" data-aos="fade-up" data-aos-duration="4000">
      <div class="col-6 col-md-3 col-lg-2" v-for="item in resultQuery" :key="item['@id']">
        <div class="buff-card" v-if="item.character">
          <div class="card-body">
            <router-link id="BuffRouter" :to="{ name: 'BuffShow', params: { id: item['@id'] } }">
              <h5 class="card-title">
                <img
                  id="CharacterElementBuffsList"
                  v-bind:src="item.character['element']['img']"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
                <img
                  :src="require('@/assets/img/pPicture/' + item.character['name'] + '.jpg')"
                  style="width:106px"
                  class="character-buff-icon"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
              </h5>
              <h6
                class="card-subtitle mt-3"
                style="color:whit!important;"
              >{{ filterName(item.character.name) }}</h6>
            </router-link>
          </div>
        </div>
        <div class="buff-card" v-if="item.artifact">
          <div class="card-body">
            <router-link
              id="BuffRouter"
              :to="{ name: 'ArtifactShow', params: { id: item.artifact['@id'] } }"
            >
              <h5 class="card-title">
                <img :src="item.artifact.img" style="width:106px;" id="BuffImg" />
              </h5>
              <h6 class="card-subtitle mt-3" style="color:whit!important;">{{ item.artifact.name }}</h6>
            </router-link>
          </div>
        </div>
        <div class="buff-card" v-if="item.weapon">
          <div class="card-body">
            <router-link
              id="BuffRouter"
              :to="{ name: 'WeaponShow', params: { id: item.weapon['@id'] } }"
            >
              <h5 class="card-title">
                <img :src="item.weapon.img" style="width:106px;" id="BuffImg" />
              </h5>
              <h6 class="card-subtitle mt-3" style="color:whit!important;">{{ item.weapon.name }}</h6>
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <the-pagination v-if="view && !searchQuery" :view="view" @previous="getPage" @next="getPage" />
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import ThePagination from '../ui/ThePagination.vue';
import { charactersMixin } from "../../mixins/charactersMixin";

export default {
  mixins: [charactersMixin],
  data() {
    return {
      characters: false,
      weapons: false,
      artifacts: false,
      searchQuery: null
    }
  },
  components: {
    "the-pagination": ThePagination
  },
  computed: {
    ...mapFields('buff/del', {
      deletedItem: 'deleted',
    }),
    ...mapFields('buff/list', {
      error: 'error',
      items: 'items',
      isLoading: 'isLoading',
      view: 'view',
    }),
    resultQuery() {
      if (this.searchQuery && this.characters) {
        return this.items.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.img.toLowerCase().includes(v))
        })
      }
      if (this.searchQuery && this.weapons) {
        return this.items.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.img.toLowerCase().includes(v))
        })
      }
      if (this.searchQuery && this.artifacts) {
        return this.items.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.img.toLowerCase().includes(v))
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
      getPage: 'buff/list/default',
    }),
    filterName(name) {
      return name.replace("-", " ");
    },
    filters(filter) {
      this.weapons = false
      this.characters = false
      this.artifacts = false
      this.searchQuery = filter
      if (filter == "character") {
        this.characters = true;
      }
      if (filter == "artifact") {
        this.artifacts = true;
      }
      if (filter == "weapon") {
        this.weapons = true;
      }
    }
  },
};
</script>
<style>
.buffs-list {
  padding: 4%;
}
#CharacterElementBuffsList {
  width: 30px;
  position: absolute;
  z-index: 1;
  background-color: #19232f;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
}
.buff-card {
  margin: 3%;
  transition: ease-out 0.3s;
}
.buff-card:hover {
  transform: scale(1.05);
}
.Buffs-list {
  padding: 4%;
}
.character-buff-icon {
  border-radius: 50%;
}
#BuffImg {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
#BuffRouter {
  color: white;
  text-decoration: none;
}
.filter-buff-inactive {
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  transition: ease-out 0.3s;
}
.filter-buff-inactive:hover {
  transform: scale(1.15);
  filter: none;
}
.filter-buff-active {
  transform: scale(1.15);
}
</style>
