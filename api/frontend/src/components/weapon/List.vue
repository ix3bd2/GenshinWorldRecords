<template>
  <div class="weapons-list">
    <h1>Weapon List</h1>

    <div class="row">
      <div
        class="col-md-4 col-lg-3 col-sm-6 col-card"
        v-for="item in items"
        :key="item['@id']"
        data-aos="fade-up"
        data-aos-duration="4000"
      >
        <div class="card" id="WeaponCard">
          <div class="card-body">
            <h5 class="card-title">
              <img :src="item.img">
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ item.name }}</h6>
            <p
              class="card-text"
            >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
          </div>
        </div>
      </div>
    </div>
    <hr>
    <the-pagination v-if="view" :view="view" @previous="getPage" @next="getPage" />

  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import ThePagination from '../ui/ThePagination.vue';
export default {
  components:{
    "the-pagination":ThePagination
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
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
  transition: ease-out 0.3s;
  background-color: #111111;
}
#WeaponCard:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
.weapons-list{
  padding:4%;
}
</style>
