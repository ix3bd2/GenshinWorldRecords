<template>
  <div>
    <div class="character-banner-show" v-bind:style="{ backgroundImage: `url(${require('@/assets/img/fullBanners/'+ item.name +'.jpg')})` }"></div>
    <div class="character-banner-icon-show" v-bind:style="{ backgroundImage: `url(${require('@/assets/img/pPicture/'+ item.name +'.jpg')})` }"></div>

  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";

export default {
  computed: {
    ...mapFields("character/show", {
      error: "error",
      isLoading: "isLoading",
      item: "retrieved",
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
      del: "character/del/del",
      reset: "character/show/reset",
      retrieve: "character/show/retrieve",
    }),
  },
};
</script>
<style>
.character-banner-show {
  width: 100%;
  height: 432px;
  background-size: cover;
  background-position: 10%;
  background-position-y: 0%;
}
.character-banner-icon-show{
  position: initial;
  width: 25%;
  border-radius: 50%;
  transform: translate(-0%, -40%) scale(1.05);
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
</style>