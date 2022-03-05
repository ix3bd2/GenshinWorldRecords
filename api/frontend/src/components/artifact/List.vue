<template>
  <div class="artifacts-list">
    <h1>Artifacts List</h1>
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
        <div id="ArtifactCard">
          <div class="card-body">
             <router-link id="ArtifactRouter"
              :to="{name: 'ArtifactShow', params: { id: item['@id'] }}">
            <h5 class="card-title">
              <img style="width:106px;" id="ArtifactImg" :src="item.img" />
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
import { ENTRYPOINT } from '../../config/entrypoint';
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
  .get(ENTRYPOINT + '/artifacts?pagination=false')
  .then(response => (this.fullData = response.data['hydra:member']))
  },
  computed: {
      ...mapFields('artifact/del', {
          deletedItem: 'deleted',
      }),
      ...mapFields('artifact/list', {
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
      getPage: 'artifact/list/default',
    }),
  },
};
</script>
<style scoped>
#ArtifactCard {
  margin: 3%;
  transition: ease-out 0.3s;
}
#ArtifactCard:hover {
  transform: scale(1.05);
}
.artifacts-list {
  padding: 4%;
}
#ArtifactImg {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
#ArtifactRouter{
      color: white;
    text-decoration: none;
}
</style>
