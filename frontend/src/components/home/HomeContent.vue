<template>
<div class="home-page">
  <div class="new-patch">
    <div class="home-content">
      <h2 class="title">New Characters Top Damage</h2>
      <div class="row">
        <div
          class="col-xl-7 col-lg-12"
          style="margin-bottom: 1.5rem !important" data-aos="fade-right"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500"
        >
          <router-link
            style="color: white"
            :to="{ name: 'CharacterShow', params: { id: 'characters/48' } }"
          >
            <div class="card card-main w-100" 
     >
              <img
                class="card-img-top char-element char-element-header"
                src="https://static.wikia.nocookie.net/gensin-impact/images/3/35/Element_Hydro.png"
                alt="Card image cap"
                v-bind:style="{ border: getElementBorderColor('Hydro') }"
              />
              <img
                class="card-img card-main-img"
                src="../../assets/img/fullBanners/Yelan.jpg"
                alt="Card image"
              />

              <div
                class="card-img-overlay"
                v-bind:style="{ border: getElementBorderColor('Hydro') }"
              >
                <div class="card-body-custom">
                  <h3 class="card-text card-text-custom">
                    Hydro SUP DPS
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
              :title="item['title']"
              :characterId="item['characters']['@id']"
              :description="item['description']"
              :element="item['characters']['element']['name']"
              :elementImg="item['characters']['element']['img']"
              :key="item.id"
              class="col-xl-12 col-md-6"
              data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="home-genshin-tweets">
    <home-genshin-tweets/>
  </div>
  <div class="home-categorie">
    <home-categorie/>
  </div>
</div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";
import HomePatchChar from "./HomePatchChar.vue";
import { charactersMixin } from "../../mixins/charactersMixin";
import HomeCategorie from "./HomeCategorie.vue";
import HomeGenshinTweets from "./HomeGenshinTweets.vue"
import TheSendClip from "../ui/TheSendClip.vue"
export default {
  mixins: [charactersMixin],
  components: {
    "home-patch-char": HomePatchChar,
    "home-categorie":HomeCategorie,
    "the-send-clip":TheSendClip,
    "home-genshin-tweets":HomeGenshinTweets,
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
.char-element-header {
  position: absolute;
  width: 6%;
  right: 0px;
  border-radius: 50%;
  background: black;
  margin: 10px;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
.title {
  font-size: 3rem;
  font-weight: 800;
  text-align: left;
  margin-bottom: 1.5rem;
  margin-top: 2.5rem;
}
.new-patch {
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
  transition: ease-out 0.3s;
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
  background-color: #1a2430d9;
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
.card-main:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
.home-categorie{
  background-color: #171332;
}
.home-genshin-tweets{
    background-color: #1f1f1f;
    border-bottom: 0.25rem solid #7c82c8;
}
</style>