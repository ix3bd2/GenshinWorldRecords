<template>
  <div id="ToastContainer" class="toast-wrapper">
    <div id="toast">
      <div class="container-1">
        <i class="fa-solid fa-circle-info"></i>
      </div>
      <div class="container-2">
        <div>Updates</div>
        <div>Characters damage will be updated at the start of each month.</div>
      </div>
      <div id="closeToast"  @click="removeToast">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
   methods: {
    removeToast() {
      document.getElementById('ToastContainer').style.display = 'none'
    },
   }
};
</script>

<style>
.toast-wrapper {
  width: 420px;
  z-index: 5;
  padding: 30px 20px;
  position: fixed;
  top: 50px;
  right: 0;
  overflow: hidden;
}

#toast {
  width: 380px;
  height: 80px;
  background-color: #333333;
  box-shadow: 0 10px 20px rgba(75, 50, 50, 0.05);
  border-left: 8px solid #8c40b8;
  border-radius: 7px;
  display: grid;
  grid-template-columns: 1.2fr 6fr 0.5fr;
  transition: 1s;
}
.container-1,
.container-2 {
  align-self: center;
}
.container-1 i {
  font-size: 40px;
  color: #8c40b8;
}
.container-2 div:first-child {
  color: #f5f5fa;
  font-weight: 600;
  font-size: 16px;
}
.container-2 div:last-child {
  font-size: 12px;
  color: #bfbfbf;
  font-weight: 600;
}
#toast #closeToast {
  align-self: flex-start;
  background-color: transparent;
  font-size: 25px;
  padding: 5px;
  margin-right: 3px;
  line-height: 0;
  color: #656565;
  cursor: pointer;
}
</style>