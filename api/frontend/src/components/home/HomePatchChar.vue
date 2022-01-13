<template  >
  <div>
    <div v-for="item in items" :key="item['@id']">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-xl-12 col-md-6">
              <div class="card card-side mb-2 w-100">
                <div class="card-body">
                  <p class="card-text">
                    {{item['characters']["name"]}}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapFields } from "vuex-map-fields";

export default {
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
.card-side {
  height: 122px;
  border-radius: 8px;
  background-color: #1a2430;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
</style>