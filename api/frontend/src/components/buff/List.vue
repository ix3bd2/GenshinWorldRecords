<template>
  <div class="buffs-list">
    <h1>Buff List</h1>
    <hr />
    <div class="row" data-aos="fade-up" data-aos-duration="4000">
      <div class="col-6 col-md-3 col-lg-2" v-for="item in items" :key="item['@id']">
        <div class="buff-card" v-if="item.character">
          <div class="card-body">
            <router-link id="BuffRouter" :to="{ name: 'BuffShow', params: { id: item['@id'] } }">
              <h5 class="card-title">
                <img
                  id="CharacterElementBuffsList"
                  v-bind:src="item.character['element']['img']"
                  alt="Card image cap"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
                <img
                  :src="require('@/assets/img/pPicture/' + item.character['name'] + '.jpg')"
                  style="width:106px"
                  class="character-buff-icon"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
              </h5>
              <h6 class="card-subtitle mt-3" style="color:whit!important;">{{ filterName(item.character.name) }}</h6>
            </router-link>
          </div>
        </div>
        <div class="buff-card" v-if="item.artifact">
          <div class="card-body">
            <router-link id="BuffRouter" :to="{ name: 'ArtifactShow', params: { id: item.artifact['@id'] } }">
              <h5 class="card-title">
                <img :src="item.artifact.img" style="width:106px;" id="BuffImg" />
              </h5>
              <h6 class="card-subtitle mt-3" style="color:whit!important;">{{ item.artifact.name }}</h6>
            </router-link>
          </div>
        </div>
        <div class="buff-card" v-if="item.weapon">
          <div class="card-body">
            <router-link id="BuffRouter" :to="{ name: 'WeaponShow', params: { id: item.weapon['@id'] } }">
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
</style>
