<template>
  <div class="home-content-bg">
    <div class="home-content">
      <h2 class="title">New characters top damage</h2>
      <div class="row">
        <div
          class="col-xl-7 col-lg-12"
          style="margin-bottom: 1.5rem !important"
        >
          <router-link
            style="color: white"
            :to="{ name: 'CharacterShow', params: { id: 'characters/20' } }"
          >
            <div class="card card-main w-100">
              <img
                class="card-img card-main-img"
                src="../../assets/img/fullBanners/Xiao.jpg"
                alt="Card image"
              />
              <div
                class="card-img-overlay"
                v-bind:style="{ border: getElementBorderColor('Anemo') }"
              >
                <div class="card-body-custom">
                  <h3 class="card-text card-text-custom">
                    Highest Plunge Damage
                  </h3>

                  <h3 class="card-title card-title-custom">C0 Damage</h3>
                </div>
              </div>
            </div>
          </router-link>
        </div>
        <div class="col-xl-5 col-lg-12">
          <div class="row">
            <home-patch-char
              v-for="(item, index) in items"
              :item="item"
              :index="index"
              :name="item['characters']['name']"
              :key="item.id"
              class="col-xl-12 col-md-6"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";
import HomePatchChar from "./HomePatchChar.vue";
import { charactersMixin } from "../../mixins/charactersMixin";
export default {
  mixins: [charactersMixin],
  components: {
    "home-patch-char": HomePatchChar,
  },
  computed: {
    ...mapFields("patchchar/del", {
      deletedItem: "deleted",
    }),
    ...mapFields("patchchar/list", {
      error: "error",
      items: "items",
      isLoading: "isLoading",
      view: "view",
    }),
  },

  mounted() {
    this.getPage();
  },

  methods: {
    ...mapActions({
      getPage: "patchchar/list/default",
    }),
  },
};
</script>

<style>
.title {
  font-size: 3rem;
  font-weight: 800;
  text-align: left;
  margin-bottom: 4.5rem;
  margin-top: 1rem;
}
.home-content-bg {
  width: 100%;
  height: 100%;
  background-color: #171332;
  border-bottom: 0.25rem solid #7c82c8;
  padding: 3%;
}
.list {
  list-style: none;
}
.card-main {
  height: 460px;
  background-image: ("../../assets/img/fullBanners/Xiao.jpg");
  background-size: cover;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.card-main-img {
  object-fit: cover;
  height: 100%;
  object-position: 0%;
}
.card-body-custom {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: rgb(14 14 14 / 74%);
  width: 100%;
}
.card-text-custom {
  text-align: left;
}
.card-title-custom {
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-size: 0.938rem;
  text-align: left;
  color: rgb(96 82 187 / 81%);
}
.home-content {
  margin-bottom: 3rem;
}
</style>