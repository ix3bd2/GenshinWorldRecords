<template>
  <div v-if="item" class="weapon-show">
    <div><img id="WeaponImgShow" :src="item['img']"><h5 class="mt-2">{{item.name}}</h5></div>
   

  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';

export default {
  computed: {
    ...mapFields('weapon/del', {
      deleteError: 'error',
    }),
    ...mapFields('weapon/show', {
      error: 'error',
      isLoading: 'isLoading',
      item: 'retrieved',
    }),
  },

  beforeDestroy () {
    this.reset();
  },

  created () {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: 'weapon/del/del',
      reset: 'weapon/show/reset',
      retrieve: 'weapon/show/retrieve',
    }),

    deleteItem (item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'WeaponList' }));
      }
    },
  },
};
</script>
<style scoped>
.weapon-show{
  padding: 4%;
}
#WeaponImgShow{
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
</style>