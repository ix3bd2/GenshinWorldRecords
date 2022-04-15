<template>
  <div v-if="item" class="weapon-show">
    <div>
      <img id="WeaponImgShow" :src="item['img']" />
      <h5 class="mt-2">{{ item.name }}</h5>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 col-md-10 col-sm-12 text-center mt-3">
        <ul>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900;background-color:#1f1f1f; padding: 0 10px;">Type</span>
            </div>
            <div class="mt-3">{{ item.type }}</div>
          </li>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900; background-color:#1f1f1f; padding: 0 10px;">Rarity</span>
            </div>
            <div class="mt-3">
              <img
                v-if="item['rarity'] == 5"
                style="width:8%"
                src="https://static.wikia.nocookie.net/gensin-impact/images/2/2b/Icon_5_Stars.png"
              />
              <img
                v-if="item['rarity'] == 4"
                style="width:8%"
                src="https://static.wikia.nocookie.net/gensin-impact/images/7/77/Icon_4_Stars.png"
              />
              <img
                v-if="item['rarity'] == 3"
                style="width:8%"
                src="https://static.wikia.nocookie.net/gensin-impact/images/1/11/Icon_3_Stars.png"
              />
            </div>
          </li>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900; background-color:#1f1f1f; padding: 0 10px;">Base Attack</span>
            </div>
            <div class="mt-3">{{ item.atk }}</div>
          </li>

          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900; background-color:#1f1f1f; padding: 0 10px;">Sub stat</span>
            </div>
            <div class="mt-3">{{ item.substate }}</div>
          </li>

          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900; background-color:#1f1f1f; padding: 0 10px;">Passive</span>
            </div>
            <div class="mt-3">{{ item.passive }}</div>
          </li>
        </ul>
      </div>
      <div class="col-lg-2"></div>
    </div>
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

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: 'weapon/del/del',
      reset: 'weapon/show/reset',
      retrieve: 'weapon/show/retrieve',
    }),

    deleteItem(item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'WeaponList' }));
      }
    },
  },
};
</script>
<style scoped>
.weapon-show {
  padding: 4%;
}
#WeaponImgShow {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
</style>