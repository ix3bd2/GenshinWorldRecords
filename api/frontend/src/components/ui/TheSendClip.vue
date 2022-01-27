<template>
  <div class="row" id="SendClipSection" >
    <div class="col-lg-6 col-md-12" data-aos="fade-right">
      <h2 id="SendClipsTitle">Share Your Clip With Us!</h2>
      <p class="SendClipReq">
        Do you have higher record? than Please read the requirements below.
      </p>
      <ul class="list" id="SenClipList">
        <li class="list-item-clips one">5 star characters must be C0.</li>
        <li class="list-item-clips two">
          only one 5 start weapon in the party (refine 1).
        </li>
        <li class="list-item-clips three">Video must be atleast 720p.</li>
        <li class="list-item-clips four">
          You must show your party builds in the video.
        </li>
      </ul>
      <!-- HTML !-->
      <div class="d-flex justify-content-center">
        <button class="button-64" role="button">
          <span class="text">Send Now!</span>
        </button>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card-img" id="SendClipImg" data-aos="fade-left"></div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
#SendClipSection {
  text-align: center;
}
#SendClipsTitle {
  color: #0a0a0a;
  font-size: 3rem;
  margin-bottom: 1.5rem;
  margin-top: 3rem;
  font-weight: 800;
}
.SendClipReq {
  font-size: 1.25rem;
  color: #656462;
  line-height: 1.2;
  letter-spacing: -0.03rem;
  margin: 0 auto 2.5rem;
  font-weight: 600;
  max-width: 450px;
}
#SenClipList {
  font-size: 1.25rem;
  color: #0a0a0a;
  line-height: 1.2;
  letter-spacing: -0.03rem;
  margin: 0 auto 2.5rem;
  font-weight: 600;
  max-width: 500px;
  list-style: disc;
  text-align: start;
}
.list-item-clips {
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.button-64 {
  margin-bottom: 3%;
  align-items: center;
  background-image: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #ffffff;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 3px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
}

.button-64:active,
.button-64:hover {
  outline: 0;
}

.button-64 span {
  background-color: rgb(5, 6, 45);
  padding: 16px 24px;
  border-radius: 6px;
  width: 100%;
  height: 100%;
  transition: 300ms;
}

.button-64:hover span {
  background: none;
}

@media (min-width: 768px) {
  .button-64 {
    font-size: 24px;
    min-width: 196px;
  }
}
#SendClipImg {
  clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
  width: 100%;
  background-image: url("../../assets/img/homePage/sendClip.jpeg");
  height: 532px;
  background-size: cover;
  background-position: 50%;
}
@media (max-width: 991px) {
  #SendClipImg {
    clip-path: none;
  }
}
</style>
