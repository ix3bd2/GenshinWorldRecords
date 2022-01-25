<template>
  <div>
    <div
      class="character-banner-show"
      v-bind:style="{
        backgroundImage: `url(${require('@/assets/img/fullBanners/' +
          item.name +
          '.jpg')})`, borderBottom: getElementBorderColor(item['element']['name']),
      }"
    ></div>
    <div
      class="character-banner-icon-show"
      v-bind:style="{
        backgroundImage: `url(${require('@/assets/img/pPicture/' +
          item.name +
          '.jpg')})`,border: getElementBorderColor(item['element']['name']),
      }"
    ></div>
    <img
      class="character-element-icon-show"
      v-bind:src="item['element']['img']"
      alt="Card image cap"
      v-bind:style="{ border: getElementBorderColor(item['element']['name']) }"
    />
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";
import { charactersMixin } from "../../mixins/charactersMixin";

export default {
  mixins: [charactersMixin],

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
.character-banner-icon-show {
  position: absolute;
  width: 130px;
  height: 130px;
  border-radius: 50%;
  background-size: cover;
  left: 50%;
  transform: translate(-50%, -60%) scale(1.05);
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
.character-element-icon-show {
        width: 43px;
    background-color: #19232f;
    position: absolute;
    left: 50%;
    bottom: 50%;
    transform: translate(-160%,10%);
    border-radius: 50%;
    box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%), 0 6px 20px 0 rgb(255 255 255 / 19%);
}
</style>