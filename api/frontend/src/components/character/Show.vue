<template>
  <div>
    <div class="header-bg-show"></div>
    <div class="header-inv-row"></div>
    <div class="row">
      <div class="col-lg-2 col-md-1"></div>
      <div class="col-lg-8 col-md-10 col-sm-12 show-container">
        <div class="row nopadding">
          <div class="navbar navbar-expand-lg" id="CharcterShowHeader">
            <div class="container">
              <ul class="nav">
                <li class="nav-item">
                  <a
                    class="nav-link active active-show"
                    aria-current="page"
                    href="#"
                    >Character</a
                  >
                </li>
              </ul>
              <ul class="nav ms-auto mr-5">
                <li class="nav-item">
                  <a
                    class="nav-link active active-show"
                    aria-current="page"
                    href="#"
                    >Info</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link active active-show"
                    aria-current="page"
                    href="#"
                    >Team</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link active active-show"
                    aria-current="page"
                    href=""
                    >Buffs</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row" v-if="item">
          <img
            id="banner"
            :src="require('@/assets/img/fullBanners/' + item['name'] + '.jpg')"
          />
        </div>
        <div class="row info-section nopadding">sd</div>
      </div>
      <div class="col-lg-2 col-md-1"></div>
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
.active-show {
  color: white;
  transition: 2 ease-in-out;
}
.active-show:hover {
  color: rgb(96 82 187 / 81%);
}
#CharcterShowHeader {
  background-color: #111111e8;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
}
.header-bg-show {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 200px;
  background-size: cover;
  background-position-y: 20%;
  background-position-x: 50%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  position: absolute;
  z-index: -1;
}
.show-container{
  margin-bottom: 145px;
}
#banner {
  height: 350px;
  object-fit: cover;
  object-position: top left;
}
.header-inv-row {
  height: 145px;
}
.nopadding {
  padding: 0 !important;
  margin: 0 !important;
}
.info-section {
  background-color:#111111e8;
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