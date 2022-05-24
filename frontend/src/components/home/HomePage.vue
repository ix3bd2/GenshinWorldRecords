<template>
  <div class="home-header">
     <title>
        Home | Genshin World Records
    </title>
    <div class="header-bg">
      <div
        style="width: 100%; padding-left: 1.5rem; padding-bottom: 30px"
        class="row top3-dmg d-flex justify-content-center"
      >
        <div
          class="col-xl-3 col-lg-4 col-md-5 m-2 col-sm-12 top3cards"
          v-for="item in fullData"
          :key="item['@id']"
          v-bind:style="[
            {
              border: getElementBorderColor(item.character['element']['name']),
              backgroundImage:
                'url(' + '@/assets/img/homePage/HomePageHeader.jpeg' + ')',
            },
          ]"
        >
                <router-link id="top3a" :to="{ name: 'CharacterShow', params: { id:  item.character['@id'] } }">

          <img
            class="top-3-background-img"
            :src="
              require('@/assets/img/miniBanners/' +
                item.character.name +
                '.jpg')
            "
          />
          <img
            class="top3dmg-pp"
            :src="
              require('@/assets/img/pPicture/' + item.character.name + '.jpg')
            "
            alt="Card image cap"
            v-bind:style="{
              border: getElementBorderColor(item.character['element']['name']),
            }"
          />
          <p
            class="top3dmg-name fw-bold"
            :style="{
              color: getElementColor(item.character['element']['name']),
            }"
          >
            {{ filterName(item.character.name) }}
          </p>
          <img
            id="top3dmg-element"
            v-bind:src="item.character['element']['img']"
            v-bind:style="{
              border: getElementBorderColor(item.character['element']['name']),
            }"
          />
          <p v-if="item.id == 1" class="top1dmg-number fw-bold">
            <sup data-v-38f61d99="" data-v-4b32071d="">#</sup>
            {{ item.id }}
          </p>
          <p v-if="item.id == 2" class="top2dmg-number fw-bold">
            <sup data-v-38f61d99="" data-v-4b32071d="">#</sup>
            {{ item.id }}
          </p>
          <p v-if="item.id == 3" class="top3dmg-number fw-bold">
            <sup data-v-38f61d99="" data-v-4b32071d="">#</sup>
            {{ item.id }}
          </p>
          <p class="top3dmg-damage fw-bold">
            {{ addcommas(item.character.highestDmg) }} Damage
          </p>
                          </router-link>

        </div>

      </div>
      
    </div>
    
    <home-content />
  </div>
</template>
<script>
import HomeContent from "./HomeContent.vue";
import axios from "axios";
import { ENTRYPOINT } from "../../config/entrypoint";
import { charactersMixin } from "../../mixins/charactersMixin";

export default {
  mixins: [charactersMixin],
  components: {
    "home-content": HomeContent,
  },
  data() {
    return {
      fullData: null,
    };
  },
  created() {
    axios
      .get(ENTRYPOINT + "/top3dmgs?pagination=false")
      .then((response) => (this.fullData = response.data["hydra:member"]));
  },
  methods: {
    filterName(name) {
      return name.replace("-", " ");
    },
    addcommas(number) {
      return number.toLocaleString("en-US");
    },
  },
};
</script>

<style>
#top3a:hover{
  color: #9b90e3;
}
.top3cards {
  background-color: #1f1f1f;
  height: 122px;
  position: relative;
  border-radius: 0.25rem;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
    --bs-gutter-x: 0rem!important;
}
.header-bg {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 532px;
  background-size: cover;
  background-position: 50%;
  position: relative;
}
.top-3-background-img {
  width: 100%;
  object-fit: cover;
  -o-object-position: 0%;
      object-position: top left;
 -webkit-transform: scaleX(-1);
  transform: scaleX(-1);

opacity: 0.4;
  height: 118px;
}
.top3-dmg {
  position: absolute;
  bottom: -70px;
  z-index: 2;
}
.top3dmg-pp {
  width: 89px;
  position: absolute;
  left: 3.5rem;
  top: 50%;
  border-radius: 50%;
  transform: translate(-50%, -50%);
}
.top3dmg-name {
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-40%, -50%);
}
.top1dmg-number {
  position: absolute;
  top: 0;
  right: 0;
  background-image: linear-gradient(180deg, #ffeb99, #ad801c);
  color: #111;
  height: 2.5rem;
  width: 2.5rem;
  padding: 0.5rem;
  border-bottom-left-radius: 1.5rem;
  font-size: 1.19rem;
  font-weight: 700;
  line-height: 1.5rem;
}
.top2dmg-number {
  position: absolute;
  top: 0;
  right: 0;
  background-image: linear-gradient(180deg, #d3d3d3, #2d3436);
  color: #111;
  height: 2.5rem;
  width: 2.5rem;
  padding: 0.5rem;
  border-bottom-left-radius: 1.5rem;
  font-size: 1.19rem;
  font-weight: 700;
  line-height: 1.5rem;
}
.top3dmg-number {
  position: absolute;
  top: 0;
  right: 0;
  background-image: linear-gradient(180deg, #d58936, #69140e);
  color: #111;
  height: 2.5rem;
  width: 2.5rem;
  padding: 0.5rem;
  border-bottom-left-radius: 1.5rem;
  font-size: 1.19rem;
  font-weight: 700;
  line-height: 1.5rem;
}
.top3dmg-damage {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-40%, -50%);
}
#top3dmg-element {
  width: 30px;
  background-color: #19232f;
  position: absolute;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
  transform: translate(-50%, -50%);
  left: 1.5rem;
  top: 23%;
}
</style>