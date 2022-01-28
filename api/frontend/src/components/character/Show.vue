<template>
  <div>
    <div class="header-bg-show"></div>
    <div class="header-inv-row"></div>
    <div class="row">
      <div class="col-2">1</div>
      <div class="col-8"></div>
      <div class="col-2">3</div>
    </div>
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
.header-bg-show {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 160px;
  background-size: cover;
  background-position-y: 20%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  position: absolute;
  z-index: -1;
}
.header-inv-row{
    height: 130px;

}
/* .character-banner-show {
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
  z-index: 1;
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
  z-index: 1;
  position: absolute;
  left: 50%;
  bottom: 50%;
  transform: translate(-160%, 10%);
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
} */
</style>