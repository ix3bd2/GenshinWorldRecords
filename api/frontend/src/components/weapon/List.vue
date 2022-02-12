<template>
  <div class="weapons-list">
    <h1>Weapon List</h1>
    <hr />
    <div class="row" data-aos="fade-up" data-aos-duration="4000">
      <div class="col-6 col-md-3 col-lg-2" v-for="item in items" :key="item['@id']">

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
    <the-pagination v-if="view" :view="view" @previous="getPage" @next="getPage" />
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import ThePagination from '../ui/ThePagination.vue';
export default {
  components: {
    "the-pagination": ThePagination
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
