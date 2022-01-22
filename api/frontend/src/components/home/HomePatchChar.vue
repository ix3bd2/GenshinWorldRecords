<template  >
  <div>
    <router-link
      style="color: white"
      :to="{ name: 'CharacterShow', params: { id: characterId } }"
    >
      <div
        class="card card-side mb-3 w-100"
        v-bind:style="{ border: getElementBorderColor(element) }"
      >
        <div class="card-body card-body-side row">
          <div class="col-8">
            <div class="card-body-custom card-body-side">
              <h3 class="card-text card-text-custom">
                {{ description }}
              </h3>

              <h3 class="card-title card-title-custom">
                {{ title }}
              </h3>
            </div>
          </div>
          <div class="col-4">
            <img
              class="card-img-top char-element char-element-side"
              v-bind:src="elementImg"
              v-bind:style="{ border: getElementBorderColor(element) }"
            />

            <img
              class="side-img"
              :src="require('@/assets/img/miniBanners/' + name + '.jpg')"
            />
          </div>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
import { charactersMixin } from "../../mixins/charactersMixin";
export default {
  mixins: [charactersMixin],
  props: [
    "name",
    "element",
    "title",
    "description",
    "characterId",
    "elementImg",
  ],
};
</script>

<style>
.card-body-side {
  padding: 0;
}
.card-side {
  transition: ease-out 0.3s;
  height: 122px;
  background-color: #1f1f1f;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.side-img {
  width: 100%;
  object-fit: cover;
  -o-object-position: 0%;
  object-position: 0%;
  height: 118px;
  clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
}
.char-element-side {
  position: absolute;
  z-index: 3;
  width: 6%;
  right: 0;
  background-color: black;
  border-radius: 50%;
  margin: 4px;
  box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2),
    0 6px 20px 0 rgba(255, 255, 255, 0.19);
}
.card-body-side {
  background-color: rgb(14 14 14 / 0%) !important;
}
.card-side:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
  background-color: #535353b7;
}
</style>