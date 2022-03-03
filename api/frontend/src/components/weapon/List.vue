<template>
  <div class="weapons-list">
    <h1>Weapon List</h1>
    <hr />
    <div class="row">
      <div style="margin-left:7px" class="search-wrapper panel-heading col-sm-2 mb-1">
        <div class="input-container">
          <input v-model="searchQuery" type="text" required />
          <label>
            <i class="fas fa-search"></i> Search
          </label>
        </div>
      </div>
    </div>
    <div class="row" data-aos="fade-up" data-aos-duration="4000">
      <div class="col-6 col-md-3 col-lg-2" v-for="item in resultQuery" :key="item['@id']">

        <div id="WeaponCard">
          <div class="card-body">
             <router-link id="WeaponRouter"
              :to="{name: 'WeaponShow', params: { id: item['@id'] }}">
            <h5 class="card-title">
              <img id="WeaponImg" :src="item.img" />
            </h5>
            <h6 class="card-subtitle mt-3" style="color:whit!important;">{{ item.name }}</h6>
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
import { ENTRYPOINT } from '../../config/entrypoint'
import axios from 'axios';

export default {
  components: {
    "the-pagination": ThePagination
  },
  data() {
    return {
      searchQuery: null,
      fullData:null,
    };
  },
  created(){
    axios
  .get(ENTRYPOINT + '/weapons?pagination=false')
  .then(response => (this.fullData = response.data['hydra:member']))
  },
  computed: {
    ...mapFields('weapon/del', {
      deletedItem: 'deleted',
    }),
    ...mapFields('weapon/list', {
      error: 'error',
      items: 'items',
      isLoading: 'isLoading',
      view: 'view',
    }),
    resultQuery() {
      if (this.searchQuery) {
        return this.fullData.filter((item) => {
          return this.searchQuery.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
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
      getPage: 'weapon/list/default',
    }),
  },
};
</script>
<style scoped>
#WeaponCard {
  margin: 3%;
  transition: ease-out 0.3s;
}
#WeaponCard:hover {
  transform: scale(1.05);
}
.weapons-list {
  padding: 4%;
}
#WeaponImg {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
#WeaponRouter{
      color: white;
    text-decoration: none;
}
</style>
