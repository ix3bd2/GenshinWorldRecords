<template  >
  <div>
              <div class="card card-side mb-2 w-100">
                <div class="card-body">
                  <p class="card-text">
                    {{ name }}
                  </p>
      </div>
    </div>
  </div>
</template>

<script>

export default {
      props: ["name"],
};
</script>

<style>
.card-side {
  height: 122px;
  background-color: #1a2430;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
</style>